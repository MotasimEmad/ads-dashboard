<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Background;
use App\Models\Project;
use App\Models\Information;
use App\Models\Title;
use App\Models\Form;
use App\Models\Count;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function project($id)
    {
        $backgrounds = Background::where('project_id', $id)->get();
        $titles = Title::where('project_id', $id)->get();
        $information = Information::where('project_id', $id)->get();
        $forms = Form::where('project_id', $id)->get();
        $project_id = $id;
        return view('project', compact('titles', 'backgrounds', 'project_id', 'information', 'forms'));
    }

    public function background_view()
    {
        $project = Project::where('user_id', Auth::user()->id)->pluck('id')->first();
        $backgrounds = Background::where('project_id', $project)->get();
        return view('background.create', compact('backgrounds'));
    }

    public function img_store(Request $request){
        $request->validate([
           'img' => 'required'
        ]);

        $project = Project::where('user_id', Auth::user()->id)->pluck('id')->first();
        $background = new Background();
        $background->project_id = $project;
        if($request->hasfile('img')){
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename =  time().'.'.$ext;
            $file->move('uploads/backgrounds', $filename );
            $background->img =  $filename;
        }else {
            return $request;
            $background->img = '';
        }
        $background->save();
        return redirect('/');
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
}
