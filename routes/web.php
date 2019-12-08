<?php

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
    return redirect('/home');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });


    ///////////////////////////////
    ///////// account ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////													  
    																	//							
    //listar account                                                   	/
    Route::get('account/account','accountController@index');
    //agregar account
    Route::get('account/create', function ()    {
		return view('vendor.adminlte.account.create');
	});
	Route::post('account/save','accountController@save');
	//editar account
	Route::get('account/edit', function ()    {
		return view('vendor.adminlte.account.edit');
	});
	Route::get('account/edit/{id}','accountController@edit');
	Route::put('account/editar/{id}','accountController@update');
	//eliminar account
	Route::delete('account/eliminar/{id}','accountController@destroy');
    //detalle
    Route::get('account/detalle/{id}','accountController@detalle');


	///////////////////////////////
    ///////// Cattegorias ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////									  
    																	//							
    //listar categories                                                 /
    Route::get('categories/categories','categoriesController@index');
    //agregar categories
    Route::get('categories/create', function ()    {
		return view('vendor.adminlte.categories.create');
	});
	Route::post('categories/save','categoriesController@save');
	//editar categories
	Route::get('categories/edit', function ()    {
		return view('vendor.adminlte.categories.edit');
	});
	Route::get('categories/edit/{id}','categoriesController@edit');
	Route::put('categories/editar/{id}','categoriesController@update');
	//eliminar categories
	Route::delete('categories/eliminar/{id}','categoriesController@destroy');

    Route::get('categories/categories/attr/{id}','categoriesController@view_attr');
    Route::post('categories/categories/attr/{id}','categoriesController@save_attr');

    Route::get('categories/attr/{id}','categoriesController@get_all');
    Route::get('categories/eliminarattr/{id}','categoriesController@destroyattr');
	///////////////////////////////
    ///////// attached ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////										  
    																	//							
    //listar attached                                                 	/
    Route::get('attached/attached','attachedController@index');
    //agregar attached
    Route::get('attached/create', function ()    {
		return view('vendor.adminlte.attached.create');
	});
	Route::get('attached/create/{id}','attachedController@nuevo');
	Route::post('attached/save','attachedController@save');
	//editar attached
	Route::get('attached/edit', function ()    {
		return view('vendor.adminlte.attached.edit');
	});
	Route::get('attached/edit/{id}','attachedController@edit');
	Route::put('attached/editar/{id}','attachedController@update');
	//eliminar attached
	Route::delete('attached/eliminar/{id}','attachedController@destroy');

	///////////////////////////////
    ///////// summary ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////													  
    																	//							
    //listar attached                                                 	/
    Route::get('summary/summary','summaryController@index');
    //agregar attached
    Route::get('summary/create','summaryController@crear');
 //    Route::get('summary/create', function ()    {
	// 	return view('vendor.adminlte.summary.create');
	// });
	Route::post('summary/save','summaryController@save');
	//editar attached
	Route::get('summary/edit', function ()    {
		return view('vendor.adminlte.summary.edit');
	});
	Route::get('summary/edit/{id}','summaryController@edit');
	Route::put('summary/editar/{id}','summaryController@update');
	//eliminar attached
	Route::delete('summary/eliminar/{id}','summaryController@destroy');
    Route::delete('summary/eliminart/{id}','summaryController@destroyt');

	///////////////////////////////
    /////////Totales ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////												  
    																	//							
    //listar attached                                                 	/
    Route::get('montos/montos','totalController@totales');
    //agregar attached

    ///////////////////////////////
    /////////INICIO ////////////
    ////////////////////////////////////////////////////////////////////////
    																	///										  
    																	//							
    Route::get('/home','HomeController@index');                                             	
   	Route::get('/statisjson','HomeController@grafica');


   	///////////////////////////////
    /////////detalle ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////											  
    																	//
   	//detalle                                                           /
   	Route::get('detalle/detalle/{id}','detalleController@view');
   	Route::get('/download/{id}' , 'detalleController@downloadFile');

    ///////////////////////////////
    ///////// users ////////////
    ////////////////////////////////////////////////////////////////////////
                                                                        ////                                          ///            
                                                                        //                          
    //listar users                                                      /
    Route::get('users/users','usersController@index');
    Route::get('users/activar/{id}','usersController@activar');
    Route::get('users/desactivar/{id}','usersController@desactivar');
    Route::delete('users/eliminar/{id}','usersController@destroy');
	

    ///////////////////////////////
    ///////// Transferencias ////////////
    /////////////////////////////////////////////////////////////////////////
                                                                        ////                                          
                                                                        ///                          
    //listar transferencia                                            //

    Route::get('transfer/create','transferController@totales');
    Route::post('transfer/save','transferController@save');
    Route::get('transfer/consul/{id}','transferController@consul');
    Route::get('transfer/edit/{id}','transferController@edit');
    Route::put('transfer/editar/{id}','transferController@update');
    //bitacora

     Route::get('bitacora/bitacora','bitacoraController@index');



    Route::get('pdf', 'pdfController@index');



    Route::get('tours/tours','toursController@index');
    //agregar categories
    Route::get('tours/create', function ()    {
        return view('vendor.adminlte.tours.create');
    });
    Route::post('tours/save','toursController@save');
    //editar categories
    Route::get('tours/edit', function ()    {
        return view('vendor.adminlte.tours.edit');
    });
    Route::get('tours/edit/{id}','toursController@edit');
    Route::put('tours/editar/{id}','toursController@update');
    // //eliminar categories
    Route::delete('tours/eliminar/{id}','toursController@destroy');
    Route::get('tours/eliminarattr/{id}','toursController@destroyattr');
    
   

    Route::get('tours/tours/attr/{id}','toursController@view_attr');
    Route::post('tours/tours/attr/{id}','toursController@save_attr');
    Route::get('tours/attr/{id}','toursController@get_all');
    Route::get('tours/ver/{id}','toursController@ver');
     Route::get('tours/fecha/{id}','toursController@fecha');
      Route::get('tours/tours/select','toursController@select');

    

    
    Route::get('futuro/futuro','futuroController@index');
    Route::get('pdffuturo', 'pdfController@indexfuturo');
    Route::get('future/edit/{id}','futuroController@edit');
    Route::put('future/editar/{id}','futuroController@update');
    Route::get('future/acept/{id}','futuroController@acept');

    //roles
    Route::get('permisos/ver/{id}','permissionsController@index');
    Route::get('users/update/{id}','permissionsController@update');

    //listar balances de  categories
    Route::get('balance/balance','balanceController@index');
    Route::get('balance/balance/out','balanceController@indexinit');
    Route::get('balance/balance/add','balanceController@indexadd');
//    Route::get('categories/create', function ()    {
//        return view('vendor.adminlte.categories.create');
//    });
    

     

});

    Route::get('/wait', function () {
       return view('vendor.adminlte.wait');
    });