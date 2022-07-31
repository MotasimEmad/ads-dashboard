<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Count;
use App\Models\Form;
use App\Models\Information;
use App\Models\Social;
use App\Models\Image;
use App\Models\Temp;
use DB;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales = User::where('role', 'Sale')->get();
        return view('admin.projects.create', compact('sales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:projects',
            'user_id' => 'required'
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->user_id = $request->user_id;
        $project->save();

        $id = $project->id;

        Temp::create([
            'filename' => NULL,
            'project_id' => $id,
        ]);

        Count::create([
            'whatsapp_total' => '0',
            'phone_total' => '0',
            'project_id' => $id,
        ]);
        
        Form::create([
            'phone_input' => 'no',
            'location_input' => 'no',
            'questions_input' => 'no',
            'timetocall_input' => 'no',
            'visible' => 'no',
            'name' => 'form1',
            'project_id' => $id,
        ]);

        Form::create([
            'phone_input' => 'no',
            'location_input' => 'no',
            'questions_input' => 'no',
            'timetocall_input' => 'no',
            'visible' => 'no',
            'name' => 'form2',
            'project_id' => $id,
        ]);

        Information::create([
            'logo' => NULL,
            'bg_img' => '',
            'site_email' => NULL,
            'about_ar' => 'عننا',
            'about_en' => NULL,
            'phone_number' => NULL,
            'whatsapp_number' => NULL,
            'project_id' => $id,
        ]);

        Social::create([
            'facebook_link' => NULL,
            'twitter_link' => NULL,
            'instagram_link' => NULL,
            'snapchat_link' => NULL,
            'project_id' => $id,
        ]);
        
        $userEmail = User::where('id', $request->user_id)->pluck('email')->first();
        $url = 'http://www.cssix.com';
        $subject = 'Admin Added You To The Dashboard.';

        $message = 'Thank You For Chosen Us. Now you can check this URL ('.$url.'/login) to use your dashboard with email & password that\'s been already given to you. And this ('.$url.'/'.$request->name.') to check your website.';
        $type = 'plain'; // or HTML
        $charset = 'utf-8';

        $mail     = 'no-reply@'.str_replace('www.', '', $_SERVER['SERVER_NAME']);
        $uniqid   = md5(uniqid(time()));
        $headers  = 'From: '.$mail."\n";
        $headers .= 'Reply-to: '.$mail."\n";
        $headers .= 'Return-Path: '.$mail."\n";
        $headers .= 'Message-ID: <'.$uniqid.'@'.$_SERVER['SERVER_NAME'].">\n";
        $headers .= 'MIME-Version: 1.0'."\n";
        $headers .= 'Date: '.gmdate('D, d M Y H:i:s', time())."\n";
        $headers .= 'X-Priority: 3'."\n";
        $headers .= 'X-MSMail-Priority: Normal'."\n";
        $headers .= 'Content-Type: multipart/mixed;boundary="----------'.$uniqid.'"'."\n";
        $headers .= '------------'.$uniqid."\n";
        $headers .= 'Content-type: text/'.$type.';charset='.$charset.''."\n";
        $headers .= 'Content-transfer-encoding: 7bit';

        mail($userEmail, $subject, $message, $headers);

        return redirect('/projects')->withSuccess('Success');
    }
    
    public function new_project(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:projects',
            'user_id' => 'required'
        ]);

        $project = Project::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'state' => $request->state,
        ]);

        $id = $project->id;

        Temp::create([
            'filename' => NULL,
            'project_id' => $id,
        ]);

        Count::create([
            'whatsapp_total' => '0',
            'phone_total' => '0',
            'project_id' => $id,
        ]);
        
        Form::create([
            'phone_input' => 'no',
            'location_input' => 'no',
            'questions_input' => 'no',
            'timetocall_input' => 'no',
            'visible' => 'no',
            'name' => 'form1',
            'project_id' => $id,
        ]);

        Form::create([
            'phone_input' => 'no',
            'location_input' => 'no',
            'questions_input' => 'no',
            'timetocall_input' => 'no',
            'visible' => 'no',
            'name' => 'form2',
            'project_id' => $id,
        ]);

        Information::create([
            'bg_img' => '',
            'site_email' => NULL,
            'about_ar' => 'عننا',
            'about_en' => NULL,
            'phone_number' => NULL,
            'whatsapp_number' => NULL,
            'project_id' => $id,
        ]);

        Social::create([
            'facebook_link' => NULL,
            'twitter_link' => NULL,
            'instagram_link' => NULL,
            'snapchat_link' => NULL,
            'project_id' => $id,
        ]);

        Auth::logout();
        return redirect('/login')->withSuccess('Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->state = $request->state;
        $project->update();
        
        $user_project = Project::where('id', $id)->pluck('user_id')->first();
        $user = User::where('id', $user_project)->pluck('id')->first();
        $userEmail = User::where('id', $user)->pluck('email')->first();
        $url = 'http://www.cssix.com';
        $subject = 'Admin Added You To The Dashboard.';

        $message = 'Thank you for your patience. Now you can check this URL ('.$url.'/login) to use your dashboard. And this ('.$url.'/'.$project->name.') to check your website.';
        $type = 'plain'; // or HTML
        $charset = 'utf-8';

        $mail     = 'no-reply@'.str_replace('www.', '', $_SERVER['SERVER_NAME']);
        $uniqid   = md5(uniqid(time()));
        $headers  = 'From: '.$mail."\n";
        $headers .= 'Reply-to: '.$mail."\n";
        $headers .= 'Return-Path: '.$mail."\n";
        $headers .= 'Message-ID: <'.$uniqid.'@'.$_SERVER['SERVER_NAME'].">\n";
        $headers .= 'MIME-Version: 1.0'."\n";
        $headers .= 'Date: '.gmdate('D, d M Y H:i:s', time())."\n";
        $headers .= 'X-Priority: 3'."\n";
        $headers .= 'X-MSMail-Priority: Normal'."\n";
        $headers .= 'Content-Type: multipart/mixed;boundary="----------'.$uniqid.'"'."\n";
        $headers .= '------------'.$uniqid."\n";
        $headers .= 'Content-type: text/'.$type.';charset='.$charset.''."\n";
        $headers .= 'Content-transfer-encoding: 7bit';

        mail($userEmail, $subject, $message, $headers);

        return redirect()->back()->withSuccess('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back()->withSuccess('success');
    }
    
    public function visible(Request $request, $id)
    {
  
        $visible = $request->input('visible');
        
        if ($request->input('visible') == NULL) {
            $visible = 'yes';
        }
        
        if ($request->input('visible') == 'yes') {
            $visible = 'no';   
        }

        DB::table('projects')->where('id', $id)->update(
            [
                'visible' => $visible, 
            ]
        );
        return redirect()->back();
    }
}
