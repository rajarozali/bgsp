<?php

namespace App\Http\Controllers\admin;


use App\admin\Module;
use App\admin\RelationModule;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;


class RelationBuilderController extends Controller
{
    /**
     * @param Request $request
     * @return $this
     */
    public function __construct()
    {
        $this->composer = app()['composer'];
    }

    /**
     * @param $first
     * @param $second
     * @param $second_folder
     * @param $RelationModulesecond
     * @param $RelationModulefirst
     * @param $second_table
     * @param $first_table
     * @param $first_id
     * @param $second_id
     * @param $relation_type
     */
    public function createFirstModel($first,$second,$second_folder,$RelationModulesecond,$RelationModulefirst,$second_table,$first_table,$first_id,$second_id,$relation_type)
    {
        $str1 = file_get_contents(base_path('modules/' . $first . '/Model/' . $first . '.php'));
        ###relation section
        if($second_folder!=$first && $second=='User' &&$relation_type==1)
            $model_relation_str = 'public function ' . $second . '()' . "\n" . '{ return $this->belongsToMany("app\User");}';
        else if($second_folder!=$first && $second=='User')
            $model_relation_str = 'public function ' . $second . '()' . "\n" . '{ return $this->belongsTo("app\User");}';
        else  if($relation_type==1 && $second_folder==''&&$RelationModulesecond>"")
            $model_relation_str = 'public function ' . $second . '()' . "\n" . '{ return $this->belongsToMany("' . $RelationModulefirst . '\\Model\\' . $second . '");}';
        else  if(($relation_type==1 && $second_folder=='')||($relation_type==1 &&$second==$second_folder))
            $model_relation_str = 'public function ' . $second . '()' . "\n" . '{ return $this->belongsToMany("' . $second . '\\Model\\' . $second . '");}';
        else  if($relation_type==1)
            $model_relation_str = 'public function ' . $second . '()' . "\n" . '{ return $this->belongsToMany("' . $first . '\\Model\\' . $second . '");}';
        else if($RelationModulesecond>"")
            $model_relation_str = 'public function ' . $second . '()' . "\n" . '{ return $this->belongsTo("' . $RelationModulefirst . '\\Model\\' . $second . '");}';
        else
            $model_relation_str = 'public function ' . $second . '()' . "\n" . '{ return $this->belongsTo("' . $first . '\\Model\\' . $second . '");}';

        $str1 = str_replace('#####relation#####', '#####relation#####' . "\n" . $model_relation_str, $str1);

        ###joins section
        if(RelationModule::where('first',$first)->count()>0){
            $model_join_str ="'$second_table' => ['$first_table.$first_id','$second_table.$second_id'],";
            $str1 = str_replace("'joins' => [", "'joins' => [" . "\n" . $model_join_str, $str1);
        }else {
            $model_join_str = "'joins' => [
                '$second_table' => ['$first_table.$first_id','$second_table.$second_id'],
            ],###";
            $str1 = str_replace('########join', '########join' . "\n" . $model_join_str, $str1);
        }
        ###relation id
        $model_relation_id = '';

        if($first&&$second=='User')
            $str='\\app\\User';
        else if($RelationModulesecond>"")
            $str='\\'.$RelationModulefirst . "\\Model\\" . $second;
        else if($first&&$second_folder!='user')
            $str='\\'.$second . "\\Model\\" . $second;
        else
            $str = "\\" . $first . "\\Model\\" . $second;
        $second_class = new $str;
        $temp = $second_class->searchable;

        foreach ($temp['columns'] as $key => $val) {
            $model_relation_id .= "'" . $key . "'" . '=>' . $val . ",\n";
        }
        $str1 = str_replace('########relation_id', '########relation_id' . "\n" . $model_relation_id, $str1);
        file_put_contents(base_path('modules/' . $first . '/Model/' . $first . '.php'), $str1);
    }

    /**
     * @param $second
     * @param $first
     * @param $second_folder
     * @param $RelationModulesecond
     * @param $RelationModulefirst
     * @param $first_table_name
     * @param $second_table_name
     * @param $relation_type
     * @param $first_id
     * @param $second_field_name
     */
    public function createFirstController($second,$first,$second_folder,$RelationModulesecond,$RelationModulefirst,$first_table_name,$second_table_name,$relation_type,$first_id,$second_field_name)
    {

        $str1 = file_get_contents(base_path('modules/'.$first.'/Controller/'.$first.'Controller.php'));
        $str=strtolower(Str::snake($second));

        /*
         * use section
         */
        if($second=='User')
            $contoller_use_str="use app\\User;\n";
        else if($second_folder!=$first&&$RelationModulesecond>"")
            $contoller_use_str="use " . $RelationModulefirst. "\\Model\\" . $second . ";\n";
        else if($second_folder!=$first)
            $contoller_use_str="use " . $second . "\\Model\\" . $second . ";\n";
        else
            $contoller_use_str="use ".$first."\\Model\\".$second.";\n";
        $str1=str_replace('#####use','#####use'."\n".$contoller_use_str,$str1);



        /*
         * view section
         */
        if($relation_type==1) {
            $manyToManyEdit_str= '$edit_'.$second.' = '.$first.'::with("'.$second.'")->where("id",$id)->get()->toArray();
            $'.$second.'["edit_'.$second.'"]=[];
            foreach ($edit_'.$second.'[0]["'.strtolower($second).'"] as $key=>$val){
                array_push($'.$second.'["edit_'.$second.'"],$val["id"]) ;
            }';
            $str1 = str_replace('#####edit many to many', '#####edit many to many' . "\n" .$manyToManyEdit_str, $str1);
        }
        $str1=str_replace('#####relation','#####relation'."\n"."		".'$'."$second=".$second.'::all()->lists("'.$second_field_name.'","id")->toarray();',$str1);
        $str1=str_replace(')->with([',')->with(['."'".$second."'"."=>".'$'."$second,",$str1);

         /*
         * ###store section
         */
        if($relation_type==1){
            $store_controller_str = '$'.$first.'->'.$second.'()->detach();
            $'.$first.'->'.$second.'()->attach($request["'.$first_id.'"]);';
        }else{
            $store_controller_str='            $add'."$second = $second::find(".'$request["'.$first_id.'"]'.");\n".
                '$add'."$second->$first()->save($"."$first);";
        }
        $str1=str_replace('######store','######store'."\n".$store_controller_str,$str1);
        file_put_contents(base_path('modules/'.$first.'/Controller/'.$first.'Controller.php'),$str1);
    }

    /**
     * @param $first
     * @param $second
     * @param $relation_type
     * @param $first_id
     */
    public function createFirstView($first,$second,$relation_type,$first_id)
    {
        $str1 = file_get_contents(base_path('modules/'.$first.'/View/'.$first.'ajax.blade.php'));
        $view_str='{{--start'.$second.'--}}              <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-field-1">'.
            $second.'
                            </label>
                            <div class="col-sm-9">'."\n";
        if($relation_type==1){
            $view_str.='                                <?php  if(isset($'.$second.'["edit_'.$second.'"])){
                                   $edit_'.$second.'=$'.$second.'["edit_'.$second.'"];
                                   unset($'.$second.'["edit_'.$second.'"]);
                                }?>'."\n";
            $view_str.='                                <select  name="'.$first_id.'[]" style="width:100%" class="select2 manyToManySelect2" multiple="multiple">
                                   @foreach($'.$second.' as $key=>$val)
                                      <option <?php if(isset($edit_'.$second.')&&in_array($key,$edit_'.$second.')) echo " selected " ?> value="{{$key}}">{{$val}}</option>
                                   @endforeach
                                </select>';
        }else{
            $view_str.=' <select name="'.$first_id.'" class="form-control">'.'
                                    @foreach($'.$second.' as $key=>$val)
                                    <option  <?php if(isset($edit'.$first.')&&($edit'.$first.'['."'".$first_id."'".']==$key)) echo "selected"?> value="{{$key}}">{{$val}}</option>
                                    '.'@endforeach
                                </select>';
        }

        $view_str.="\n".'                         </div>
                        </div>{{--end'.$second.'--}}';
        $str1=str_replace('{{--relation fields--}}','{{--relation fields--}}'."\n".$view_str,$str1);
        file_put_contents(base_path('modules/'.$first.'/View/'.$first.'ajax.blade.php'),$str1);
    }

    /**
     * @param $first
     * @param $second
     * @param $manyToManyTable
     * @param $first_table_name1
     * @param $first_table
     * @param $first_id
     * @param $second_table_name1
     * @param $relation_type
     */
    public function createFirstMigration($first,$second,$manyToManyTable,$first_table_name1,$first_table,$first_id,$second_table_name1,$relation_type)
    {
        /*
 * migration
 */
        $migration_str='<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;'."\n";
        if($relation_type==1){
            $migration_str .='class '.$first.$second.' extends Migration{'."\n".'public function up(){
    Schema::create('. "'".$manyToManyTable. "'".', function($table) {'."\n";
            $migration_str .= '        $table->integer(' . "'" .Str::snake($second).'_id'. "'" . ')->nullable()->unsigned();' . "\n" .
                '        $table->foreign(' . "'" .Str::snake($second).'_id' . "'" . ')->references("id")->on(' . "'" . $second_table_name1 . "'" . ')->onDelete("cascade");'."\n".'
         $table->integer(' . "'" .Str::snake($first).'_id'. "'" . ')->nullable()->unsigned();' . "\n" .
                '        $table->foreign(' . "'" .Str::snake($first).'_id' . "'" . ')->references("id")->on(' . "'" . $first_table_name1 . "'" . ')->onDelete("cascade");
    });
}'."\n";
            ###remove primary key
            $migration_str .= 'public function down(){'."\n".
                '    Schema::drop("'.$manyToManyTable.'");
}
}';
            file_put_contents(base_path('database/migrations/' . date('Y_m_d_His').'_'.$first.$second . '.php'), $migration_str);
        }else  if($relation_type!=1){
            $migration_str .='class '.$first.'Relation'.$second.' extends Migration
         {'."\n".'  public function up()
                {   Schema::table('. "'".$first_table. "'".', function($table) {';
            $migration_str .= '            $table->integer(' . "'" .$first_id. "'" . ')->nullable()->unsigned();' . "\n" .
                '            $table->foreign(' . "'" .$first_id . "'" . ')->references("id")->on(' . "'" . $second_table_name1 . "'" . ')->onDelete("cascade");
                     });
                }';

            ###remove primary key
            $migration_str .= '    public function down(){'."\n".
                '             Schema::table(' . "'" . $first_table . "'" . ', function(Blueprint $table){' . "\n" .
                '                $table->dropForeign([' . "'" .$first_id. "'" . ']);' . "\n" .
                '               $table->dropColumn(' . "'" .$first_id . "'" . ');' . "\n" .
                '         });
             }
      }';
            file_put_contents(base_path('database/migrations/' . date('Y_m_d_His').'_'.$first.'Relation'.$second . '.php'), $migration_str);
        }
    }

    /**
     * @param $second
     * @param $first
     */
    public function createSecondController($second,$first)
    {
        $str = file_get_contents(base_path('modules/' . $second . '/Controller/' . $second . 'Controller.php'));
        $str = str_replace($second . 'View', $first . 'View', $str);
        $str = str_replace('namespace ' . $second . '\\Controller', 'namespace ' . $first . '\\Controller' . "\n", $str);
        $str = str_replace('use ' . $second . '\\Model\\' . $second, 'use ' . $first . '\\Model\\' . $second . "\n", $str);
        file_put_contents(base_path('modules/' . $first . '/Controller/' . $second . 'Controller.php'), $str);
    }

    /**
     * @param $second
     * @param $first
     */
    public function createSecondModel($second,$first)
    {
        $str1 = file_get_contents(base_path('modules/' . $second . '/Model/' . $second . '.php'));
        ###namespace section
        $str1 = str_replace('namespace ' . $second . '\\Model', 'namespace ' . $first . '\\Model', $str1);

        ###relation section
        $model_relation_str ='public function ' . $first . '()' . "\n" . '{ return $this->hasMany("' . $first . '\\Model\\' . $first . '");}';
        $str1 = str_replace('#####relation#####', '#####relation#####' . "\n" . $model_relation_str, $str1);
        file_put_contents(base_path('modules/' . $first . '/Model/' . $second . '.php'), $str1);
    }

    /**
     * @param $second
     * @param $first
     */
    public function createSecondView($second,$first)
    {
        $dir = base_path('modules/' . $second . '/View');
        if (\File::isDirectory($dir)) {
            foreach (\File::glob($dir . '/*.*') as $projectDir) {
                $fileContents = file_get_contents($projectDir);
                $str = str_replace($second . 'View', $first . 'View', $fileContents);
                file_put_contents(base_path('modules/' . $first . '/View/' . basename($projectDir)), $str);
            }
        }
    }

    /**
     * @param $second
     * @param $first
     */
    public function createSecondRoute($second,$first)
    {
        $fileContents = file_get_contents(base_path('modules/' . $second . '/Route/routes.php'));
        preg_match('/####start(.*?)####end/s', $fileContents, $second_route_str);
        $fisrt_route_str = file_get_contents(base_path('modules/' . $first . '/Route/routes.php'));
        $second_route_str = str_replace($second , $first, $second_route_str[1]);
        $second_route_str = str_replace($first.'Controller', $second .'Controller', $second_route_str);
        $str = str_replace('#####relation#####', '#####relation#####' . "\n" . $second_route_str, $fisrt_route_str);
        file_put_contents(base_path('modules/' . $first . '/Route/routes.php'), $str);
    }

    /**
     * @param $second
     */
    public function addToConfig($second)
    {
        $str22 = '        ' . $second . '\\' . $second . 'ServiceProvider::class' . ', //' . $second . '  module';
        $str1 = file_get_contents(base_path('config/app.php'));
        $str1q = str_replace($str22, '###' . $str22 . '\n', $str1);
        file_put_contents(base_path('config/app.php'), $str1q);
    }

    /**
     * @param $second
     */
    public function addToComposer($second)
    {
        $str22 = '            ' . '"' . $second . '\\\\' . '"' . ': ' . '"' . "modules" . '/' . $second . '/' . '"' . ',';
        $str11 = file_get_contents(base_path('composer.json'));
        $str11 = str_replace($str22, '', $str11);
        file_put_contents(base_path('composer.json'), $str11);
    }

    /**
     * @param $first
     */
    public function addToUser($first)
    {
        $str1 = file_get_contents(base_path('app/User.php'));
        ###relation section
        $model_relation_str = 'public function ' . $first . '()' . "\n" . '{ return $this->hasMany("' . $first . '\\Model\\' . $first . '");}';
        $str1 = str_replace('#####relation#####', '#####relation#####' . "\n" . $model_relation_str, $str1);
        file_put_contents(base_path('app/User.php'), $str1);
    }
    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $first = $request['first'];
        $second_folder = $request['merge_folder'];
        $relation_type = $request['relation_type'];
        $second_field_name = $request['second_field_name'];
        $second = $request['second'];
        $checkRelation=RelationModule::where('first','=',$first)->where('second','=',$second)->count();
         if($checkRelation>0)
            return response()->json(['error' => 'This relation is duplicated'], 401);
        $temp=array($first,$second);
        sort($temp);
        $manyToManyTable=  Str::snake($temp[0].$temp[1]);
        $first_id = Str::snake($second).'_id';
        $second_id = 'id';
        $first_table_name = Str::plural($first);
        $second_table_name = Str::plural($second);
        $second_table = Str::snake($second_table_name);
        $first_table = Str::snake($first_table_name);
        $RelationModulesecond='';
        $RelationModulefirst='';
        $RelationModule=RelationModule::where('first','=',DB::raw('merge_folder'))->where('second','=',$second)->first();
        if(isset($RelationModule->second)){
            $RelationModulefirst=$RelationModule->first;
            $RelationModulesecond=$RelationModule->second;
        }
        $first_table_name1= Str::lower($first_table_name);
        $second_table_name1= Str::snake($second_table_name);
        $second_table_name1= Str::lower($second_table_name1);

        $this->createFirstModel($first,$second,$second_folder,$RelationModulesecond,$RelationModulefirst,$second_table,$first_table,$first_id,$second_id,$relation_type);
        $this->createFirstController($second,$first,$second_folder,$RelationModulesecond,$RelationModulefirst,$first_table_name,$second_table_name,$relation_type,$first_id,$second_field_name);
        $this->createFirstView($first,$second,$relation_type,$first_id);
        $this->createFirstMigration($first,$second,$manyToManyTable,$first_table_name1,$first_table,$first_id,$second_table_name1,$relation_type);
        if($second_folder==$first) {
            $this->createSecondController($second,$first);
            $this->createSecondModel($second,$first);
            $this->createSecondView($second,$first);
            $this->createSecondRoute($second,$first);
            if($second!='User') {
                $this->addToConfig($second);
                $this->addToComposer($second);
            }
        }else  if($second_folder!=$first&&$second=='User' ) {
            $this->addToUser($first);
        }else  if($second_folder!=$first) {
            if($RelationModulesecond>"")
                 $str1 = file_get_contents(base_path('modules/' . $RelationModulefirst . '/Model/' . $second . '.php'));
            else
                $str1 = file_get_contents(base_path('modules/' . $second . '/Model/' . $second . '.php'));
            ###relation section
            $model_relation_str = 'public function ' . $first . '()' . "\n" . '{ return $this->hasMany("' . $first . '\\Model\\' . $first . '");}';
            $str1 = str_replace('#####relation#####', '#####relation#####' . "\n" . $model_relation_str, $str1);
            if($RelationModulesecond>"")
                file_put_contents(base_path('modules/' .  $RelationModulefirst . '/Model/' . $second . '.php'), $str1);
               else
                   file_put_contents(base_path('modules/' . $second . '/Model/' . $second . '.php'), $str1);
        }
        RelationModule::create($request->all());
        Artisan::call("migrate");
        $this->dumpOptimized($first,$second,1,$relation_type);
         return (['flag'=>20,'first_module'=>$first]);
    }

    /**
     * @return mixed
     */
    public function index(){
        
        $module_menus=app('App\Http\Controllers\admin\CrudBuilderController')->createMenumodule();
        $relation=RelationModule::all();

        return view('admin.relation')->with(['relation'=>$relation,'module_menus'=>$module_menus,'tab' => 1]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getRelation(){
        $relation=RelationModule::all();
        return $relation;
    }

    /**
     * @param $tablename
     * @return mixed
     */
    public function showColumn($tablename){
        $tablename=str::snake($tablename);
        $tablename=str::plural($tablename);
        return  Schema::getColumnListing($tablename);
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $this->composer->dumpOptimized();
        $this->destroy($request['id']);
        $this->composer->dumpOptimized();
        $this->store($request);
        $this->composer->dumpOptimized();
    }

    /**
     * @param $first
     * @param $second
     * @param $merge_folder
     * @param $RelationModulesecond
     * @param $RelationModulefirst
     */
    public function removeSecondModel($first,$second,$merge_folder,$RelationModulesecond,$RelationModulefirst)
    {
        $strFind = 'public function ' . $first . '()' . "\n" . '{ return $this->hasMany("' . $first . '\\Model\\' . $first . '");}';
        if ($second == 'User') {
            $str1 = file_get_contents(base_path('app/User.php'));
            $str1 = str_replace($strFind, '', $str1);
            file_put_contents(base_path('app/User.php'), $str1);

        } else if ($second == $merge_folder ||$merge_folder=='') {
            $str1 = file_get_contents(base_path('Modules/' . $second . '/Model/' . $second . '.php'));
            $str1 = str_replace($strFind, '', $str1);
            file_put_contents(base_path('Modules/' . $second . '/Model/' . $second . '.php'), $str1);
        }else if($RelationModulesecond>""){
            $strFind = 'public function ' . $first . '()' . "\n" . '{ return $this->hasMany("' . $first . '\\Model\\' . $first . '");}';
            $str1 = file_get_contents(base_path('Modules/' . $RelationModulefirst . '/Model/' . $second . '.php'));
            $str1 = str_replace($strFind, '', $str1);
            file_put_contents(base_path('Modules/' . $RelationModulefirst . '/Model/' . $second . '.php'), $str1);
        }
    }

    /**
     * @param $first
     * @param $second
     * @param $relation_type
     */
    public function removeSecondFile($first,$second,$relation_type)
    {
        File::delete(base_path('modules/' . $first . '/Controller/' . $second . 'Controller.php'));
        if($relation_type==1)
            File::delete(base_path('modules/' . $first . '/Model/' . $first.Str::plural($second). '.php'));
        File::delete(base_path('modules/' . $first . '/Model/' . $second . '.php'));
        File::delete(base_path('modules/' . $first . '/View/' . $second . '.blade.php'));
        File::delete(base_path('modules/' . $first . '/View/' . $second . 'ajax.blade.php'));
        File::delete(base_path('modules/' . $first . '/View/' . $second . 'fields.blade.php'));
        File::delete(base_path('modules/' . $first . '/View/' . $second . 'show_table_fields.blade.php'));
        File::delete(base_path('modules/' . $first . '/View/' . $second . 'show_table_header.blade.php'));
    }

    /**
     * @param $first
     * @param $link_name
     * @param $second
     */
    public function removeSecondRoute($first,$link_name,$second)
    {
        $str11 = file_get_contents(base_path('modules/' . $first . '/Route/routes.php'));
        $str11 = str_replace("Route::resource('" . $link_name . "','" . $first . "\\Controller\\" . $second . "Controller');", '', $str11);
        $str11 = str_replace("Route::post('" . $link_name . "/search','" . $first . "\\Controller\\" . $second . "Controller@search');", '', $str11);
        $str11 = str_replace("Route::post('" . $link_name . "/export/excel','" . $first . "\\Controller\\" . $second . "Controller@export_excel');", '', $str11);
        file_put_contents(base_path('modules/' . $first . '/Route/routes.php'), $str11);
    }

    /**
     * @param $second
     */
    public function removeComposer($second)
    {
        $composerStr = file_get_contents(base_path('composer.json'));
        $composerStr = str_replace('"psr-4": {', '"psr-4": {' . "\n" . '            ' . '"' . $second . '\\\\' . '"' . ': ' . '"' . "modules" . '/' . $second . '/' . '"' . ',', $composerStr);
        file_put_contents(base_path('composer.json'), $composerStr);
    }

    /**
     * @param $first
     * @param $second
     */
    public function removeFirstView($first,$second)
    {
        $str1 = file_get_contents(base_path('modules/'.$first.'/View/'.$first.'ajax.blade.php'));
        $startTemp=explode('{{--start'.$second.'--}}',$str1);
        $endTemp=explode('{{--end'.$second.'--}}',$startTemp[1]);
        file_put_contents(base_path('modules/'.$first.'/View/'.$first.'ajax.blade.php'),  $startTemp[0].$endTemp[1]);
    }
    /**
     * @param $second
     */
    public function removeConfig($second)
    {
        $str1 = file_get_contents(base_path('config/app.php'));
        $str1q = str_replace("'providers' => [", "'providers' => [" . "\n" . "        " . $second . '\\' . $second . 'ServiceProvider::class' . ', //' . $second . '  module' . "\n", $str1);
        file_put_contents(base_path('config/app.php'), $str1q);
    }

    /**
     * @param $first
     * @param $second_table_name
     * @param $second
     * @param $merge_folder
     * @param $relation_type
     * @param $RelationModulesecond
     * @param $RelationModulefirst
     */
    public function removeFirstModel($first,$second_table_name,$second,$merge_folder,$relation_type,$RelationModulesecond,$RelationModulefirst)
    {
        $lines = file(base_path('modules/'.$first.'/Model/'.$first.'.php'), FILE_IGNORE_NEW_LINES);
        foreach($lines as $key => $line)
            if(stristr($line, $second_table_name)) unset($lines[$key]);
        $data = implode("\n", array_values($lines));
        $file = fopen(base_path('modules/'.$first.'/Model/'.$first.'.php'),'w');
        fwrite($file, $data);
        fclose($file);
        $str1 = file_get_contents(base_path('modules/'.$first.'/Model/'.$first.'.php'));
        if($second=='User'&&$relation_type==1)
            $strFind = 'public function ' . $second . '()' . "\n" . '{ return $this->belongsToMany("app\User");}';
        else if($second=='User')
            $strFind = 'public function ' . $second . '()' . "\n" . '{ return $this->belongsTo("app\User");}';
        else if($relation_type==1 && ($merge_folder==''||$second==$merge_folder))
            $strFind= 'public function ' . $second . '()' . "\n" . '{ return $this->belongsToMany("' . $second . '\\Model\\' . $second . '");}';
        else if($relation_type==1&&$RelationModulesecond>"")
            $strFind= 'public function ' . $second . '()' . "\n" . '{ return $this->belongsToMany("' . $RelationModulefirst . '\\Model\\' . $second . '");}';
        else if($relation_type==1)
            $strFind= 'public function ' . $second . '()' . "\n" . '{ return $this->belongsToMany("' . $first . '\\Model\\' . $second . '");}';
        else if($RelationModulesecond>"")
            $strFind= 'public function ' . $second . '()' . "\n" . '{ return $this->belongsTo("' . $RelationModulefirst . '\\Model\\' . $second . '");}';

        else
            $strFind= 'public function ' . $second . '()' . "\n" . '{ return $this->belongsTo("' . $first . '\\Model\\' . $second . '");}';
        $str1=str_replace($strFind,'',$str1);

        if(RelationModule::where('first',$first)->count()==1){
            $str1=str_replace("'joins' => [",'',$str1);
            $str1=str_replace("],###",'',$str1);
        }
        file_put_contents(base_path('modules/'.$first.'/Model/'.$first.'.php'), $str1);
    }

    /**
     * @param $second
     * @param $first
     * @param $merge_folder
     * @param $RelationModulesecond
     * @param $RelationModulefirst
     * @param $second_field_name
     * @param $relation_type
     * @param $first_id
     */
    public function removeFirstControoller($second,$first,$merge_folder,$RelationModulesecond,$RelationModulefirst,$second_field_name,$relation_type,$first_id)
    {
        $str1 = file_get_contents(base_path('modules/'.$first.'/Controller/'.$first.'Controller.php'));
        if($second=='User')
            $str1=str_replace("use app\\User;",'',$str1);
        else  if($second==$merge_folder||$merge_folder=='')
            $str1=str_replace("use $second\\Model\\$second;",'',$str1);
        else if($RelationModulesecond>"")
            $str1=str_replace("use $RelationModulefirst\\Model\\$second;",'',$str1);
        else
            $str1=str_replace("use $first\\Model\\$second;",'',$str1);
        $str1=str_replace("		".'$'."$second=".$second.'::all()->lists("'.$second_field_name.'","id")->toarray();','',$str1);
        if($relation_type==1){
            $str1=str_replace('$edit_'.$second.' = '.$first.'::with("'.$second.'")->where("id",$id)->get()->toArray();
            $'.$second.'["edit_'.$second.'"]=[];
            foreach ($edit_'.$second.'[0]["'.strtolower($second).'"] as $key=>$val){
                array_push($'.$second.'["edit_'.$second.'"],$val["id"]) ;
            }','',$str1);

            $temp='$'.$first.'->'.$second.'()->detach();
            $'.$first.'->'.$second.'()->attach($request["'.$first_id.'"]);';
            $str1=str_replace($temp,'',$str1);
            $str1=str_replace('$'.$second.'["edit_'.$second.'"]=$edit_'.$second.';','',$str1);
            $str1=str_replace('$edit_'.$second.'='.$first.Str::plural($second).'::where("'.Str::snake($first).'_id'.'",$id)->lists("'.Str::snake($second).'_id'.'")->toarray();'."\n",'',$str1);
        }


        $str1=str_replace('$'."$second=$second::all();",'',$str1);
        $str1=str_replace("'$second'=>".'$'."$second,",'',$str1);
        $storeStr='$add'.$second.' = '.$second.'::find($request["'.$first_id.'"]);';
        $str1=str_replace($storeStr,'',$str1);
        $storeStr='$add'.$second.'->'.$first.'()->save($'.$first.');';
        $str1=str_replace($storeStr,'',$str1);
        file_put_contents(base_path('modules/'.$first.'/Controller/'.$first.'Controller.php'), $str1);
    }
    /**
     * @param $id
     */
    public function removeMigration($relation_type,$first,$second)
    {
        if($relation_type==1) {
            DB::table('migrations')->where('migration', 'like', '%_' . $first . $second . '%')->update(['batch' => 2500]);
            $migrations = DB::table('migrations')->where('migration', 'like', '%_' . $first . $second . '%')->first();
        } else if($relation_type!=1) {
            DB::table('migrations')->where('migration', 'like', '%_' . $first . 'Relation' . $second . '%')->update(['batch' => 2500]);
            $migrations = DB::table('migrations')->where('migration', 'like', '%_' . $first . 'Relation' . $second . '%')->first();
        }
        Artisan::call("migrate:rollback");
        if(file_exists(base_path('database/migrations/'.$migrations->migration.'.php')))
            File::delete(base_path('database/migrations/'.$migrations->migration.'.php'));
    }
    public function dumpOptimized($first,$second,$type,$relationType)
    {
        $str1 = file_get_contents(base_path('vendor/composer/autoload_classmap.php'));
        if($type==0)
        {
            if($relationType==0)
            {
                $migrations=DB::table('migrations')->where('migration','like', "%_".$first.'Relation'.$second."%")->first();
                $migration_name=$migrations->migration;
                $this->removeMigration($relationType,$first,$second);
                $str_find="    '".$first.'Relation'.$second."'".' => $baseDir . '."'/database/migrations/$migration_name.php',";
            }
            else  if($relationType==1)
            {
                $migrations=DB::table('migrations')->where('migration','like', "%_".$first.$second."%")->first();
                $migration_name=$migrations->migration;
                $this->removeMigration($relationType,$first,$second);
                $str_find="    '".$first.$second."'".' => $baseDir . '."'/database/migrations/$migration_name.php',";
            }
            $str_replace='';

        }
        else if($type==1)
        {
                $first_migrations=DB::table('migrations')->where('migration','like', "%_".$first)->first();
                 $first_migration=$first_migrations->migration;
                 $str_find ="    '".$first."'".' => $baseDir . '."'/database/migrations/$first_migration.php',";
            if($relationType==0)
            {
                $serach_migrations=DB::table('migrations')->where('migration','like', "%_".$first.'Relation'.$second."%")->first();
                $str_replace=$str_find."\n"."    '".$first.'Relation'.$second."'".' => $baseDir . '."'/database/migrations/$serach_migrations->migration.php',";
            }

            else  if($relationType==1)
            {
                $serach_migrations=DB::table('migrations')->where('migration','like', "%_".$first.$second."%")->first();
                $str_replace=$str_find."\n"."    '".$first.$second."'".' => $baseDir . '."'/database/migrations/$serach_migrations->migration.php',";
            }
        }

        $str11=str_replace($str_find,$str_replace,$str1);
        file_put_contents(base_path('vendor/composer/autoload_classmap.php'),  $str11);
        $dump=new CrudBuilderController;
        file_put_contents(base_path('vendor/composer/autoload_static.php'),app('App\Http\Controllers\admin\CrudBuilderController')->getStaticFile());
    }
    public function destroy($id)
    {
       // $this->composer->dumpOptimized();
       $RelationModule = RelationModule::find($id);
        $relation_type=$RelationModule->relation_type;
        $first = $RelationModule->first;
        $second = $RelationModule->second;
        $second_field_name = $RelationModule->second_field_name;
        $merge_folder = $RelationModule->merge_folder;
        $RelationModule->delete();
        $RelationModulesecond='';
        $RelationModulefirst='';
        $RelationModule=RelationModule::where('first','=',DB::raw('merge_folder'))->where('second','=',$second)->first();
        if(isset($RelationModule->second)){
            $RelationModulefirst=$RelationModule->first;
            $RelationModulesecond=$RelationModule->second;
        }
        $second_table_name = strtolower(Str::snake(str::plural($second)));
        $second_table = str::plural($second);
        $first_id = Str::snake($second) . '_id';
        $temp = Module::where('name', $second)->first();
        if ($second == 'User')
            $link_name = 'users';
        else
            $link_name = $temp->link_name;
        $this->removeSecondModel($first,$second,$merge_folder,$RelationModulesecond,$RelationModulefirst);
        $this->removeSecondFile($first,$second,$relation_type);
        $this->removeSecondRoute($first,$link_name,$second);
        if ($second != 'User'&&$RelationModulesecond==''){
           $this->removeComposer($second);
           $this->removeConfig($second);
        }

        $this->removeFirstView($first,$second);
        $this->removeFirstModel($first,$second_table_name,$second,$merge_folder,$relation_type,$RelationModulesecond,$RelationModulefirst);
        $this->removeFirstControoller($second,$first,$merge_folder,$RelationModulesecond,$RelationModulefirst,$second_field_name,$relation_type,$first_id);
        $this->dumpOptimized($first,$second,0,$relation_type);
    }
}

