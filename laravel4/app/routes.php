<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'hiro'], function() {
	Route::get('', [
		'as' => 'hiro.index',
		'uses' => function() {
			$default = ['' => ''];
			$users = $default + MstUser::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
			$halls = $default + MstHall::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
			$machines = $default + MstMachine::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
			$legals = $default + MstLegal::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
			$sources = $default + MstOrdersource::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
			$contacts = $default + MstOrdercontact::select('id', DB::raw('CONCAT(id, ".", name1) AS name1'))->lists('name1','id');
			return View::make('main.menu', compact('users', 'halls', 'machines', 'legals', 'sources', 'contacts'));
		},
		]);

	Route::group(['prefix' => 'oldmanager'], function() {
		Route::post('{id}/edit', [
			'as' => 'oldmanager.edit',
			'uses' => 'OldmanagerController@edit'
			]);
		Route::post('', [
			'as' => 'oldmanager.store',
			'uses' => 'OldmanagerController@store'
			]);
		Route::post('{id}/update', [
			'as' => 'oldmanager.update',
			'uses' => 'OldmanagerController@update'
			]);
		Route::post('{id}/delete', [
			'as' => 'oldmanager.delete',
			'uses' => 'OldmanagerController@update'
			]);
	});

	Route::group(['prefix' => 'newdirect'], function() {
		Route::post('', [
			'as' => 'newdirect.store',
			'uses' => 'NewdirectController@store'
			]);
		Route::post('{id}/update', [
			'as' => 'newdirect.update',
			'uses' => 'NewdirectController@update'
			]);
	});

	Route::group(['prefix' => 'olddirect'], function() {
		Route::post('', [
			'as' => 'olddirect.store',
			'uses' => 'OlddirectController@store'
			]);
		Route::post('{id}/update', [
			'as' => 'olddirect.update',
			'uses' => 'OlddirectController@update'
			]);
	});

	Route::group(['prefix' => 'trade'], function() {
		Route::post('', [
			'as' => 'trade.store',
			'uses' => 'TradeController@store'
			]);
		Route::post('{id}/update', [
			'as' => 'trade.update',
			'uses' => 'TradeController@update'
			]);
	});
});

//メニューへ。
Route::get('/', ['uses' => 'OldmanagerController@index']);

Route::get('/aaa', function() {
	echo "hello";
});

Route::get('/test', function() {
	return View::make('main.menu');
});
Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@getLogout');
Route::get('/home', function() {
	return 'Login OK.';
});
