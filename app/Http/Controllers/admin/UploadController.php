<?php

namespace App\Http\Controllers\admin;

use App\admin\Module;
use App\admin\ModuleAlbum;
use App\admin\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
 use Illuminate\Http\Request;
 use App\Http\Requests;
 use App\Http\Controllers\Controller;



/**
 * Class UploadController
 * @package App\Http\Controllers\admin
 */
class UploadController extends Controller
{


    /**
     * @return string
     */
    public function uploadimage()
    {
        $file = Input::file('file');
        $destinationPath = public_path() . '/temp/';
        $extension = $file->getClientOriginalExtension();
        $filename = str_random(25).'.'.$extension;
        $upload_success = Input::file('file')->move($destinationPath, $filename);
        if ($upload_success) {
            return response()->json(['filename'=>$filename]);
        } else {
            return 'YEP: Problem in file upload';
        }

    }

    /**
     * @param Request $request
     * @return int
     * delete User avatar
     */
    public function deleteimage(Request $request)
    {
        $filename = $request['id'];
        $temp_dir = 'temp/';
        $path_final_dir = 'uploads/';
         if(File::delete($path_final_dir.$filename) || File::delete($temp_dir.$filename))
            return 1;
        return 1;
    }
   
    /**
     * @param Request $request
     * @return int
     * delete News picture
     */
    public function deleteMultiUpload(Request $request)
    {
        if($request['id']=='0')  #### in add mode
            return 1;
        $filename = $request['id'];
        $temp_dir = 'temp/';
        $path_final_dir = 'uploads/';
        if(File::delete($path_final_dir.$filename) || File::delete($temp_dir.$filename))
        {
            ModuleAlbum::where('name','=',$filename)->delete();
            return 1;                           ### update news_pic to null in html
        }
        else
        {
            return 0;
        }
    }

    /**
     * @param $id
     * @return int
     * delete image gallery
     */
    public function deleteNewsMultipleImageGallery($id)
    {
        $filename = Input::get('id');
        $temp_dir = 'temp/';
        $path_final_dir = 'uploads/';
        if(File::delete($path_final_dir.$filename) || File::delete($temp_dir.$filename))
        {
            NewsAlbum::where('title',$filename)->delete();
            return 1;   
        }
        else
        {
            return 0;
        }
    }


}
