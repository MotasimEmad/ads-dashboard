<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Temp;

class UploadController extends Controller
{
    public function upload(Request $request, $id)
    {
        
        $val = $request->validate([
            'bg_img' => 'mimes:png,jpg',
        ]);
        
        if($val) {
           if($request->hasfile('bg_img')){
            $file = $request->file('bg_img');
            $ext = $file->getClientOriginalExtension();
            $filename =  time().'.'.$ext;
            $file->move('uploads/temp', $filename);

            $temp = Temp::where('project_id', $id)->first();
            $temp->filename = $filename;
            $temp->project_id = $id;

            $temp->update();

            return $filename;
        }

        return '';
        } else {
            dd('bad');
        }
        
            
        
       
    }

    public function image(Request $request, $id)
    {
        if($request->hasfile('img')){
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename =  time().'.'.$ext;
            $file->move('uploads/images', $filename);

            Temp::create([
                'filename' => $filename,
                'project_id' => $id,
            ]);

            return $filename;
        }

        return '';
    }
}
