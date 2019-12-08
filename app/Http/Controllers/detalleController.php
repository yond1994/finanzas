<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\summary;
use App\account;
use App\categories;
use App\attached;
use App\attributes;
use App\User;
use Illuminate\Support\Facades\Storage;

class detalleController extends Controller
{
    

    public function view(Request $request, $id){

        $r=(new summaryController)->pass($act='cuentas');
        if($r>0){

            // $categories = categories::all();
            $data = summary::where('id',$id)->first();
            $account = account::where('id',$data->account_id)->first();
            $categories = categories::where('id',$data->categories_id)->first();
            $attributes = attributes::where('id',$data->id_attr)->first();
            $usuario = User::where('id',$data->id_autor)->first();

            if($usuario==null){
             $usuario=array();
            }
          
            if($attached = attached::where('summary_id',$id)->exists()){
            	$attached = attached::where('summary_id',$id)->first();
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
             return view('vendor.adminlte.permission',['summary'=>null]);
        }

  }

  public function downloadFile($id){
        $r=(new summaryController)->pass($act='cuentas');
        if($r>0){
    		$data_file = attached::find($id);
    		return response()->file(storage_path('app/public/'.$data_file->path));
        }else{
             return view('vendor.adminlte.permission',['summary'=>null]);
        }
    }
    
}
