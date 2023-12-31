<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ComposeController;
use App\Http\Controllers\CreateController;


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

Route::get('/sys/autologin/{encryption}/{ctrl?}/{ctrl2?}', 'Sys\SysController@autologin');
Route::post('/sys/ganti_unit', 'Sys\SysController@ganti_unit');
Route::post('/sys/search_unit', 'Sys\SysController@search_unit');
Route::post('/sys/check_session_location', 'Sys\SysController@check_session_location');
Route::post('/sys/bookmark_page', 'Sys\SysController@bookmark_page');
Route::get('signin', 'Sys\SysController@signin');
Route::get('login', 'Sys\SysController@signin')->name('login');
Route::post('signin_process', 'Sys\SysController@signin_process');
Route::get('signout', 'Sys\SysController@signout');
Route::get('/hello', function () {
});

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/welcome', function () {
	return view('welcome');
});

Route::get('/selecttemplate', function () {
	return view('selecttemplate');
});

Route::get('/draft', function () {
	return view('draft');
});

Route::get('/history', function () {
	return view('history');
});

Route::get('/selectmore', function () {
	return view('selectmore');
});

Route::get('/sign-in', function () {
	return view('signin');
});

Route::get('/sign-up', function () {
	return view('signup');
});

Auth::routes(['login' => false]);

Route::group(['middleware' => ['portalAuth']], function () {
	Route::group(['middleware' => ['portalAuth.view']], function () {
		Route::group(['prefix' => 'sys/user'], function () {
			Route::get('/', 'Sys\CUser@index');
			Route::post('/search_dt', 'Sys\CUser@search_dt');
			Route::post('/show_role', 'Sys\CUser@show_role');
			Route::post('/show_unit', 'Sys\CUser@show_unit');
		});

		Route::group(['prefix' => 'sys/modul'], function () {
			Route::get('/', 'Sys\CModul@index');
			Route::post('/search_dt', 'Sys\CModul@search_dt');
		});

		Route::group(['prefix' => 'sys/role'], function () {
			Route::get('/', 'Sys\CRole@index');
			Route::post('/search_dt', 'Sys\CRole@search_dt');
			Route::post('/show_modul', 'Sys\CRole@show_modul');
		});
	});

	Route::group(['middleware' => ['portalAuth.save']], function () {
		Route::group(['prefix' => 'sys/user'], function () {
			Route::post('/save', 'Sys\CUser@save');
		});

		Route::group(['prefix' => 'sys/modul'], function () {
			Route::post('/save', 'Sys\CModul@save');
		});

		Route::group(['prefix' => 'sys/role'], function () {
			Route::post('/save', 'Sys\CRole@save');
		});
	});

	Route::group(['middleware' => ['portalAuth.delete']], function () {
		Route::group(['prefix' => 'sys/user'], function () {
			Route::post('/delete_role', 'Sys\CUser@delete_role');
			Route::post('/delete_unit', 'Sys\CUser@delete_unit');
		});

		Route::group(['prefix' => 'sys/role'], function () {
			Route::post('/delete_modul', 'Sys\CRole@delete_modul');
		});
	});
});

Route::get('/history', function () {
	return view('history');
});

Route::get('/welcome', function () {
	return view('welcome');
});

// Route::get('/login', function () {
// 	return view('login');
// });

Route::get('/signup', function () {
	return view('signup');
});
Route::get('/searchresult', function () {
	return view('searchresult');
});

Route::get('/carousel', function () {
	return view('carousel');
});

Route::get('/create', [CreateController::class, 'index']);
Route::post('/create/send', [CreateController::class, 'send']);

Route::get('/compose', [ComposeController::class, 'index'])->name('compose');
Route::post('/compose/send', [ComposeController::class, 'send']);
