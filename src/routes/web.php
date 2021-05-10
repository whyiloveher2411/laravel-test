<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/logout', ['as'=>'logout','uses'=>function(){
    Auth::logout();
    return Redirect()->route('login');
}]);

Route::any('/login',['as'=>'login','uses'=> function () {

    $request = request();

    if( $request->isMethod('GET') ){
        return view('login');
    }

    if( $request->isMethod('POST') ){

        $username = $request->get('username');

        if( !$username ){
            return Redirect::back()->withErrors(['Username is required!.']);
        }

        $existUser = App\User::whereUsername($username)->first();

        if( !$existUser ){
            return Redirect::back()->withInput()->with('alertNotification','User not found.');
        }

        Auth::loginUsingId( $existUser->id );

        return Redirect()->route('travel_list');

    }

    return response()->json(['message' => 'Page Not Found. If error persists, contact info@website.com'], 404);

}]);


Route::get('/', ['as'=>'travel_list', 'uses'=>function () {

    if( Auth::check() ){
        
        $visited = DB::select('select * from places where visited = ?', [1]);
        $togo = DB::select('select * from places where visited = ?', [0]);
    
        return view('travel_list', ['visited' => $visited, 'togo' => $togo ] );
    }

    return Redirect()->route('login');
}]);