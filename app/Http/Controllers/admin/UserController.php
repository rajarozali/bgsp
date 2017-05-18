<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Illuminate\Http\Request;
use File;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Pagination\Paginator;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Nicolaslopezj\Searchable\SearchableTrait;

class UserController extends Controller
{
    use SearchableTrait;
    use EntrustUserTrait ;

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
            $user = user::search($request['serach_txt'], null, false)->get();
        } else {  ###other
            $user = user::all();
        }
        Excel::create('user', function($excel) use($user) {
            $excel->sheet('Sheet 1', function($sheet) use($user) {
                $sheet->fromArray($user);
            });
        })->download($request['export_type']);
    }
     /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $roles=Role::all();
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
            $user = user::search($request['serach_txt'], null, false)->get();
            $page = $request->has('page') ? $request->page - 1 : 0;
            $total = $user->count();
            $user = $user->slice($page * $limit, $limit);
            $user = new \Illuminate\Pagination\LengthAwarePaginator($user, $total, $limit);
        } else {  ###other
            $user = user::paginate($limit);
        }
        return view('admin.userajax')->with(['roles'=>$roles,'request' => $request, 'tab' =>1, 'users' => $user]);
    }
     /**
     * @return mixed
     */
    public function index()
    {
        if(Auth::user()->can('view_user')) {
            $module_menus=app('App\Http\Controllers\admin\CrudBuilderController')->createMenumodule();
            $roles=Role::all();
            $users = user::orderBy('id','desc')->paginate(10);
            return view('admin.users')->with(['module_menus'=>$module_menus,'roles'=>$roles,'tab'=>1,'users'=>$users]);
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
        $roles=Role::all();
        if(Auth::user()->can('add_user')) {  #####check permission
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email|min:6',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            $backuser = user::orderBy('id','desc')->paginate(10);
            return view('admin.userajax')->withErrors($validator)->with(['user'=>$backuser,'roles'=>$roles,'tab'=>2,'edituser'=>$request->all()]);
        }
        ###  upload avatar
        if (file_exists("temp/" . $request['avatar_url']) && $request['avatar_url'] != '')
            File::move("temp/" . $request['avatar_url'], "uploads/" . $request['avatar_url']);
        $request['avatar_url']==''?Session::set('avatar_url','uploads/no_avatar.jpg'): Session::set('avatar_url',"uploads/".$request['avatar_url']);
        ####

        $request['password'] = bcrypt($request['password']);
        $user=user::create($request->all());
        DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [$user->id, $request['role_id']]);
        $users = user::orderBy('id','desc')->paginate(10);
        return view('admin.userajax')->with(['roles'=>$roles,'tab'=>1,'flag'=>3,'users'=>$users]);
        }else{
            $users = user::orderBy('id','desc')->paginate(10);
            return view('admin.userajax')->with(['roles'=>$roles,'tab'=>1,'flag'=>6,'users'=>$users]);
       }
    }
    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id)
    {
        $users = user::orderBy('id','desc')->paginate(10);
        $roles=Role::all();
        $edituser = user::find($id);
        $edituser['password'] = '********';
        return view('admin.userajax')->with(['edituser'=>$edituser,'roles'=>$roles,'tab'=>2,'users'=>$users]);
    }
    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $roles=Role::all();
        if($request['id']==1)
        {
            $backuser = user::paginate(10);
            return view('admin.userajax')->with(['edituser'=>$request->all(),'tab'=>2, 'users' => $backuser, 'flag' => 7, 'roles' => $roles]);
        }
        if(Auth::user()->can('edit_user')) {  #####check permission
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email|min:6',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            $backuser = user::orderBy('id','desc')->paginate(10);
            return view('admin.userajax')->withErrors($validator)->with(['users'=>$backuser,'roles'=>$roles,'tab'=>2,'edituser'=>$request->all()]);
        }
        ###  upload avatar
        if (file_exists("temp/" . $request['avatar_url']) && $request['avatar_url'] != '')
            File::move("temp/" . $request['avatar_url'], "uploads/" . $request['avatar_url']);
        $request['avatar_url']==''?Session::set('avatar_url','uploads/no_avatar.jpg'): Session::set('avatar_url',"uploads/".$request['avatar_url']);

        #####
        $user = user::find($request['id']);
        DB::table('role_user')->where('user_id',$user->id)->delete();
        DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [$user->id, $request['role_id']]);
        if ($request['password'] != '********')
            $request['password'] = bcrypt($request['password']);
        else
            $request['password'] = $user->password;
        $user->update($request->all());
        $backuser = user::orderBy('id','desc')->paginate(10);
        $backuser->setPath('/users');
        return view('admin.userajax')->with(['tab'=>1, 'users' => $backuser, 'flag' => 4, 'roles' => $roles]);
        }else{
            $backuser = user::orderBy('id','desc')->paginate(10);
            return view('admin.userajax')->with(['tab'=>1, 'users' => $backuser, 'flag' => 6, 'roles' => $roles]);
        }
    }
    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $roles=Role::all();
        if(Auth::user()->can('delete_user')) {  #####check permission
        $temp = explode(",", $id);
        foreach ($temp as $val)
        {
            if(Auth::user()->id==$val&&$val==1)
            {
                $users = User::orderBy('id','desc')->paginate(10);
                return view('admin.userajax')->with(['tab'=>1, 'users' => $users, 'flag' => 7, 'roles' => $roles]);
            }
            else if($val>1)
            {
                $user = user::find($val);
                $user->delete();
            }
        }
        $users = User::orderBy('id','desc')->paginate(10);
        $users->setPath('/users');

        return view('admin.userajax')->with(['tab'=>1, 'users' => $users, 'flag' => 5, 'roles' => $roles]);
        }else{
            $users = User::orderBy('id','desc')->paginate(10);
            $roles=Role::all();
            return view('admin.userajax')->with(['tab'=>1, 'users' => $users, 'flag' => 6, 'roles' => $roles]);
        }
    }

}
