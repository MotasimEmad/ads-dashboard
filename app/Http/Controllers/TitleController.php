<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Project;
use Auth;
use Illuminate\Support\Str;

class TitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::where('user_id', Auth::user()->id)->pluck('id')->first();
        $titles = Title::where('project_id', $project)->get();
        $count = Title::where('project_id', $project)->count();
        return view('sale.title.index', compact('titles', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sale.title.create');
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
            'name_ar' => 'required'
        ]);
        
        $length = Str::length($request->name_ar);
        $length_en = Str::length($request->name_en);
        
        if($length > 30 || $length_en > 30) {
           return redirect()->back()->withError('Error');
        } else {
            $project = Project::where('user_id', Auth::user()->id)->pluck('id')->first();
            $title = new Title();
            $title->name_ar = $request->name_ar;
            $title->name_en = $request->name_en;
            $title->text_color = $request->text_color;
            $title->bg_color = $request->bg_color;
            $title->project_id = $project;
    
            $title->save();
    
            return redirect('/titles')->withSuccess('Success');
        }
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
    public function edit(Title $title)
    {
        return view('sale.title.edit', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Title $title)
    {
        request()->validate([
            'name_ar' => 'required'
        ]);
        
        $title->update(request(['name_ar', 'name_en' ,'text_color' ,'bg_color']));
        return redirect('/titles')->withSuccess('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        $title->delete();
        return back()->withSuccess('Success');
    }
}
