<?php

namespace App\Http\Controllers\admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Nicolaslopezj\Searchable\SearchableTrait;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class RoleController extends Controller
{
    use SearchableTrait;
    use EntrustUserTrait ;

    /**
     * @param $str
     * @return bool
     */
    public function black_list($str){
        $arr=['request','_token','url','page','display_name','name','description','delete_value'];
        if(!in_array($str,$arr))
            return true;
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
            $Role = Role::search($request['serach_txt'], null, false)->get();
        } else {  ###other
            $Role = Role::all();
        }

        Excel::create('Role', function($excel) use($Role) {
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
        $permission = Permission::all();
        if ($request['paging'] > 0)
            $limit = $request['paging'];
        else
            $limit = 10;
        ### search
        if ($request['serach_txt']) {
            $roles = Role::search($request['serach_txt'], null, false)->get();
            $page = $request->has('page') ? $request->page - 1 : 0;
            $total = $roles->count();
            $roles = $roles->slice($page * $limit, $limit);
            $roles = new \Illuminate\Pagination\LengthAwarePaginator($roles, $total, $limit);
        } else {  ###other
             $roles = Role::orderBy('id','desc')->paginate($limit);
         }
        $roles->setPath('/roles');
        return view('admin.roleajax')->with(['permissions'=>$permission,'roles'=>$roles,'request' => $request, 'tab' =>1]);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $module_menus=app('App\Http\Controllers\admin\CrudBuilderController')->createMenumodule();
        if(Auth::user()->can('view_role')) {
        $roles = role::orderBy('id','desc')->paginate(10);
        $permission = Permission::all();
        return view('admin.role')->with(['module_menus'=>$module_menus,'permissions'=>$permission,'roles'=>$roles,'tab'=>1]);
        }else{
            return redirect('404');
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $permission = Permission::all();
        $roles = role::orderBy('id','desc')->paginate(10);
        if(Auth::user()->can('add_role')) {  #####check permission
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'display_name' => 'required|min:6',
         ]);
        if ($validator->fails()) {
            return view('admin.roleajax')->withErrors($validator)->with(['permissions'=>$permission,'roles'=>$roles,'tab'=>2,'editrole'=>$request->all()]);
        }
        $role=role::create($request->all());
        foreach($request->all() as $key =>$val) {
            if(($val)&&($this->black_list($key))){
                $prem_id= permission::select('id')->where('name'  , $key)->lists('id')->toarray();;
                $role->attachPermission($prem_id[0]);
            }
        }
        $roles = role::orderBy('id','desc')->paginate(10);
        return view('admin.roleajax')->with(['permissions'=>$permission,'roles'=>$roles,'tab'=>1,'flag'=>3]);
        }else{
            return view('admin.roleajax')->with(['permissions'=>$permission,'roles'=>$roles,'tab'=>1,'flag'=>6]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id)
    {
        $per_arr=array();
        $roles = role::orderBy('id','desc')->paginate(10);
       $editrole = role::find($id);
        $permisions =permission::select(['name','id'])->get()->toArray();
        foreach($permisions as  $val){
            $user = DB::table('permission_role')->where('permission_id',$val['id'])->where('role_id',$id)->lists('role_id');
            if(count($user))
                $per_arr[$val['name']]=1;
        }
        $permission = Permission::all();
         return view('admin.roleajax')->with(['permission_role'=>$per_arr,'permissions'=>$permission,'editrole'=>$editrole,'roles'=>$roles,'tab'=>2,'roles'=>$roles]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::all();
        if($request['id']==1)
        {
            $backrole = role::paginate(10);
            $permission = Permission::all();
            return view('admin.roleajax')->with(['editrole'=>$request->all(),'permissions'=>$permission,'tab'=>2, 'roles' => $backrole, 'flag' => 7]);

        }
        if(Auth::user()->can('edit_role')) {  #####check permission
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'display_name' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            $backrole = role::orderBy('id','desc')->paginate(10);
            return view('admin.roleajax')->withErrors($validator)->with(['permissions'=>$permission,'roles'=>$backrole,'tab'=>2,'editrole'=>$request->all()]);
        }
       $role = role::find($request['id']);
        $role->update($request->all());
        DB::table('permission_role')->where('role_id',$request['id'])->delete();
        foreach($request->all() as $key =>$val) {
            if(($val)&&($this->black_list($key))){
                $prem_id= permission::select('id')->where('name'  , $key)->lists('id')->toarray();

                if(count($prem_id))
                    $role->attachPermission($prem_id[0]);
            }
        }
        $backrole = role::orderBy('id','desc')->paginate(10);
       return view('admin.roleajax')->with(['permissions'=>$permission,'tab'=>1, 'roles' => $backrole, 'flag' => 4]);
        }else{
            $backrole = role::orderBy('id','desc')->paginate(10);
            return view('admin.roleajax')->with(['permissions'=>$permission,'tab'=>1, 'roles' => $backrole, 'flag' =>6]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        if(Auth::user()->can('delete_role')) {  #####check permission
            $temp = explode(",", $id);
            foreach ($temp as $val) 
            {
                if($val==1)
                {
                    $roles = role::paginate(10);
                    $roles->setPath('/roles');
                    $permission = Permission::all();
                    return view('admin.roleajax')->with(['permissions'=>$permission,'tab'=>1, 'roles' => $roles, 'flag' => 7]);
                }
                else if ($val>1)
                {
                    $user = role::find($val);
                    $user->delete();
                }
            }
            $roles = role::orderBy('id','desc')->paginate(10);
            $roles->setPath('/roles');
            $permission = Permission::all();
            return view('admin.roleajax')->with(['permissions'=>$permission,'tab'=>1, 'roles' => $roles, 'flag' => 5]);
        }else{
            $roles = role::orderBy('id','desc')->paginate(10);
            $roles->setPath('/roles');
            $permission = Permission::all();
            return view('admin.roleajax')->with(['permissions'=>$permission,'tab'=>1, 'roles' => $roles, 'flag' => 6]);
        }
    }
}
