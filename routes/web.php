<?php

use App\Http\Controllers\FileHandleController;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('upload-file',  function(){
    return view('practice');
});
Route::post('savefile', [FileHandleController::class, 'uploadImage'])->name('saveImage');
Route::get('image/{id}', [FileHandleController::class, 'listImage']);

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('loginGoogle');
 
Route::get('auth/google/call-back', function () {
    $googleUser = Socialite::driver('google')->user();
    
    $user = User::updateOrcreate([
        'name' => $googleUser->getName(),
        'email' => $googleUser->getEmail(),
    ]);
    return redirect(route('home'));
    // $user->token
});
Route::get('home', function(){
    return view('welcome');
});