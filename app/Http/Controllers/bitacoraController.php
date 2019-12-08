<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\bitacora;
use App\User;
use Auth;
use Datetime;

class bitacoraController extends Controller
{
    
      public function index(Request $request)
   {    


     $r=(new summaryController)->pass($act='bitacora');
        if($r>0){

        $hoy = new DateTime('now');   
        $bitacora = bitacora::all();
        $user = User::all();
		    $start = $request->input('start');
		    $finish = $request->input('finish');
		    $dias = $request->input('dias');
		    $tipo = $request->input('tipo');
		    $usuarios = $request->input('usuarios');
		    $actividad = $request->input('actividad');
        
        $filter=array();      
        if(isset($tipo)) {
          $filter[] = array('type','=',$tipo);
          $bitacora = bitacora::where($filter)->get();       
        }
        if(isset($usuarios)) {  

          $filter[] = array('id_user','=',$usuarios);
          $bitacora = bitacora::where($filter)->get();

         }
        if(isset($actividad)) {  
          $filter[] = array('activity','=',$actividad);
          $bitacora = bitacora::where($filter)->get();
        }

        if((isset($start)) and (isset($finish))){
          $start = new Datetime($start);
          $finish = new Datetime($finish);


          $bitacora1 = bitacora::whereBetween('created_date', [$start, $finish])->where($filter)->get();
            }elseif((isset($dias))){

            if($dias==30){
              $start=date('Y-m-d',strtotime('today - 30 days'));
            }
            if($dias==15){
              $start=date('Y-m-d',strtotime('today - 15 days'));
            }
            if($dias==7){
              $start=date('Y-m-d',strtotime('today - 7 days'));
            }
            if($dias==1){
              $start=date('Y-m-d',strtotime('today'));
            }

          $bitacora = bitacora::whereBetween('created_date', [$start, $hoy])->where($filter)->get();
        }else{

          $bitacora = bitacora::where('created_date','<=',$hoy)->get();

        }


        foreach ($bitacora as $s) {
          $name_user = User::find($s->id_user);
          $s->setAttribute('name_user',$name_user->name);
        }
      

        return view('vendor.adminlte.bitacora.bitacora',['bitacora'=>$bitacora,'user'=>$user]);
       }
        else{
            return view('vendor.adminlte.permission',['summary'=>null]);
          }
   }	
}
