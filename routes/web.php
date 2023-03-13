<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AttachedController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\FuturoController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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
// Rutas de autenticación
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Rutas de registro
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

// Rutas de restablecimiento de contraseña
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

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
    Route::get('account/account','App\Http\Controllers\AccountController@index');
    //agregar account
    Route::get('account/create', function ()    {
		return view('vendor.adminlte.account.create');
	});
	Route::post('account/save','App\Http\Controllers\AccountController@save');
	//editar account
	Route::get('account/edit', function ()    {
		return view('vendor.adminlte.account.edit');
	});
	Route::get('account/edit/{id}','App\Http\Controllers\AccountController@edit');
	Route::put('account/editar/{id}','App\Http\Controllers\AccountController@update');
	//eliminar account
	Route::delete('account/eliminar/{id}','App\Http\Controllers\AccountController@destroy');
    //detalle
    Route::get('account/detalle/{id}','App\Http\Controllers\AccountController@detalle');


	///////////////////////////////
    ///////// Cattegorias ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////									  
    																	//							
    //listar categories                                                 /
    Route::get('categories/categories','App\Http\Controllers\CategoriesController@index');
    //agregar categories
    Route::get('categories/create', function ()    {
		return view('vendor.adminlte.categories.create');
	});
	Route::post('categories/save','App\Http\Controllers\CategoriesController@save');
	//editar categories
	Route::get('categories/edit', function ()    {
		return view('vendor.adminlte.categories.edit');
	});
	Route::get('categories/edit/{id}','App\Http\Controllers\CategoriesController@edit');
	Route::put('categories/editar/{id}','App\Http\Controllers\CategoriesController@update');
	//eliminar categories
	Route::delete('categories/eliminar/{id}','App\Http\Controllers\CategoriesController@destroy');

    Route::get('categories/categories/attr/{id}','App\Http\Controllers\CategoriesController@view_attr');
    Route::post('categories/categories/attr/{id}','App\Http\Controllers\CategoriesController@save_attr');

    Route::get('categories/attr/{id}','App\Http\Controllers\CategoriesController@get_all');
    Route::get('categories/eliminarattr/{id}','App\Http\Controllers\CategoriesController@destroyattr');
	///////////////////////////////
    ///////// attached ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////										  
    																	//							
    //listar attached                                                 	/
    Route::get('attached/attached','App\Http\Controllers\AttachedController@index');
    //agregar attached
    Route::get('attached/create', function ()    {
		return view('vendor.adminlte.attached.create');
	});
	Route::get('attached/create/{id}','App\Http\Controllers\AttachedController@nuevo');
	Route::post('attached/save','App\Http\Controllers\AttachedController@save');
	//editar attached
	Route::get('attached/edit', function ()    {
		return view('vendor.adminlte.attached.edit');
	});
	Route::get('attached/edit/{id}','App\Http\Controllers\AttachedController@edit');
	Route::put('attached/editar/{id}','App\Http\Controllers\AttachedController@update');
	//eliminar attached
	Route::delete('attached/eliminar/{id}','App\Http\Controllers\AttachedController@destroy');

	///////////////////////////////
    ///////// summary ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////													  
    																	//							
    //listar attached                                                 	/
    Route::get('summary/summary','App\Http\Controllers\SummaryController@index');
    //agregar attached
    Route::get('summary/create','App\Http\Controllers\SummaryController@crear');
 //    Route::get('summary/create', function ()    {
	// 	return view('vendor.adminlte.summary.create');
	// });
	Route::post('summary/save','App\Http\Controllers\SummaryController@save');
	//editar attached
	Route::get('summary/edit', function ()    {
		return view('vendor.adminlte.summary.edit');
	});
	Route::get('summary/edit/{id}','App\Http\Controllers\SummaryController@edit');
	Route::put('summary/editar/{id}','App\Http\Controllers\SummaryController@update');
	//eliminar attached
	Route::delete('summary/eliminar/{id}','App\Http\Controllers\SummaryController@destroy');
    Route::delete('summary/eliminart/{id}','App\Http\Controllers\SummaryController@destroyt');

	///////////////////////////////
    /////////Totales ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////												  
    																	//							
    //listar attached                                                 	/
    Route::get('montos/montos','App\Http\Controllers\TotalController@totales');
    //agregar attached

    ///////////////////////////////
    /////////INICIO ////////////
    ////////////////////////////////////////////////////////////////////////
    																	///										  
    																	//							
    Route::get('/home','App\Http\Controllers\HomeController@index');                                             	
   	Route::get('/statisjson','App\Http\Controllers\HomeController@grafica');


   	///////////////////////////////
    /////////detalle ////////////
    ////////////////////////////////////////////////////////////////////////
    																	////											  
    																	//
   	//detalle                                                           /
   	Route::get('detalle/detalle/{id}','App\Http\Controllers\DetalleController@view');
   	Route::get('/download/{id}' , 'App\Http\Controllers\DetalleController@downloadFile');

    ///////////////////////////////
    ///////// users ////////////
    ////////////////////////////////////////////////////////////////////////
                                                                        ////                                          ///            
                                                                        //                          
    //listar users                                                      /
    Route::get('users/users','App\Http\Controllers\UsersController@index');
    Route::get('users/activar/{id}','App\Http\Controllers\UsersController@activar');
    Route::get('users/desactivar/{id}','App\Http\Controllers\UsersController@desactivar');
    Route::delete('users/eliminar/{id}','App\Http\Controllers\UsersController@destroy');
	

    ///////////////////////////////
    ///////// Transferencias ////////////
    /////////////////////////////////////////////////////////////////////////
                                                                        ////                                          
                                                                        ///                          
    //listar transferencia                                            //

    Route::get('transfer/create','App\Http\Controllers\TransferController@totales');
    Route::post('transfer/save','App\Http\Controllers\TransferController@save');
    Route::get('transfer/consul/{id}','App\Http\Controllers\TransferController@consul');
    Route::get('transfer/edit/{id}','App\Http\Controllers\TransferController@edit');
    Route::put('transfer/editar/{id}','App\Http\Controllers\TransferController@update');
    //bitacora

     Route::get('bitacora/bitacora','App\Http\Controllers\BitacoraController@index');



    Route::get('pdf', 'App\Http\Controllers\PdfController@index');



    Route::get('tours/tours','App\Http\Controllers\ToursController@index');
    //agregar categories
    Route::get('tours/create', function ()    {
        return view('vendor.adminlte.tours.create');
    });
    Route::post('tours/save','App\Http\Controllers\ToursController@save');
    //editar categories
    Route::get('tours/edit', function ()    {
        return view('vendor.adminlte.tours.edit');
    });
    Route::get('tours/edit/{id}','App\Http\Controllers\ToursController@edit');
    Route::put('tours/editar/{id}','App\Http\Controllers\ToursController@update');
    // //eliminar categories
    Route::delete('tours/eliminar/{id}','App\Http\Controllers\ToursController@destroy');
    Route::get('tours/eliminarattr/{id}','App\Http\Controllers\ToursController@destroyattr');
    
   

    Route::get('tours/tours/attr/{id}','App\Http\Controllers\ToursController@view_attr');
    Route::post('tours/tours/attr/{id}','App\Http\Controllers\ToursController@save_attr');
    Route::get('tours/attr/{id}','App\Http\Controllers\ToursController@get_all');
    Route::get('tours/ver/{id}','App\Http\Controllers\ToursController@ver');
     Route::get('tours/fecha/{id}','App\Http\Controllers\ToursController@fecha');
      Route::get('tours/tours/select','App\Http\Controllers\ToursController@select');

    

    
    Route::get('futuro/futuro','App\Http\Controllers\FuturoController@index');
    Route::get('pdffuturo', 'App\Http\Controllers\PdfController@indexfuturo');
    Route::get('future/edit/{id}','App\Http\Controllers\FuturoController@edit');
    Route::put('future/editar/{id}','App\Http\Controllers\FuturoController@update');
    Route::get('future/acept/{id}','App\Http\Controllers\FuturoController@acept');

    //roles
    Route::get('permisos/ver/{id}','App\Http\Controllers\PermissionsController@index');
    Route::get('users/update/{id}','App\Http\Controllers\PermissionsController@update');

    //listar balances de  categories
    Route::get('balance/balance','App\Http\Controllers\BalanceController@index');
    Route::get('balance/balance/out','App\Http\Controllers\BalanceController@indexinit');
    Route::get('balance/balance/add','App\Http\Controllers\BalanceController@indexadd');
//    Route::get('categories/create', function ()    {
//        return view('vendor.adminlte.categories.create');
//    });
    

     

});

    Route::get('/wait', function () {
       return view('vendor.adminlte.wait');
    });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
