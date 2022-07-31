<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Form;
use App\Models\Count;
use App\Models\Inbox;
use App\Models\Meta;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/meta', function () {
    $metas = Meta::all();
    return view('meta', compact('metas'));
})->name('/meta')->middleware('auth');

Route::get('/sale/meta', function () {
    $metas = Project::where('user_id', Auth::user()->id)->get();
    return view('sale.meta', compact('metas'));
})->middleware('auth');

Route::patch('/meta/{id}', [\App\Http\Controllers\MainController::class, 'meta'])->name('meta.store');
Route::patch('sale/meta/{id}', [\App\Http\Controllers\InformationController::class, 'meta']);
    
Route::get('/', function () {
    $metas = Meta::all();
    return view('welcome', compact('metas'));
})->name('/');

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/admin', [\App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('projects', App\Http\Controllers\ProjectController::class);
    Route::patch('/visible/{id}', [App\Http\Controllers\ProjectController::class, 'visible'])->name('hide');
});

Route::group(['middleware' => ['auth', 'sale']], function() {
    Route::get('/dashboard', function () {
        $project = Project::select('id')->where('user_id', Auth::user()->id)->get()->toArray();
        $whatsapps = Count::select('whatsapp_total')->where('project_id', $project)->get();
        $phones = Count::select('phone_total')->where('project_id', $project)->get();
        $inboxes = Inbox::where('project_id', $project)->orderBy('created_at','desc')->paginate(8);
        $views = Project::where('id', $project)->pluck('views')->first();
        return view('sale.dashboard', compact('project', 'whatsapps', 'phones', 'inboxes', 'views'));
    })->name('dashboard');
    Route::get('sale/main', function() {
        $projects = Project::select('id')->where('user_id', Auth::user()->id)->get()->toArray();
        return view('sale.main', compact('projects'));
    });
    Route::post('new_project', [App\Http\Controllers\ProjectController::class, 'new_project'])->name('new_project');
    Route::resource('general', App\Http\Controllers\InformationController::class);
    Route::resource('titles', App\Http\Controllers\TitleController::class);
    Route::resource('inboxes', App\Http\Controllers\InboxController::class);
    Route::resource('socials', App\Http\Controllers\SocailController::class);
    Route::resource('images', App\Http\Controllers\ImageController::class);
    Route::get('/contact/{id}', [App\Http\Controllers\InformationController::class, 'contact']);
    Route::get('/social/{id}', [App\Http\Controllers\InformationController::class, 'social']);
    Route::post('/store_image', [App\Http\Controllers\InformationController::class, 'store_image']);
    Route::post('file/upload/{id}', [App\Http\Controllers\InformationController::class, 'upload']);
    Route::post('file/upload/image/{id}', [App\Http\Controllers\UploadController::class, 'image']);
    Route::get('message/{id}', [App\Http\Controllers\InboxController::class, 'show_message']);
    Route::patch('form1/{id}', [App\Http\Controllers\InformationController::class, 'form1'])->name('form1.update');
    Route::patch('form2/{id}', [App\Http\Controllers\InformationController::class, 'form2'])->name('form2.update');
    Route::get('form1', function () {
        $project = Project::where('user_id', Auth::user()->id)->pluck('id')->first();
        $forms = Form::where('project_id', $project)->where('name', 'form1')->get();
        return view('sale.forms.form1', compact('forms', 'project'));
    });
    Route::get('form2', function () {
        $project = Project::where('user_id', Auth::user()->id)->pluck('id')->first();
        $forms = Form::where('project_id', $project)->where('name', 'form2')->get();
        return view('sale.forms.form2', compact('forms', 'project'));
    });
});

Route::get('whatsapp_total', [App\Http\Controllers\InformationController::class, 'whatsapp_total']);
Route::get('phone_total', [App\Http\Controllers\InformationController::class, 'phone_total']);
Route::get('{name}', [App\Http\Controllers\MainController::class, 'project']);
Route::post('inbox/insert/{id}', [App\Http\Controllers\InboxController::class, 'insert'])->name('insert');
Route::post('inbox/insert/{id}', [App\Http\Controllers\InboxController::class, 'insert2']);
Route::get('/404', function () {
    return view('404');
});

Route::get('locale/{locale}',function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
})->name('switchLan');


Route::view('/ui', 'ui.index');

// URL::forceScheme('https');

