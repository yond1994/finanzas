<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Categories;
use App\Models\Summary;
use App\Models\Settings;
use App\Models\Attached;
use App\Models\Bitacora;
use App\Models\Transfer;
use Auth;
use Datetime;


class TransferController extends Controller
{   

      public function totales()
   {    
       $r=(new SummaryController)->pass($act='transferencia');
       if($r>0 ){  
        $hoy=date('Y-m-d',strtotime('today + 1 days'));
        $summary = Summary::where('created_at','<=',$hoy)->orderBy('id','desc')->get();
        $total =array();
        // $summary = Summary::all();
        $categories = Categories::all();
        $account = Account::all();
        $divisa = Settings::where('name','divisa')->first();
       
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
        
        $totalfinal=0;
        foreach ($total as $b) {
           
           $totalfinal+=$b;
        }
       
       
        return view('vendor.adminlte.transfer.create',['data'=>$account,'divisa'=>$divisa,'totalfinal'=>$totalfinal]);
      }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }
   }  

   public function consul($id){

    $r=(new SummaryController)->pass($act='transferencia');
       if($r>0 ){  
        $hoy=date('Y-m-d',strtotime('today + 1 days'));
  
        $account = Account::all();
        $divisa = Settings::where('name','divisa')->first();
      
        foreach ($account as $a) {
          $tmp = Summary::where('created_at','<=',$hoy)->where('account_id',$id)->get();

          
          $total = 0;
          foreach ($tmp as $t) {
            if($t->type=='out'){
              $total -= $t->amount;
            }else{
            $total+= $t->amount;
            }
          }
        $a->setAttribute('total',$total);
       
        }
        
      $data2=$total;
      $data2 = number_format($data2, 2);
      
      return response()->json($data2);
      }else{
         return view('vendor.adminlte.permission',['summary'=>null]);
      }
    }
  
    
    public function crear(Request $request){

       $r=(new SummaryController)->pass($act='transferencia');
       if($r==1 || $r==2 || $r==3 || $r==6 ){  

   		  $summary = Summary::all();
        $categories = Categories::all();
        $account = Account::all();
        $divisa = Settings::where('name','divisa')->first();

    
        foreach ($summary as $s) {
          $name_account = Account::find($s->account_id);
          $s->setAttribute('name_account',$name_account->name);
          $name_categories = Categories::find($s->categories_id);
          $s->setAttribute('name_categories',$name_categories->name);

          if(Attached::where('summary_id',$s->id)->exists()){
            $data_attached = Attached::where('summary_id',$s->id)->first();
            $s->setAttribute('attached',$data_attached);

          }else{
            $s->setAttribute('attached',null);
          }
        }

        return view('vendor.adminlte.transfer.create',['summary'=>$summary,'divisa'=>$divisa,'data'=>$account,'data2'=>$categories]);

      }else{
           return view('vendor.adminlte.permission',['summary'=>null]);
      }

  }
  	 public function save(Request $request)
  {
    $hoyy=date('Y-m-d H:m:s',strtotime('today'));
    $log = Auth::id();
  	$hoy = new Datetime ('now');

     $str = str_replace(",", "", $request->amount);

      $valores_add = Summary::insertGetId([
      	'created_at' =>  $request ->created_at,
      	'concept' => "Transferencia Recibida",
      	'type' =>$type = 'add',
      	'amount' => $amount = $str,
        'id_attr' => $request ->id_attr,
        'id_autor'=>$log,
      	'account_id' => $request->destino,
      	'categories_id' => $request->categories_id,
      	]);
        
      $bitacora =  new Bitacora;
      $bitacora->type="transfer";
      $bitacora->created_date = $hoyy;
      $bitacora->activity="transferencia";
      $bitacora->id_user=$log;
      $bitacora->id_activity=$valores_add;
      $bitacora->save();
 

      $valores_out=Summary::insertGetId([
      	'created_at' => $request->created_at,
      	'concept' =>  "Transferencia Enviada ",
      	'type' =>$type = 'out',
      	'amount' => $str,
      	'account_id' => $request->origen,
        'id_attr' => $request ->id_attr,
        'id_autor'=>$log,
      	'categories_id' => $request->categories_id,
      	]);
       
      $bitacora =  new Bitacora;
      $bitacora->type="transfer";
      $bitacora->created_date = $hoyy;
      $bitacora->activity="transferencia";
      $bitacora->id_user=$log;
      $bitacora->id_activity=$valores_out;
      $bitacora->save();

      $transfer =  new transfer;


       $transfer=transfer::insertGetId([
        'id_add'=>$id_add=$valores_add,
        'id_out'=>$id_out=$valores_out,
        ]);

      $summary = Summary::find($valores_add);
      $summary->id_transfer=$transfer;
      $summary->save();

      $summary = Summary::find($valores_out);
      $summary->id_transfer=$transfer;
      $summary->save();

      return redirect('summary/summary');
   
  }

  public function edit(Request $request, $id){
    
    $r=(new SummaryController)->pass($act='transferencia');
       if($r==1 || $r==2 || $r==4 || $r==7 ){ 

       $transfer= transfer::where('id',$id)->get(); 

        foreach ($transfer as $t ) {
            $a=$t->id_add;
            $b=$t->id_out;
        }

    $account = Account::all();
    $out = Summary::where('id',$a)->first();
    $add = Summary::where('id',$b)->first();

      return view('vendor.adminlte.transfer.edit',['add'=>$add,'out'=>$out,'account'=>$account]);
      }else{
         return view('vendor.adminlte.permission',['summary'=>null]);
      }
        
  }

   public function update(Request $request, $id)
  { 

    $hoy=date('Y-m-d H:m:s',strtotime('today'));
    $log = Auth::id();
    
      $transfer= transfer::where('id',$id)->get(); 

        foreach ($transfer as $t ) {
            $a=$t->id_add;
            $b=$t->id_out;
        }

    //transferencia resivida
    $summary = Summary::find($a);
    $summary->created_at = $request->created_at;
    $summary->concept ="Transferencia Recibida";
    $summary->type = "add";
    $str = str_replace(",", "", $request->amount);
    $summary->amount = $str;
    $summary->account_id  = $request->destino;
    $summary->categories_id  = $request->categories_id  ;
    $summary->save();

    $bitacora = new Bitacora;
    $bitacora->created_date = $hoy;
    $bitacora->type="update";
    $bitacora->id_activity=$a;
    $bitacora->activity="tranferencia";
    $bitacora->id_user=$log;
    $bitacora->save();


    //transferencia enviada
    $summary = Summary::find($b);
    $summary->created_at = $request->created_at;
    $summary->concept ="Transferencia Enviada ";
    $summary->type = "out";
    $str = str_replace(",", "", $request->amount);
    $summary->amount = $str;
    $summary->account_id  = $request->origen;
    $summary->categories_id  = $request->categories_id;
    $summary->save();

    $bitacora = new Bitacora;
    $bitacora->created_date = $hoy;
    $bitacora->type="update";
    $bitacora->id_activity=$b;
    $bitacora->activity="tranferencia";
    $bitacora->id_user=$log;
    $bitacora->save();





    return redirect('summary/summary');
              
  }



}
