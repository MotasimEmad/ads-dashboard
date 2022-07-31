<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Information;
use App\Models\Count;
use App\Models\Social;
use App\Models\Image;
use App\Models\Temp;
use Auth;
use DB;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
        $user_id = Project::where('id', $id)->pluck('user_id')->first();
        if (auth()->user()->id != $user_id) {
            abort(403);
        }
        $information = Information::where('project_id', $id)->get();
        $id2 = Information::where('project_id', $id)->pluck('id')->first();
        return view('sale.general.index', compact('information', 'id', 'id2'));
    }

    public function contact($id)
    {
        $user_id = Project::where('id', $id)->pluck('user_id')->first();
        if (auth()->user()->id != $user_id) {
            abort(403);
        }
        $information = Information::where('project_id', $id)->get();
        return view('sale.general.contact', compact('information', 'id'));
    }

    public function social($id)
    {
        $user_id = Project::where('id', $id)->pluck('user_id')->first();
        if (auth()->user()->id != $user_id) {
            abort(403);
        }
        $socials = Social::where('project_id', $id)->get();
        return view('sale.general.social', compact('socials', 'id'));
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
        $request->validate([
            'about_ar' => 'required',
            'logo' => 'mimes:png,jpg,jpeg|max:3000',
            'bg_img' => 'mimes:png,jpg,jpeg|max:3000',
        ]);

        $general = Information::find($id);

        if($request->hasfile('bg_img')){
            $file = $request->file('bg_img');
            $ext = $file->getClientOriginalExtension();
            $filename =  time().'.'.$ext;
            $file->move('uploads/temp', $filename);
            $general->bg_img = $filename;
        }
        if($request->hasfile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename =  time().'.'.$ext;
            $file->move('uploads/logo', $filename);
            $general->logo = $filename;
        }
        
        $en = '';
        if ($request->en == Null) {
            $en = 'no';
        } else {
            $en = 'yes';
        }
        $general->en = $en;
        $general->site_email = $request->site_email;
        $general->about_ar = $request->about_ar;
        $general->about_en = $request->about_en;
        $general->youtube_link = $request->youtube_link;
        $general->phone_number = $request->phone_number;
        $general->whatsapp_number = $request->whatsapp_number;
        $general->map = $request->map;
        $general->update();

        return redirect()->back()->withSuccess('Success');
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

    public function form1(Request $request, $id) 
    {
        
        $all_form = $request->input('all_form');
        $phone_input = $request->input('phone_input');
        $location_input = $request->input('location_input');
        $questions_input = $request->input('questions_input');
        $timetocall_input = $request->input('timetocall_input');

        
        if ($request->input('all_form') == Null) {
            $all_form = 'no';
        }

        if ($request->input('phone_input') == Null) {
            $phone_input = 'no';
        }

        if ($request->input('location_input') == Null) {
            $location_input = 'no';
        }

        if ($request->input('questions_input') == Null) {
            $questions_input = 'no';
        }

        if ($request->input('timetocall_input') == Null) {
            $timetocall_input = 'no';
        }
        DB::table('forms')->where('project_id', $id)->where('name', 'form1')->update(
            [
                'visible' => $all_form, 
                'phone_input' => $phone_input, 
                'location_input' => $location_input,
                'questions_input' => $questions_input,
                'timetocall_input' => $timetocall_input,
            ]
        );
        return redirect()->back()->withSuccess('Success');;
     }

     public function form2(Request $request, $id) 
    {
        
        $all_form = $request->input('all_form');
        $phone_input = $request->input('phone_input');
        $location_input = $request->input('location_input');
        $questions_input = $request->input('questions_input');
        $timetocall_input = $request->input('timetocall_input');

        
        if ($request->input('all_form') == Null) {
            $all_form = 'no';
        }

        if ($request->input('phone_input') == Null) {
            $phone_input = 'no';
        }

        if ($request->input('location_input') == Null) {
            $location_input = 'no';
        }

        if ($request->input('questions_input') == Null) {
            $questions_input = 'no';
        }

        if ($request->input('timetocall_input') == Null) {
            $timetocall_input = 'no';
        }
        DB::table('forms')->where('project_id', $id)->where('name', 'form2')->update(
            [
                'visible' => $all_form, 
                'phone_input' => $phone_input, 
                'location_input' => $location_input,
                'questions_input' => $questions_input,
                'timetocall_input' => $timetocall_input,
            ]
        );
        return redirect()->back()->withSuccess('Success');
     }

     public function whatsapp_total(Request $request)
    {
        $id = $request->id;
        $whatsapps = Count::select('whatsapp_total')->where('project_id', $id)->get();

        foreach ($whatsapps as $whatsapp) {
            DB::table('counts')->where('project_id', $id)->update([
                'whatsapp_total' => $whatsapp->whatsapp_total + 1,
            ]);
        }
    }

    public function phone_total(Request $request)
    {
        $id = $request->id;
        $phones = Count::select('phone_total')->where('project_id', $id)->get();

        foreach ($phones as $phone) {
            DB::table('counts')->where('project_id', $id)->update([
                'phone_total' => $phone->phone_total + 1,
            ]);
        }
    }

    public function store_image(Request $request)
    {
        $request->validate([
            'img' => 'required|mimes:png,jpg|max:3000',
        ]);

        $project = Project::where('user_id', Auth::user()->id)->pluck('id')->first();

        $image = new Image();
        if($request->hasfile('img')){
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename =  time().'.'.$ext;
            $file->move('uploads/images', $filename);
            $image->img = $filename;
        }

        $image->link_image = $request->link_image;
        $image->project_id = $project;
        $image->save();
        
        return redirect()->back()->withSuccess('Success');
    }
    
     public function meta(Request $request, $id)
    {
        DB::table('projects')->where('id', $id)->update(
            [
                'meta_code' => $request->meta_code, 
            ]
        );

        return redirect()->back()->withSuccess('success');
    }

}
