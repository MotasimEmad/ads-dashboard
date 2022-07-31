<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Information;
use App\Models\Form;
use App\Models\Image;
use App\Models\Social;
use App\Models\Project;
use App\Models\Meta;
use DB;

class MainController extends Controller
{
    public function project($name)
    {
        $visible = Project::where('name', $name)->pluck('visible')->first();
        if ($visible == 'yes') {
            $project_name = Project::where('name', $name)->pluck('name')->first();
            // if(!$project_name ) {
            //     return view('404');
            // }
            $id = Project::where('name', $name)->pluck('id')->first();
            $titles = Title::where('project_id', $id)->get();
            $information = Information::where('project_id', $id)->get();
            $about_site = Information::where('project_id', $id)->pluck('about_ar')->first();
            $meta = Project::where('id', $id)->pluck('meta_code')->first();
            $en = Information::where('project_id', $id)->pluck('en')->first();
            $logo = Information::where('project_id', $id)->pluck('logo')->first();
            $bg_img = Information::where('project_id', $id)->pluck('bg_img')->first();
            $forms1 = Form::where('project_id', $id)->where('name', 'form1')->get();
            $forms2 = Form::where('project_id', $id)->where('name', 'form2')->get();
            $images = Image::where('project_id', $id)->get();
            $socials = Social::where('project_id', $id)->get();
            $project_id = $id;
            $views = Project::where('name', $name)->pluck('views')->first();
            $inc = $views + 1;
            DB::update('update projects set views = ? where id = ?',[$inc,$id]);
            return view('project', compact('titles', 'project_id', 'information', 'forms1', 'forms2', 'images', 'socials', 'project_name', 'about_site', 'logo', 'bg_img', 'en', 'meta'));
        } else {
            return view('under');
        }
    }
    
    public function meta(Request $request, $id)
    {
        DB::table('metas')->where('id', $id)->update(
            [
                'meta_code' => $request->meta_code, 
            ]
        );

        return redirect()->back()->withSuccess('success');
    }
}
