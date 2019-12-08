<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;	
use App\bitacora;
use App\permissions;
use Auth;

class permissionsController extends Controller
{
    public function index(Request $request, $id)
   {	

            $user = permissions::where('id_user',$id)->get();
            $user2 = permissions::where('id_user',$id)->first();
            $idd=$user2->id_user;
            return view('vendor.adminlte.users.permissions',['user'=>$user,'iduser'=>$idd]);
      }

        public function update(Request $request, $id)
   {
  		$user = permissions::where('id_user',$id)->first();
  		$idruta =$id;
  		$id = $user->id;

 		//  1 todas las acciones
 		//  2 add, edit, view, 
 		//	3 view, add
 		//	4 view,edit 
 		//	5 view,delete
 		//	6 view, add, delete
 		//	7 view, edit, delete
 		//	8 view,
   		//  0 none,
 		
  		$ver=$request->mvver;
  		$agregar=$request->mvagregar;
  		$editar=$request->mveditar;
  		$eliminar=$request->mveliminar;
  		$resultado=null;
  		//movimientos
  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$movimientos=$resultado;
  			



  		//cuentas
  		$ver=$request->cuver;
  		$agregar=$request->cuagregar;
  		$editar=$request->cueditar;
  		$eliminar=$request->cueliminar;

  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$cuentas=$resultado;

  		//categorias 
  		$ver=$request->caver;
  		$agregar=$request->caagregar;
  		$editar=$request->caeditar;
  		$eliminar=$request->caeliminar;

  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$categorias=$resultado;


  		//tours
  		$ver=$request->tover;
  		$agregar=$request->toagregar;
  		$editar=$request->toeditar;
  		$eliminar=$request->toeliminar;

  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$tours=$resultado;


  		//bitacora 
  		$ver=$request->biver;
  		$agregar=$request->biagregar;
  		$editar=$request->bieditar;
  		$eliminar=$request->bieliminar;

  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$bitacora=$resultado;

  		//transferencia
  		$ver=$request->traver;
  		$agregar=$request->traagregar;
  		$editar=$request->traeditar;
  		$eliminar=$request->traeliminar;

  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$transferencia=$resultado;

  		//usuario
  		$ver=$request->usuver;
  		$agregar=$request->usuagregar;
  		$editar=$request->usueditar;
  		$eliminar=$request->usueliminar;

  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$usuario=$resultado;


  		//adjuntos
  		$ver=$request->adver;
  		$agregar=$request->adagregar;
  		$editar=$request->adeditar;
  		$eliminar=$request->adeliminar;

  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$adjuntos=$resultado;

  		//pdf 

  		$ver=$request->pdfver;
  		$agregar=$request->pdfagregar;
  		$editar=$request->pdfeditar;
  		$eliminar=$request->pdfeliminar;

  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$pdf=$resultado;

  		//futuro

  		$ver=$request->fuver;
  		$agregar=$request->fuagregar;
  		$editar=$request->fueditar;
  		$eliminar=$request->fueliminar;

  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$futuro=$resultado;


  		//futuro

  		$ver=$request->salver;
  		$agregar=$request->salagregar;
  		$editar=$request->saleditar;
  		$eliminar=$request->saleliminar;

  		if($ver=="on" && $agregar=="on" && $editar=="on" && $eliminar=="on"){
  			$resultado=1;
  		}elseif( $agregar=="on" && $editar=="on" && $eliminar==null){
  			$resultado=2;
  		}elseif(  $agregar=="on" && $editar==null && $eliminar==null){
  			$resultado=3;
  		}elseif(  $agregar==null && $editar=="on" && $eliminar==null){
  			$resultado=4;
  		}elseif( $agregar==null && $editar==null && $eliminar=="on"){
  			$resultado=5;
  		}elseif( $agregar=="on" && $editar==null && $eliminar=="on"){
  			$resultado=6;
  		}elseif( $agregar==null && $editar=="on" && $eliminar=="on"){
  			$resultado=7;
  		}elseif($ver=="on" && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=8;
  		}elseif($ver==null && $agregar==null && $editar==null && $eliminar==null){
  			$resultado=0;
  		}
  		$saldo=$resultado;



		
	$summary = permissions::find($id);
    $summary->saldo = $saldo;
    $summary->m_futuros = $futuro;
    $summary->pdf = $pdf;
    $summary->adjuntos  = $adjuntos;
    $summary->usuario  = $usuario;
    $summary->transferencia = $transferencia  ;
    $summary->tours  = $tours ;
    $summary->bitacora = $bitacora;
    $summary->categoria = $categorias;
    $summary->cuentas = $cuentas;
    $summary->movimientos = $movimientos;
    $summary->save();

				// $user->save();
            $user = permissions::where('id_user',$id)->get();
            return redirect("permisos/ver/".$idruta);
      }
}
