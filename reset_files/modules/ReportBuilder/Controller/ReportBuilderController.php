<?php

namespace ReportBuilder\Controller;


use App\admin\RelationModule;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;



use ReflectionClass;
use ReportBuilder\Model\ReportBuilder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\admin\Module;
use App\admin\ModuleAlbum;
use App\Http\Controllers\Controller;
use Task\Model\Task;
use Validator;
use Illuminate\Http\Request;
use File;
use App\Http\Requests;
use Illuminate\Pagination\Paginator;
use Williamoliveira\ArrayQueryBuilder\ArrayBuilder;
use Zizaco\Entrust\Traits\EntrustTrait;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

######use


class ReportBuilderController extends Controller
{
    /**
     * @param Request $request
     * @param ArrayBuilder $arrayBuilder
     * @return string
     */
    public function exportxls(Request $request, \Williamoliveira\ArrayQueryBuilder\ArrayBuilder $arrayBuilder)
    {

//        if(Auth::user()->can('export_xls'))
//            return 'You not have this permission';
        if ($request['module'] > "") {
            $module = Module::find($request['module']);
            $moduleStr = '\\' . $module->name . '\\Model\\' . $module->name;
            $query = $moduleStr::query();
            $query = $arrayBuilder->apply($query, $request->all());
            $excelContent=$query->get();
            Excel::create('user', function ($excel) use ($excelContent) {
                $excel->sheet('Sheet 1', function ($sheet) use ($excelContent) {
                    $sheet->fromArray($excelContent);
                });
            })->download('xls');
       } else
            return 'Please select module';
        }

    /**
     * @param Request $request
     * @param ArrayBuilder $arrayBuilder
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|string
     */
    public function queryBuilder(Request $request, \Williamoliveira\ArrayQueryBuilder\ArrayBuilder $arrayBuilder)
    {

        if ($request['module'] > "") {
            $module = Module::find($request['module']);
            $moduleStr = '\\' . $module->name . '\\Model\\' . $module->name;
            $query = $moduleStr::query();
            $query = $arrayBuilder->apply($query, $request->all());
            if($request['print']==1)
                return $query->get(); // Print preview
            else
             return $query->paginate(10); // Query builder
        } else
            return 'Please select module';

    }

    /**
     * @return array
     */
    public function allModule()
    {
        $arr = [];
        $i = 0;
        $all_modules = Module::all()->lists('name', 'id')->toArray();
        $second_modules = RelationModule::all()->lists('second', 'id')->toArray();
        $temp = array_diff($all_modules, $second_modules);
        foreach ($temp as $key => $val) {
            $arr[$i]['id'] = $key;
            $arr[$i]['name'] = $val;
            $i++;
        }
        return $arr;
    }

    /**
     * @param $id
     * @return array
     */
    public function getFields($id)
    {
        $fields = [];
        $module = Module::find($id);
        $foreignKey = array();
        if ($module->name > "")
        {
            $j = 0;
            $relations = RelationModule::where('first', $module->name)->lists('second')->toarray();
            foreach ($relations as $relation)
            {
                $foreignKey[] = str::snake($relation) . '_id';
                $secondTableName = str::plural(str::snake($relation));
                $columns = Schema::getColumnListing($secondTableName);
                $fields[$j]['parent'] = $module->name;
                $fields[$j]['name'] = $relation;
                $i = 0;
                foreach ($columns as $column)
                {
                    $fields[$j]['field'][$i]['field'] = $column;
                    $fields[$j]['field'][$i]['dataType'] = DB::connection()->getDoctrineColumn($secondTableName, $column)->getType()->getName();
                    $i++;
                }
                $j++;
            }
        }
        $tableName = str::plural(str::snake($module->name));
        $columns = Schema::getColumnListing($tableName);
        $i = 0;
        $fields[$j]['name'] = $module->name;
        foreach ($columns as $column)
        {
            if (in_array($column, $foreignKey))
            {
                $fields[$j]['field'][$i]['field'] = $column;
                $fields[$j]['field'][$i]['dataType'] = DB::connection()->getDoctrineColumn($tableName, $column)->getType()->getName();
                $temp = explode("_id", $column);
                $fields[$j]['ForeignKey'][][$column] = str::plural($temp[0]);
            }
            else
            {
                $fields[$j]['field'][$i]['field'] = $column;
                $fields[$j]['field'][$i]['dataType'] = DB::connection()->getDoctrineColumn($tableName, $column)->getType()->getName();
            }
            $i++;
        }
        return $fields;
    }

    /**
     * @return array
     */
    public function getAllReport()
    {
        $temp = ReportBuilder::all()->toarray();
        return  $temp;
    }

    /**
     * @return mixed
     */
    public function index()
    {
      //  return Task::select('id')->orderBy('id')->groupBy('gender')->count();
          //  ->count('task_category_id');

        if (Auth::user()->can("view_ReportBuilder"))
        {
            $module_menus = app('App\Http\Controllers\admin\CrudBuilderController')->createMenumodule();
            $ReportBuilder = ReportBuilder::paginate(10);
            return view("ReportBuilderView::ReportBuilder")->with(['module_menus' => $module_menus, 'tab' => 1, 'ReportBuilder' => $ReportBuilder]);
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
        $temp = json_encode($request->all());
        if (Auth::user()->can("add_ReportBuilder"))
        {
            ReportBuilder::create(['reporttext' => $temp]);
        }
        else
            return response()->json(['error' =>'You not have permission'], 403);
    }


    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id)
    {
        $temp = ReportBuilder::find($id);
        return unserialize($temp->reporttext);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
          if (Auth::user()->can('edit_ReportBuilder'))
          {
                $ReportBuilder = ReportBuilder::find($id);
                 $temp = json_encode($request->all());
                 $ReportBuilder->update(['reporttext' => $temp]);

         }
          else
              return response()->json(['error' =>'You not have permission'], 403);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function destroy($id)
    {
        if (Auth::user()->can('delete_ReportBuilder'))
        {
            $temp = explode(",", $id);
            foreach ($temp as $val)
            {
                if ($val)
                {
                    $user = ReportBuilder::find($val);
                    $user->delete();
                }
            }
            return ReportBuilder::all();
         } else
            return response()->json(['error' => 'You not have permission'], 403);
    }
}


