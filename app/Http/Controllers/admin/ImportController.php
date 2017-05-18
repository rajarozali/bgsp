<?php

namespace App\Http\Controllers\admin;

use App\admin\News;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    /**
     * @param Request $request
     * @return int
     */
    public function importCSVEXCElDatabase(Request $request)
    {
        $excel_array = array();
        $flag = 0;
        $main_array = array_diff($request->all(), array('0'));   ### Get only select items
        $files = Excel::load($request['import_file_name'], function ($reader) {  #### Read excel file
        })->toArray();
        foreach ($files[0] as $rows) {    #### Sync fields and sheet items
            foreach ($rows as $key => $row) {
                foreach ($main_array as $main_key => $val) {
                    if ($val == $key) {
                        $excel_array[$main_key] = $row;
                    }
                }
            }
            if ($excel_array) {
                News::create($excel_array); #### Add in database
                $flag = 1;  #### Successful flag
            }
        }
        if (file_exists($request['import_file_name']))   ####delete file after import
            File::delete($request['import_file_name']);
        if ($flag == 1)
            return 1;  ### return successful
    }

    /**
     * @return string
     */
    public function importCSVEXCEl()
    {
        $columns = Schema::getColumnListing('news'); #### Get database fields
        $file = Input::file('file');    #### Get file
        $destinationPath = public_path() . '/temp/';
        $extension = $file->getClientOriginalExtension();
        $filename = str_random(25) . '.' . $extension;
        $upload_success = Input::file('file')->move($destinationPath, $filename);   #### Upload file in /tmp folder
        if ($upload_success) {
            $files = Excel::load($destinationPath . '/' . $filename, function ($reader) {   ###Read excel file
            })->toArray();
            $select_box = " <option value='0'></option>";
            foreach ($files[0][0] as $key => $val) {   ####read excel sheet title
                $select_box .= " <option value='$key'>$key</option>";
            }
            foreach ($columns as $column) {
                echo '<div class="form-group">
                      <label class="col-md-2 control-label" for="' . $column . '">' . $column . '</label>
                      <div class="col-md-4">
                           <select id="' . $column . '" name="' . $column . '" class="form-control">
                      ' .
                    $select_box
                    . '</select>
                      </div>
                   </div>';
            }
            echo "<input type='hidden' id='import_file_name' name='import_file_name' value='$destinationPath$filename'>";
        } else
            return 'Problem in import';
    }

    /**
     * @param Request $request
     * @return int
     */
    public function deleteCSVEXCEl(Request $request)
    {
        if (file_exists($request['id'])) {
            File::delete($request['id']); ####delete file
            return 1;
        }
    }
}
