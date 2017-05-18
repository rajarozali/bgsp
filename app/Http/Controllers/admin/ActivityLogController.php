<?php

namespace App\Http\Controllers\admin;

use App\admin\ActivityLog;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ActivityLogController extends Controller
{
    public function index(){
		$module_menus = app('App\Http\Controllers\admin\CrudBuilderController')->createMenumodule();
        $results=ActivityLog::paginate(15);
        return view('admin.activitylog')->with(['module_menus' => $module_menus,'activity_logs'=>$results,'tab'=>1]);
   }


    /**
     * @param Request $request
     * @return string
     */
    public function export_excel(Request $request){
        #### $request['export_type'] is export mode  "EXCEL or CSV"
        ### Check export CSV permission
        if($request['export_type']=='csv'&& !Auth::user()->can('export_csv') )
            return 'You not have this permission';
        ### Check export EXCEL permission
        if($request['export_type']=='xls'&& !Auth::user()->can('export_xls') )
            return 'You not have this permission';
        if ($request['serach_txt']) {
          $Role = ActivityLog::search($request['serach_txt'], null, false)->get();
        } else {  ###other
            $Role = ActivityLog::all();
        }
        Excel::create('ActivityLog', function($excel) use($Role) {
            $excel->sheet('Sheet 1', function($sheet) use($Role) {
                $sheet->fromArray($Role);
            });
        })->download($request['export_type']);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
         if ($request['paging'] > 0)
            $limit = $request['paging'];
        else
            $limit = 10;
        ### search
        if ($request['serach_txt']) {
            $activity_logs = ActivityLog::search($request['serach_txt'], null, false)->get();
            $page = $request->has('page') ? $request->page - 1 : 0;
            $total = $activity_logs->count();
            $activity_logs = $activity_logs->slice($page * $limit, $limit);
            $activity_logs = new \Illuminate\Pagination\LengthAwarePaginator($activity_logs, $total, $limit);
        } else {  ###other
            $activity_logs = ActivityLog::orderBy('id','desc')->paginate($limit);
        }
        $activity_logs->setPath('/roles');
        return view('admin.activitylogajax')->with(['activity_logs'=>$activity_logs,'tab'=>1,'request' => $request]);

    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        if(Auth::user()->can('delete_role')) {  #####check permission
            $temp = explode(",", $id);
            foreach ($temp as $val) {
                if ($val) {
                    $user = ActivityLog::find($val);
                    $user->delete();
                }
            }
            $activity_logs = ActivityLog::orderBy('id','desc')->paginate(10);
            $activity_logs->setPath('/roles');
           
            return view('admin.activitylogajax')->with(['activity_logs'=>$activity_logs,'tab'=>1,'flag' => 5]);
        }else{
            $activity_logs = ActivityLog::orderBy('id','desc')->paginate(10);
            $activity_logs->setPath('/roles');
              return view('admin.activitylogajax')->with(['activity_logs'=>$activity_logs,'tab'=>1,  'flag' => 6]);
        }
    }
}
