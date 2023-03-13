<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Permissions;
use App\Models\Bitacora;


class UsersController extends Controller
{
      public function index()
   {
     $r=(new SummaryController)->pass($act='usuario');
       if($r>0 ){  
            $user = User::all();
            $log = Auth::id();

            return view('vendor.adminlte.users.users',['user'=>$user,'log'=>$log]);
        }else{
             return view('vendor.adminlte.permission',['summary'=>null]);
        }
   }

   	public function activar(Request $request, $id)
		{

       $r=(new SummaryController)->pass($act='usuario');
       if($r=1 || $r=2 || $r=4 || $r=7   ){  
		$hoy=date('Y-m-d H:m:s',strtotime('today'));
        $log = Auth::id();

	            $user = User::find($id);
	            $user->status = 1;
				$user->save();


		$bitacora = new Bitacora;
        $bitacora->created_date = $hoy;
        $bitacora->type="update";
        $bitacora->id_activity=$id;
        $bitacora->activity="usuario";
        $bitacora->id_user=$log;
        $bitacora->save();
				return redirect('users/users');
                 }else{
                 return view('vendor.adminlte.permission',['summary'=>null]);
                 }
	            
		}	

	public function desactivar(Request $request, $id)
	{	
        $r=(new SummaryController)->pass($act='usuario');
        if($r=1 || $r=2 || $r=4 || $r=7   ){  	
		$hoy=date('Y-m-d H:m:s',strtotime('today'));
        $log = Auth::id();

            $user = User::find($id);
            $user->status = 0;
			$user->save();

		$bitacora = new Bitacora;
        $bitacora->created_date = $hoy;
        $bitacora->type="update";
        $bitacora->id_activity=$id;
        $bitacora->activity="usuario";
        $bitacora->id_user=$log;
        $bitacora->save();

			return redirect('users/users');
        }else{
             return view('vendor.adminlte.permission',['summary'=>null]);
        }
            
	}
	 public function destroy( $id)
	  {
        $r=(new SummaryController)->pass($act='usuario');
        if($r=1 || $r=5 || $r=6 || $r=7   ){  
        	  	$hoy=date('Y-m-d H:m:s',strtotime('today'));
                $log = Auth::id();

                $permisos= Permissions::where('id_user',$id)->first();
              

                if($log==$id){
                    return view('vendor.adminlte.permission',['summary'=>null]);
                }else{

                $permisos1=$permisos->id;
              

                    $user2 = Permissions::find($permisos1);
                    $user2->delete();

                    $user = User::find($id);
                    $user->delete();

                $bitacora = new Bitacora;
                $bitacora->created_date = $hoy;
                $bitacora->type="delete";
                $bitacora->id_activity=$id;
                $bitacora->activity="usuario";
                $bitacora->id_user=$log;
                $bitacora->save();

        	    return redirect('users/users');
                }
         }else{
             return view('vendor.adminlte.permission',['summary'=>null]);
        }
        	       
	    }		
}
