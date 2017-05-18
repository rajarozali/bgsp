<?php

namespace Registration\Controller;


use Registration\Model\Registration;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\admin\Module;
use App\admin\ModuleAlbum;
use App\Http\Controllers\Controller;
use Regulus\ActivityLog\Models\Activity;
use Validator;
use Illuminate\Http\Request;
use File;
use App\Http\Requests;
use Illuminate\Pagination\Paginator;
use Zizaco\Entrust\Traits\EntrustTrait;
use Nicolaslopezj\Searchable\SearchableTrait;
#####use
class RegistrationController extends Controller
{
        use SearchableTrait;
    //  use EntrustUserTrait ;
	
    /**
     * @param Request $request
     * @return string
     * Export Excel & CSV & PDF
     */
    public function export_excel(Request $request){
        #### $request['export_type'] is export mode  "EXCEL or CSV"
        ### Check export PDF permission
        if($request['export_type']=='pdf'&& !Auth::user()->can('export_pdf') )
            return 'You not have this permission';
        ### Check export CSV permission
        if($request['export_type']=='csv'&& !Auth::user()->can('export_csv') )
            return 'You not have this permission';
        ### Check export EXCEL permission
        if($request['export_type']=='xls'&& !Auth::user()->can('export_xls') )
            return 'You not have this permission';
        if ($request['serach_txt']) {
            $Registration = Registration::search($request['serach_txt'], null, false)->get();
        } else {  ###other
            $Registration = Registration::all();
        }  if($request['export_type']=='pdf'){ //export PDF
            $html='<h1 style="text-align: center">YEP test pdf </h1>';
            $html .= '<style>
						table, th, td {text-align: center;}
						th, td {padding: 5px;}
						th {color: #43A047;border-color: black;background-color: #C5E1A5}
						</style>
						<table border="2" style="width:100%;">
						<tr>
							<th>Title</th>
							<th>Created date</th>
						</tr>';
            foreach ($Registration as $cat ){

                $html .="<tr>
							<td>$cat->title</td>
							<td>$cat->created_at</td>
						  </tr>";
            }
			$html .= '</table>';
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($html);
            return $pdf->download('Registration.pdf');
        }else { // export excel & csv
            Excel::create('Registration', function ($excel) use ($Registration) {
                $excel->sheet('Sheet 1', function ($sheet) use ($Registration) {
                    $sheet->fromArray($Registration);
                });
            })->download($request['export_type']);
        }
    }
	
 
    /**
     * @param Request $request
     * @return mixed
     * Search and paging
     */
    public function search(Request $request)
    {
        #####relation
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
            $Registration = Registration::search($request['serach_txt'], null, false)->get();
            $page = $request->has('page') ? $request->page - 1 : 0;
            $total = $Registration->count();
            $Registration = $Registration->slice($page * $limit, $limit);
            $Registration = new \Illuminate\Pagination\LengthAwarePaginator($Registration, $total, $limit);
        } else {  ###other
            $Registration = Registration::paginate($limit);
        }
        return view("RegistrationView::Registrationajax")->with(['request' => $request, 'tab' =>1, 'Registration' => $Registration]);
    }
	
    /**
     * @return mixed
     */
    public function index()
    {
        #####relation
        if(Auth::user()->can("view_Registration")) {
            $module_menus=app('App\Http\Controllers\admin\CrudBuilderController')->createMenumodule();
            $Registration = Registration::paginate(10);
            return view("RegistrationView::Registration")->with(['module_menus'=>$module_menus,'tab' => 1, 'Registration' => $Registration]);
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
         $module_id=\Request::segment(2);
         $module_id=Module::where('link_name',$module_id)->first();
         $Module_type_id=$module_id->id;
         #####relation
		$Registration=new Registration;
        if(Auth::user()->can("add_Registration")){  #####check permission
			if($Registration->rules){
				$validator = Validator::make($request->all(), $Registration->rules);
				if ($validator->fails()) {
					$backRegistration = Registration::paginate(10);
					return view("RegistrationView::Registrationajax")->withErrors($validator)->with(['Registration'=>$backRegistration,'tab'=>2,'editRegistration'=>$request->all()]);
				}
			}

	 	    $Registration=Registration::create($request->all());
	 	     Activity::log([
                'contentId'   => $Registration->id,
                'contentType' => 'Registration',
                'action'      => 'Create',
                'description' => 'Created a Registration',
                'details'     => 'Username: '.Auth::user()->name,
             ]);
			        ####Upload image

           if (file_exists('temp/'.$request["oneimage"]) && $request["oneimage"] != "")
            File::move("temp/" . $request["oneimage"], "uploads/" . $request["oneimage"]);


	 	                ####Multi upload image
if (isset($request["multipleimage"][0])&&$request["multipleimage"][0]) {
                $multipleimage=(json_decode($request["multipleimage"]));
                    foreach ($multipleimage as $val) {
					   if (file_exists(public_path()."/temp/" . $val) && $val !="")
                            File::move(public_path()."/temp/" . $val, public_path()."/uploads/" . $val);
                        ModuleAlbum::create(["name" => $val,"Module_type_id"=>$Module_type_id, "Module_id" => $Registration->id]);
                       }
                   }

            ######store
            $Registration = Registration::paginate(10);
            return view("RegistrationView::Registrationajax")->with(['tab'=>1,'flag'=>3,'Registration'=>$Registration]);
        }else{
            $Registration = Registration::paginate(10);
            return view("RegistrationView::Registrationajax")->with(['tab'=>1,'flag'=>6,'Registration'=>$Registration]);
        }

    }
	
    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id)
    {
         $module_id=\Request::segment(2);
         $module_id=Module::where('link_name',$module_id)->first();
         $Module_type_id=$module_id->id;
        #####relation
        #####edit many to many
        $Registration = Registration::paginate(10);
        $editRegistration = Registration::find($id);
        ####Edit multiple upload image
$editRegistration["multipleimage"]=ModuleAlbum::select("name")->where("Module_id",$id)->where("Module_type_id",$Module_type_id)->lists("name")->tojson();
        return view("RegistrationView::Registrationajax")->with(['editRegistration'=>$editRegistration,'tab'=>2,'Registration'=>$Registration]);
    }
    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $module_id=\Request::segment(2);
        $module_id=Module::where('link_name',$module_id)->first();
        $Module_type_id=$module_id->id;
		#####relation
		$Registration=new Registration;
        if(Auth::user()->can('edit_Registration')) {  #####check permission
			if($Registration->rules){
				$validator = Validator::make($request->all(),$Registration->rules);
				if ($validator->fails()) {
					$backRegistration = Registration::paginate(10);
					return view("RegistrationView::Registrationajax")->withErrors($validator)->with(['tab' => 2,'Registration'=>$backRegistration, 'editRegistration' => $request->all()]);
				}
			}
           $Registration = Registration::find($request['id']);
            $Registration->update($request->all());
            Activity::log([
                'contentId'   => $Registration->id,
                'contentType' => 'Registration',
                'description' => 'Update a Registration',
                'details'     => 'Username: '.Auth::user()->name,
                'updated'     => (bool) $Registration->id,
            ]);
			            ####update Multi upload image
if ($request["multipleimage"][0]) {
                             ModuleAlbum::where("Module_id",$request["id"])->where("Module_type_id",$Module_type_id)->delete();
                             $multipleimage=(json_decode($request["multipleimage"]));
                             foreach ($multipleimage as $val) {
					             if (file_exists(public_path()."/temp/" . $val) && $val !="")
                                  File::move(public_path()."/temp/" . $val, public_path()."/uploads/" . $val);
                                  ModuleAlbum::create(["name" => $val,"Module_type_id"=>$Module_type_id, "Module_id" => $Registration->id]);
                              }
                        }

			        ####Upload image

           if (file_exists('temp/'.$request["oneimage"]) && $request["oneimage"] != "")
            File::move("temp/" . $request["oneimage"], "uploads/" . $request["oneimage"]);


			######update Many to many
            ######store
            $backRegistration = Registration::paginate(10);
            $backRegistration->setPath('/Registration');
            return view("RegistrationView::Registrationajax")->with(['tab' => 1, 'Registration' => $backRegistration, 'flag' => 4]);
        }else{
            $backRegistration = Registration::paginate(10);
            return view("RegistrationView::Registrationajax")->with(['tab' => 1, 'Registration' => $backRegistration, 'flag' => 6]);
        }
    }	
    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $module_id=\Request::segment(2);
        $module_id=Module::where('link_name',$module_id)->first();
        $Module_type_id=$module_id->id;
         #####relation
        if(Auth::user()->can('delete_Registration')) {  #####check permission
            $temp = explode(",", $id);
            foreach ($temp as $val) {
                if ($temp) {
                   ### delete multi uploader
ModuleAlbum::where("Module_id",$val)->where("Module_type_id",$Module_type_id)->delete();


                    $user = Registration::find($val);
                    $user->delete();
                     Activity::log([
                            'contentId'   => $val,
                            'contentType' => 'Registration',
                            'action'      => 'Delete',
                            'description' => 'Delete  a Registration',
                            'details'     => 'Username: '.Auth::user()->name,
                     ]);
                }
            }
            $Registration = Registration::paginate(10);
            $Registration->setPath('/Registration');
            return view("RegistrationView::Registrationajax")->with(['tab' => 1, 'Registration' => $Registration, 'flag' => 5]);
        }else{
            $Registration = Registration::paginate(10);
            return view("RegistrationView::Registrationajax")->with(['tab' => 1, 'Registration' => $Registration, 'flag' => 6]);
        }
    }	
}
