<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Summary;
use App\Models\Categories;
use App\Models\Settings;
use App\Models\Attached;
use App\Models\Bitacora;
use Auth;
use Datetime;



class AccountController extends Controller
{
      public function index()
   {
      $r=(new SummaryController)->pass($act='cuentas');
      if($r>0){

        $account = Account::all();
        return view('vendor.adminlte.account.account',['account'=>$account]);
      }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }
   }	

   public function save(Request $request)
{

     $r=(new SummaryController)->pass($act='cuentas');
        if($r==1 ||$r==2 || $r==3 || $r==6){

      $hoy=date('Y-m-d H:m:s',strtotime('today'));
      $log = Auth::id();

      $id=Account::insertGetId([
        'name' => $request->name,
        'number' =>$request->number,
        'type'=>  $request->type,
        ]);    

      $bitacora =  new Bitacora;
      $bitacora->type="add";
      $bitacora->created_date = $hoy;
      $bitacora->activity="cuentas";
      $bitacora->id_user=$log;
      $bitacora->id_activity=$id;
      $bitacora->save();

    return redirect('account/account');
    }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }
 
}

	public function edit(Request $request, $id){
     $r=(new SummaryController)->pass($act='cuentas');
        if($r==1 || $r==2 || $r==4 || $r==7){

      		$data = Account::where('id',$id)->first();
      		return view('vendor.adminlte.account.edit',['data'=>$data]);
        }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }

	}



	public function update(Request $request, $id)
		{   
        $hoy=date('Y-m-d H:m:s',strtotime('today'));
        $log = Auth::id();
	      $account = Account::find($id);
	      $account->name = $request->name;
    		$account->number = $request->number;
    		$account->type = $request->type;
				$account->save();

        $bitacora = new Bitacora;
        $bitacora->created_date = $hoy;
        $bitacora->type="update";
        $bitacora->id_activity=$id;
        $bitacora->activity="movimiento";
        $bitacora->id_user=$log;
        $bitacora->save();

				return redirect('account/account');
	            
		}


    public function detalle(Request $request, $id=null)
   {  

    $r=(new SummaryController)->pass($act='cuentas');
        if($r>0){

      $hoy = new DateTime('now');
     // $hoy=date('Y-m-d',strtotime('today + 1 day'));
        $categories = Categories::all();
        $account = Account::all();
        $divisa = Settings::where('name','divisa')->first();

         //total saldo
          $response =array();
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
          if (is_array($total) && isset($total[$a->id])) {
              $a->setAttribute('total', $total[$a->id]);
          } else {
              $a->setAttribute('total', 0);
          }
        

         
        }
       
        $totalf=$total;



      if(!is_null($id)){
        if(Summary::where('account_id',$id)->exists()){
          $summary = Summary::where('account_id',$id)->get();
         
            $start = $request->input('start');
            $finish = $request->input('finish');


            if((isset($start)) and (isset($finish))){
                 
              $summary = Summary::where('account_id',$id)->whereBetween('created_at', [$start, $finish])->get();
            }else{        
              $summary = Summary::where('created_at','<=',$hoy)->where('account_id',$id)->get();
            }
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
        }else{
                $summary=array();
              }
            $nombre = Account::where('id',$id)->first();

          
         
              return view('vendor.adminlte.account.detalle',['summary'=>$summary,'divisa'=>$divisa,'id'=>$id,'nombre'=>$nombre,'totalf'=>$totalf]);
      }

        $start = $request->input('start');
        $finish = $request->input('finish');

        if((isset($start)) and (isset($finish))){
          $start = new Datetime($start);
          $finish = new Datetime($finish);
          $summary = Summary::whereBetween('created_at', [$start, $finish])->get();
        }else{
          $summary = Summary::where('account_id',$id)->get();
        }

        
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

        return view('vendor.adminlte.account.detalle',['summary'=>$summary,'divisa'=>$divisa,'id'=>null,'nombre'=>null,'totalf'=>null]);
         }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }
   }    



	public function destroy( $id)
	{

      $r=(new SummaryController)->pass($act='cuentas');
        if($r==1 || $r==5 || $r==6 || $r==7){

      		if($data1 = Summary::where('account_id',$id)->exists()){
      			$messaje = array(
                      'status' => 'error',
                      'messaje' => 'no se pudo Eliminar',
                      'tipo'=>'1');
      	     return view('vendor.adminlte.account.error',['messaje'=>$messaje]);
      		}else{

              $hoy=date('Y-m-d H:m:s',strtotime('today'));
              $log = Auth::id();
      		    $account = Account::find($id);
              $account->delete();
              $bitacora = new Bitacora;
              $bitacora->created_date = $hoy;
              $bitacora->type="delete";
              $bitacora->id_activity=$id;
              $bitacora->activity="cuentas";
              $bitacora->id_user=$log;
              $bitacora->save();

             	return redirect('account/account');
             }
              }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }

    }

}
