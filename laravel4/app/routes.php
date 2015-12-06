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

Route::group(['prefix' => 'hiro', 'before' => 'auth'], function() {
	Route::get('', [
		'as' => 'hiro.index',
		'uses' => function() {
			return View::make('main.menu');
		},
		]);
	Route::get('{mstname}/master', [
		'as' => 'hiro.master',
		'use' => function($mstname) {
			$url = "http://localhost/sasaki/hiro_manager/master.php?mst=".$mstname;
			return Redirect::to($url);
		},
		]);
	Route::post('getlegal', [
		'as' => 'hiro.getlegal',
		'uses' => function() {
			$hallid = Input::only(['hallid']);
			Log::debug($hallid);
			$hall = MstHall::whereId($hallid)->first();
			Log::debug(print_r($hall, true));
			$legal = MstLegal::whereId(print_r($hall['legal'], true))->first();
			Log::debug(print_r($legal, true));
			return Response::json(['name' => $legal['name1']]);
		},
		]);


	// 中古機管理表
	Route::group(['prefix' => 'oldmanager'], function() {
		Route::get('{id}/edit', [
			'as' => 'oldmanager.edit',
			'uses' => 'OldmanagerController@edit'
			]);
		Route::post('create', [
			'as' => 'oldmanager.create',
			'uses' => 'OldmanagerController@create'
			]);
		Route::post('{id}/update', [
			'as' => 'oldmanager.update',
			'uses' => 'OldmanagerController@update'
			]);
		Route::post('{id}/delete', [
			'as' => 'oldmanager.delete',
			'uses' => 'OldmanagerController@delete'
			]);
		Route::get('list', [
			'as' => 'oldmanager.list',
			'uses' => function() {
				$url = "http://192.168.1.250/hiro_manager/chuukoki/list.php";
				return Redirect::to($url);
			},
			]);
	});
	// 業販
	Route::group(['prefix' => 'trade'], function() {
		Route::get('{id}/edit', [
			'as' => 'trade.edit',
			'uses' => 'TradeController@edit'
			]);
		Route::post('create', [
			'as' => 'trade.create',
			'uses' => 'TradeController@create'
			]);
		Route::post('{id}/update', [
			'as' => 'trade.update',
			'uses' => 'TradeController@update'
			]);
		Route::post('{id}/delete', [
			'as' => 'trade.delete',
			'uses' => 'TradeController@delete'
			]);
		Route::get('list', [
			'as' => 'trade.list',
			'uses' => function() {
				$url = "http://192.168.1.250/hiro_manager/system/gyouhan/list.php";
				return Redirect::to($url);
			}
			]);
	});

	//直販（新台）
	Route::group(['prefix' => 'newdirect'], function() {
		Route::get('{id}/edit', [
			'as' => 'newdirect.edit',
			'uses' => 'NewdirectController@edit'
			]);
		Route::post('create', [
			'as' => 'newdirect.create',
			'uses' => 'NewdirectController@create'
			]);
		Route::post('{id}/update', [
			'as' => 'newdirect.update',
			'uses' => 'NewdirectController@update'
			]);
		Route::post('{id}/delete', [
			'as' => 'newdirect.delete',
			'uses' => 'NewdirectController@delete'
			]);
		Route::get('list', [
			'as' => 'newdirect.list',
			'uses' => function() {
				$url = "http://192.168.1.250/hiro_manager/system/chokuhan_new/list.php";
				return Redirect::to($url);
			}]);
	});

	//直販(中古)
	Route::group(['prefix' => 'olddirect'], function() {
		Route::get('{id}/edit', [
			'as' => 'olddirect.edit',
			'uses' => 'OlddirectController@edit'
			]);
		Route::post('create', [
			'as' => 'olddirect.create',
			'uses' => 'OlddirectController@create'
			]);
		Route::post('{id}/update', [
			'as' => 'olddirect.update',
			'uses' => 'OlddirectController@update'
			]);
		Route::post('{id}/delete', [
			'as' => 'olddirect.delete',
			'uses' => 'OlddirectController@delete'
			]);
		Route::get('list', [
			'as' => 'olddirect.list',
			'uses' => function() {
				$url = "http://192.168.1.250/hiro_manager/system/chokuhan_old/list.php";
				return Redirect::to($url);
			}]);
	});

});

//メニューへ。
Route::get('/', [
	'before' => 'auth',
	'uses' => function() {
	return View::make('hello');
}]);


Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin');
Route::get('/logout', [
	'as' => 'logout',
	'uses' => 'AuthController@getLogout']);
