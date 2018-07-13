<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group(
	[
	    'prefix'     => config('backpack.base.route_prefix', 'admin'),
	    // 'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
	    'middleware' => ['web', backpack_middleware(), 'can:adminka'],
	    'namespace'  => 'App\Http\Controllers\Admin',
	],	
	
	function () { // custom admin routes

		CRUD::resource('theme', 'ThemeCrudController');
		CRUD::resource('question', 'QuestionCrudController');
		CRUD::resource('ticket', 'TicketCrudController');
		CRUD::resource('rule', 'RuleCrudController');
		CRUD::resource('rawrule', 'RawruleCrudController');
		CRUD::resource('stgroup', 'StgroupCrudController');
		CRUD::resource('student', 'StudentCrudController');

		Route::get('rule/{id}/generate_tickets', 'RuleCrudController@generate_tickets');
		Route::get('rawrule/{id}/generate_tickets_sql', 'RawruleCrudController@generate_tickets_sql');

	}); // this should be the absolute last line of this file


Route::group(
	[
	    'prefix'     => 'user/',
	    // 'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
	    'middleware' => ['web', backpack_middleware(), 'can:dashboard'],
	    'namespace'  => 'App\Http\Controllers\User',
	],	
	
	function () { // custom admin routes

		// CRUD::resource('theme', 'ThemeCrudController');
		CRUD::resource('question', 'QuestionUserController');
		//CRUD::resource('ticket', 'TicketCrudController');
		//CRUD::resource('rule', 'RuleCrudController');

		//Route::get('rule/{id}/user_func', 'Admin\RuleCrudController@user_func');

	}); 