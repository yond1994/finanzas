<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Summary;
use App\Models\Account;
use App\Models\Categories;
use App\Models\Settings;
use App\Models\Permissions as Permissions;
use Datetime;
use Auth;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */


    public function index()
    {

    $log = Auth::id();
    $user=array();
    $user = Permissions::where('id_user',$log)->first();
      if($user==null){
        
        $per = new Permissions;
        $per->id_user=$log;
        $per->save();

      }
    $r=(new SummaryController)->pass($act='movimientos');
    if($r>0 ){  

          $hoy=date('Y-m-d',strtotime('today'));
          $hoyy=date('Y-m-d 00:00:00',strtotime('today'));

          $summa = Summary::where('created_at','=',$hoyy)->limit(2)->get();
          $alerta = array();
          foreach ($summa as $s) {
            
                     if($s->created_at==$hoyy){
                          $alerta=$s->created_at;
                          $alerta=$summa;
                     }else{
                      $alerta =null;
                     }

          }
           
          $summary = Summary::where('created_at','<=',$hoy)->orderBy('id','desc')->limit(5)->get();




          $categories = Categories::all();
          $divisa = Settings::where('name','divisa')->first();
          $account = Account::orderBy('id','desc')->limit(5)->get();
         
          $response =array();
          foreach ($account as $a) {
              $tmp = Summary::where('created_at','<=',$hoy)->where('account_id',$a->id)->get();
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
         
          //total de entradas y salidas
          $mes=date('Y-m-d',strtotime('today - 30 days'));
          

        
           
            $ultimo = Summary::whereBetween('created_at', [$mes, $hoy])->get();
         
         
          $add = 0;
          $out = 0;
          foreach ($ultimo as $s) {
          
              if($s->type=='add'){
                $add +=$s->amount;
              }elseif($s->type=='out'){
                $out +=$s->amount; 
              }else{
                $add =0;
                $out =0; 
              }
          }


          foreach ($summary as $s) {
            $name_account = Account::find($s->account_id);
            $s->setAttribute('name_account',$name_account->name);
          }
          foreach ($summary as $a) {
            $name_categories = Categories::find($a->categories_id);
            $a->setAttribute('name_categories',$name_categories->name);
          }
          return view('vendor.adminlte.home',['summary'=>$account,'account'=>$summary,'add'=>$add,'out'=>$out,'divisa'=>$divisa,'alerta'=>$alerta]);

      }else{
         return view('vendor.adminlte.permission',['summary'=>null]);
      }
        
    }

      public function grafica(Request $request){
        $start = $request->input('start');
        $finish = $request->input('finish');

        if((isset($start)) and (isset($finish))){
          $start = new Datetime($start);
          $finish = new Datetime($finish);
          $summary = Summary::whereBetween('created_at', [$start, $finish])->get();
        }else{
          $summary = Summary::all();
        }

        
        $mes = array();
        $amounts = array();
        foreach ($summary as $s) {
          $mes[]=date('M',strtotime($s->created_at));
        }
        $mes = array_unique($mes);
        foreach ($mes as $m) {
          $amounts[$m] = array(
              'add' => 0,
              'out' => 0
            );
          foreach ($summary as $s) {
            $m_tmp = date('M',strtotime($s->created_at));
            if($m_tmp == $m){
              if($s->type == 'add'){
                  $amounts[$m]['add'] += $s->amount;
              }else{
                $amounts[$m]['out'] += $s->amount;
              }
              
            }
          }
        }
        $response = array(
            'labels' => $mes,
            'amounts' => $amounts
          );

        return response()->json($response);
      }

   
}