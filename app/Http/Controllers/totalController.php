<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\summary;
use App\account;
use App\categories;
use App\settings;
use Datetime;
use Auth;



class totalController extends Controller
{
      public function totales()
   {    

         $r=(new summaryController)->pass($act='saldo');
      if($r>0 ){  
        $hoy=date('Y-m-d',strtotime('today'));
        $summary = summary::where('created_at','<=',$hoy)->orderBy('id','desc')->get();
        $categories = categories::all();
        $account = account::all();
        $account2 = account::all();
        $divisa = settings::where('name','divisa')->first();
       
       	$response =array();
        $total =array();
        foreach ($account as $a) {
        	$tmp = summary::where('created_at','<=',$hoy)->where('account_id',$a->id)->get();
        	$total[$a->id] = 0;
        	foreach ($tmp as $t) {

        		if($t->type=='out'){
        			$total[$a->id] -= $t->amount;
        		}else{
        		$total[$a->id] += $t->amount;
        		}
        	}
    		$a->setAttribute('total',$total[$a->id]);

        }
        
        $totalfinal=0;
        foreach ($total as $b) {
           
           $totalfinal+=$b;
        }

           //total add
        foreach ($account as $a) {
         $totale = 0;   
            $tmp = summary::where('created_at','>',$hoy)->get();
        
            foreach ($tmp as $t) {

                if($t->type=='add'){
                    $totale += $t->amount;
                }

            }
               $a->setAttribute('totale',$totale);      
        }    
       
         //total out
        foreach ($account as $b) {
         $totals = 0;   
            $tmp = summary::where('created_at','>',$hoy)->get();
         
            foreach ($tmp as $t) {

                if($t->type=='out'){
                    $totals += $t->amount;
                }

            }
               $b->setAttribute('totals',$totals);      
        }   
        //total final
         foreach ($account as $c) {
         $totalf = 0;   
            $tmp = summary::where('created_at','>',$hoy)->get();
         
            foreach ($tmp as $t) {

                if($t->type=='add'){
                    $totalf += $t->amount;
                }
                if($t->type=='out'){
                    $totalf -= $t->amount;
                }

            }
               $c->setAttribute('totalf',$totalf);      
        }    

        $futuro = $account->first();

        $finish=date('Y-m-d',strtotime('today + 30 days'));

        $start = new Datetime($hoy);
        $finish = new Datetime($finish);


       $totalm1 = 0;   
       $totalm2 = 0;
       $totalm3 = 0;  
       $totalm6 = 0;      

         //mes1
         foreach ($account2 as $c) {
         $totalm1 = 0;   
        $tmp = summary::where('created_at','<', $finish)->get();
         
            foreach ($tmp as $t) {

                if($t->type=='add'){
                    $totalm1+= $t->amount;
                }
                if($t->type=='out'){
                    $totalm1 -= $t->amount;
                }

            }
               $c->setAttribute('totalm1',$totalm1);      
        }    

          $logemail = Auth::user()->email;
         if($totalm1<0){
            $para      = $logemail;
            $titulo    = 'Notificacion del sistema de finanzas';
            $mensaje   = '<table cellpadding="0" cellspacing="0" width="640px" height="500px" style="background-image:url(https://finanzas.mochileros.com.mx/images/finanzas.png);background-size:100%"><tbody><tr style="background-color:rgba(68,66,65,0.68);height:10px"><td><img style="margin-top:10px;margin-left:50px;width:187px" src="https://finanzas.mochileros.com.mx/images/logomochi.png" class="CToWUd"></td><td> <div style="margin-left:120px;margin-top:35px" alt="Space Invaders" width="180" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 489px; top: 135px;"><div id=":2bd" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Descargar el archivo adjunto " data-tooltip-class="a1V" data-tooltip="Descargar"><div class="aSK J-J5-Ji aYr"></div></div></div>    </td></tr><tr><td></td><td><p style="color:#fff;margin-left:0px;font-size:18px;width:300px;padding:10px;border-radius:10px;text-align:center;background-color:rgba(42, 41, 41, 0.92);">tienes  una proyección de gastos para los proximos 30 dias, con  una liquidez  negativa mayor a las ganancias o abonos registrados hasta la fecha. </p><h3 style="color:white;margin-left:60px"><a style="background-color:white;color:#111;border-radius:10px;text-align:center;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;margin-top:10em;margin-bottom:10em;text-decoration:none" href="https://finanzas.mochileros.com.mxe" target="_blank" >clik Para ir al panel </a></h3></td></tr><tr><td> </td><td></td></tr></tbody></table>';
            $cabeceras = "MIME-Version: 1.0" . "\r\n";
            $cabeceras.= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($para, $titulo, $mensaje, $cabeceras);

        }
    
        $finish=date('Y-m-d',strtotime('today + 90 days'));
        $finish = new Datetime($finish);
           //mes3
         foreach ($account2 as $c) {
         $totalm3 = 0;   
        $tmp = summary::where('created_at','<',$finish)->get();
         
            foreach ($tmp as $t) {

                if($t->type=='add'){
                    $totalm3+= $t->amount;
                }
                if($t->type=='out'){
                    $totalm3 -= $t->amount;
                }

            }
               $c->setAttribute('totalm3',$totalm3);      
        }    
         if($totalm3<0){
            $para      = $logemail;
            $titulo    = 'Notificacion del sistema de finanzas';
            $mensaje   = '<table cellpadding="0" cellspacing="0" width="640px" height="500px" style="background-image:url(https://finanzas.mochileros.com.mx/images/finanzas.png);background-size:100%"><tbody><tr style="background-color:rgba(68,66,65,0.68);height:10px"><td><img style="margin-top:10px;margin-left:50px;width:187px" src="https://finanzas.mochileros.com.mx/images/logomochi.png" class="CToWUd"></td><td> <div style="margin-left:120px;margin-top:35px" alt="Space Invaders" width="180" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 489px; top: 135px;"><div id=":2bd" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Descargar el archivo adjunto " data-tooltip-class="a1V" data-tooltip="Descargar"><div class="aSK J-J5-Ji aYr"></div></div></div>    </td></tr><tr><td></td><td><p style="color:#fff;margin-left:0px;font-size:18px;width:300px;padding:10px;border-radius:10px;text-align:center;background-color:rgba(42, 41, 41, 0.92);">tienes  una proyección de gastos para los proximos 90 dias, con  una liquidez  negativa mayor a las ganancias o abonos registrados hasta la fecha. </p><h3 style="color:white;margin-left:60px"><a style="background-color:white;color:#111;border-radius:10px;text-align:center;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;margin-top:10em;margin-bottom:10em;text-decoration:none" href="https://finanzas.mochileros.com.mxe" target="_blank" >clik Para ir al panel </a></h3></td></tr><tr><td> </td><td></td></tr></tbody></table>';
            $cabeceras = "MIME-Version: 1.0" . "\r\n";
            $cabeceras.= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($para, $titulo, $mensaje, $cabeceras);

        }


        $finish=date('Y-m-d',strtotime('today + 180 days'));
        $finish = new Datetime($finish);
           //mes6
         foreach ($account2 as $c) {
         $totalm6 = 0;   
        $tmp = summary::where('created_at','<',$finish)->get();
         
            foreach ($tmp as $t) {

                if($t->type=='add'){
                    $totalm6+= $t->amount;
                }
                if($t->type=='out'){
                    $totalm6 -= $t->amount;
                }

            }
               $c->setAttribute('totalm6',$totalm6);      
        }    
        if($totalm6<0){
            $para      = $logemail;
            $titulo    = 'Notificacion del sistema de finanzas';
            $mensaje   = '<table cellpadding="0" cellspacing="0" width="640px" height="500px" style="background-image:url(https://finanzas.mochileros.com.mx/images/finanzas.png);background-size:100%"><tbody><tr style="background-color:rgba(68,66,65,0.68);height:10px"><td><img style="margin-top:10px;margin-left:50px;width:187px" src="https://finanzas.mochileros.com.mx/images/logomochi.png" class="CToWUd"></td><td> <div style="margin-left:120px;margin-top:35px" alt="Space Invaders" width="180" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 489px; top: 135px;"><div id=":2bd" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Descargar el archivo adjunto " data-tooltip-class="a1V" data-tooltip="Descargar"><div class="aSK J-J5-Ji aYr"></div></div></div>    </td></tr><tr><td></td><td><p style="color:#fff;margin-left:0px;font-size:18px;width:300px;padding:10px;border-radius:10px;text-align:center;background-color:rgba(42, 41, 41, 0.92);">tienes  una proyección de gastos para los proximos 180 dias, con  una liquidez  negativa mayor a las ganancias o abonos registrados hasta la fecha. </p><h3 style="color:white;margin-left:60px"><a style="background-color:white;color:#111;border-radius:10px;text-align:center;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;margin-top:10em;margin-bottom:10em;text-decoration:none" href="https://finanzas.mochileros.com.mxe" target="_blank" >clik Para ir al panel </a></h3></td></tr><tr><td> </td><td></td></tr></tbody></table>';
            $cabeceras = "MIME-Version: 1.0" . "\r\n";
            $cabeceras.= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($para, $titulo, $mensaje, $cabeceras);

        }
      
               $account2 = $account2->first();

             

          

             
      
 return view('vendor.adminlte.montos.montos',['summary'=>$account,'divisa'=>$divisa,'totalfinal'=>$totalfinal,'futuro'=>$futuro,'liquidez'=>$account2]);

    }else{
         return view('vendor.adminlte.permission',['summary'=>null]);
    }
   }  
  

}
