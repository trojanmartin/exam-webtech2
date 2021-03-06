<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('octave', 'OctaveController@index');

Route::get('octave/ball','OctaveController@get_ball_data');

Route::get('octave/inverted_pendulum','OctaveController@get_inverted_pendulum_data');

Route::post('octave/execute','OctaveController@execute_octave_command');

Route::get('octave/suspension', 'OctaveController@get_suspension_data');

Route::get('octave/plane','OctaveController@get_plane_data');

