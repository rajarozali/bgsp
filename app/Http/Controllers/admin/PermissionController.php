<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Nicolaslopezj\Searchable\SearchableTrait;
use Validator;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class permissionController extends Controller
{
    use SearchableTrait;
    use EntrustUserTrait;

    /*
     * search & paging $ change paging
     */
    /**
     * @param Request $request
     * @return $this
     */
    public function export_excel(Request $request)
    {
        #### $request['export_type'] is export mode  "EXCEL or CSV"
        ### Check export PDF permission
        if ($request['export_type'] == 'pdf' && !Auth::user()->can('export_pdf'))
            return 'You not have this permission';
        ### Check export CSV permission
        if ($request['export_type'] == 'csv' && !Auth::user()->can('export_csv'))
            return 'You not have this permission';
        ### Check export EXCEL permission
        if ($request['export_type'] == 'xls' && !Auth::user()->can('export_xls'))
            return 'You not have this permission';
        if ($request['serach_txt']) {
            $Permission = Permission::search($request['serach_txt'], null, false)->get();
        } else {  ###other
            $Permission = Permission::all();
        }
        if ($request['export_type'] == 'pdf') { //export PDF
            $html = '<h1>YEP test pdf </h1>';
            foreach ($Permission as $Perm) {
                $html .= "<h3>$Perm->name  </h3><hr>";
            }
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($html);
            return $pdf->download('permission.pdf');
        } else { // export excel & csv
            Excel::create('user', function ($excel) use ($Permission) {
                $excel->sheet('Sheet 1', function ($sheet) use ($Permission) {
                    $sheet->fromArray($Permission);
                });
            })->download($request['export_type']);
        }

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $currentPage = $request['page']; // You can set this to any page you want to paginate to
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        if ($request['paging'] > 0)
            $limit = $request['paging'];
        else
            $limit = 10;
        ### search
        if ($request['serach_txt']) {
            $permissions = Permission::search($request['serach_txt'], null, false)->get();
            $page = $request->has('page') ? $request->page - 1 : 0;
            $total = $permissions->count();
            $permissions = $permissions->slice($page * $limit, $limit);
            $permissions = new \Illuminate\Pagination\LengthAwarePaginator($permissions, $total, $limit);
        } else {  ###other
            $permissions = Permission::paginate($limit);
        }
        return view('admin.permissionajax')->with(['permissions' => $permissions, 'request' => $request, 'tab' => 1]);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $module_menus = app('App\Http\Controllers\admin\CrudBuilderController')->createMenumodule();
        if (Auth::user()->can('view_permission')) {
            $permissions = Permission::orderBy('id', 'desc')->paginate(10);
            return view('admin.permission')->with(['module_menus' => $module_menus, 'permissions' => $permissions, 'tab' => 1]);
        } else {
            return redirect('404');
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('add_permission')) {  #####check permission
            $permissions = Permission::orderBy('id', 'desc')->paginate(10);
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:6',
                'display_name' => 'required|min:6',
            ]);
            if ($validator->fails()) {
                return view('admin.permissionajax')->withErrors($validator)->with(['permissions' => $permissions, 'tab' => 2, 'editpermission' => $request->all()]);
            }
            Permission::create($request->all());
            $permissions = Permission::orderBy('id', 'desc')->paginate(10);
            return view('admin.permissionajax')->with(['permissions' => $permissions, 'tab' => 1, 'flag' => 3]);
        } else {
            $permissions = Permission::orderBy('id', 'desc')->paginate(10);
            return view('admin.permissionajax')->with(['permissions' => $permissions, 'tab' => 1, 'flag' => 6]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id)
    {
        $permissions = Permission::orderBy('id', 'desc')->paginate(10);
        $editpermission = Permission::find($id);
        return view('admin.permissionajax')->with(['editpermission' => $editpermission, 'permissions' => $permissions, 'tab' => 2, 'permissions' => $permissions]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        if($request['id']<=28)
        {
            $backpermission = Permission::paginate(10);
            return view('admin.permissionajax')->with(['editpermission'=>$request->all(),'tab'=>2, 'permissions' => $backpermission, 'flag' => 7]);
        }
        if (Auth::user()->can('edit_permission')) {  #####check permission
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:6',
                'display_name' => 'required|min:6',
            ]);
            if ($validator->fails()) {
                $backpermission = Permission::orderBy('id', 'desc')->paginate(10);
                return view('admin.permissionajax')->withErrors($validator)->with(['permissions' => $backpermission, 'tab' => 2, 'editpermission' => $request->all()]);
            }
            $permission = Permission::find($request['id']);
            $permission->update($request->all());
            $backpermission = Permission::orderBy('id', 'desc')->paginate(10);
            return view('admin.permissionajax')->with(['tab' => 1, 'permissions' => $backpermission, 'flag' => 4]);
        } else {
            $backpermission = Permission::orderBy('id', 'desc')->paginate(10);
            return view('admin.permissionajax')->with(['tab' => 1, 'permissions' => $backpermission, 'flag' => 6]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        if (Auth::user()->can('delete_permission')) {  #####check permission
            $temp = explode(",", $id);
            foreach ($temp as $val)
            {
                if($val<=28)
                {
                    $permissions = Permission::paginate(10);
                    $permissions->setPath('/permissions');
                    return view('admin.permissionajax')->with(['tab'=>1, 'permissions' => $permissions, 'flag' =>7]);
                }
                else if ($val>28)
                {
                    $user = Permission::find($val);
                    $user->delete();
                }
            }
            $permissions = Permission::orderBy('id', 'desc')->paginate(10);
            $permissions->setPath('/permissions');
            return view('admin.permissionajax')->with(['tab' => 1, 'permissions' => $permissions, 'flag' => 5]);
        } else {
            $permissions = Permission::orderBy('id', 'desc')->paginate(10);
            $permissions->setPath('/permissions');
            return view('admin.permissionajax')->with(['tab' => 1, 'permissions' => $permissions, 'flag' => 6]);
        }
    }
}