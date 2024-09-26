<?php



use App\Http\Controllers\User1s;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();





Route::get('/',[User1s::class,'index'])->name('auth');//login


    Route::get('/show',function(){return  view('show');})->middleware('auth1');

    Route::post('/test',[User1s::class,'test'])->name('test');//valid les donnes

    Route::get('/sort',[User1s::class,'sort'])->name('sort')->middleware('auth1');;//filter

    Route::get('/editer/{email}/edit',[User1s::class,'editer'])->name('editer')->middleware('auth1');;//send les donnes to page editer

    Route::put('/update1/{email}',[User1s::class,'update1'])->name("update1")->middleware('auth1');;//save les donnes dans basse des donnes update 

    Route::get('/admin',[User1s::class,'admin'])->name('admin')->middleware('auth1');;//page admin

    Route::get('/logout',function(){
        Session::forget('auth');
        return view('index');
    })->name('out');//suprimer variable session
// });



// Route::patch(....)
// Route::put(....)
// Route::delete('/test/{id}')
// @method('delete')



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
