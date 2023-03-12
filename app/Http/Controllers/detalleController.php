<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summary;
use App\Models\Account;
use App\Models\Categories;
use App\Models\Attached;
use App\Models\Attributes;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DetalleController extends Controller
{
    

    public function view(Request $request, $id){

        $r=(new SummaryController)->pass($act='cuentas');
        if($r>0){

            // $categories = Categories::all();
            $data = Summary::where('id',$id)->first();
            $account = Account::where('id',$data->account_id)->first();
            $categories = Categories::where('id',$data->categories_id)->first();
            $attributes = Attributes::where('id',$data->id_attr)->first();
            $usuario = User::where('id',$data->id_autor)->first();

            if($usuario==null){
             $usuario=array();
            }
          
            if($attached = Attached::where('Summary_id',$id)->exists()){
            	$attached = Attached::where('Summary_id',$id)->first();
            	$data->setAttribute('attached',$attached);
            }else{
            	$data->setAttribute('attached',null);
            }
            $data->setAttribute('name_a',$account);
            $data->setAttribute('name_c',$categories);
            
            if($attributes==null){

                $data->setAttribute('name_atr',null);
            }else{
                 $data->setAttribute('name_atr',$attributes);
            }
            return view('vendor.adminlte.detalle.detalle',['data'=>$data,'user'=>$usuario]);

        }else{
             return view('vendor.adminlte.permission',['Summary'=>null]);
        }

  }

  public function downloadFile($id){
        $r=(new SummaryController)->pass($act='cuentas');
        if($r>0){
    		$data_file = Attached::find($id);
    		return response()->file(storage_path('app/public/'.$data_file->path));
        }else{
             return view('vendor.adminlte.permission',['Summary'=>null]);
        }
    }
    
}
