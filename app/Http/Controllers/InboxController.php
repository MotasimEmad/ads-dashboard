<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Inbox;
use App\Models\Information;
use Auth;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::where('user_id', Auth::user()->id)->pluck('id')->first();
        $inboxes = Inbox::where('project_id', $project)->orderBy('created_at','desc')->paginate(8);
        return view('sale.inbox.index', compact('inboxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request, $id)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        
        $site_name = Project::where('id', $id)->pluck('name')->first();
        $to = Information::where('project_id', $id)->pluck('site_email')->first();
        $inbox = new Inbox();
        $inbox->name = $request->name;
        $inbox->phone = $request->phone;
        $inbox->email = $request->email;
        $inbox->location = $request->location;
        $inbox->questions = $request->questions;
        $inbox->timetocall = $request->timetocall;
        $inbox->project_id = $id;

        $inbox->save();

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
         $message = 'You have a new message from '.$request->name;
        $message .= ' - The message is: ' .$request->questions;
        $message .= ' - The Phone Number : ' .$request->phone;
        $message .= ' - The Email: ' .$request->email;
        $message .= ' - The Question is: ' .$request->location;
        $message .= ' - You call at : ' .$request->timetocall;

        $subject = 'You have a message from ' .$site_name;
        $subjectHeader = $site_name. ' - ';
        $subjectHeader .= $subject;
            
        // Sending email
        mail($to, $subjectHeader, $message, $headers);
        return redirect()->back()->withSuccess('success');
    }

    public function insert2(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        
        $site_name = Project::where('id', $id)->pluck('name')->first();
        $to = Information::where('project_id', $id)->pluck('site_email')->first();
        $inbox = new Inbox();
        $inbox->name = $request->name;
        $inbox->phone = $request->phone;
        $inbox->email = $request->email;
        $inbox->location = $request->location;
        $inbox->questions = $request->questions;
        $inbox->timetocall = $request->timetocall;
        $inbox->project_id = $id;

        $inbox->save();

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
        $message = 'You have a new message from '.$request->name;
        $message .= ' - The message is: ' .$request->questions;
        $message .= ' - The Phone Number : ' .$request->phone;
        $message .= ' - The Email: ' .$request->email;
        $message .= ' - The Question is: ' .$request->location;
        $message .= ' - You call at : ' .$request->timetocall;

        $subject = 'You have a message from ' .$site_name;
        $subjectHeader = $site_name. ' - ';
        $subjectHeader .= $subject;
            
        // Sending email
        mail($to, $subjectHeader, $message, $headers);
        return redirect()->back()->withSuccess('success');
    }
    
     public function show_message($id)
    {
        $message = Inbox::find($id);
        return view('sale.inbox.show', compact('message'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
