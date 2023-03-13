<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attached;
use App\Models\Summary;
use Datetime;
use App\Models\Bitacora;
use Auth;


class AttachedController extends Controller
{
    public function index()
   {
   	   $r=(new SummaryController)->pass($act='adjuntos');
        if($r>0){
        $attached = Attached::all();
        	return view('vendor.adminlte.attached.attached',['attached'=>$attached]);
    	}else{
    		return view('vendor.adminlte.permission',['summary'=>null]);
    	}
   }	

   public function save(Request $request)
	{	
		$r=(new SummaryController)->pass($act='adjuntos');
        if($r==1 || $r==2 || $r==3 || $r==6 ){
    	$hoy = new Datetime ('now');
     	$log = Auth::id();
	// dd($request->input());
		$hoy = new Datetime ('now');
		$data = $request->file('path');
		
		if(isset($data)){
			$file = $request->path->store('attached','public');
		}
	
		$id=Attached::insertGetId([
	        'path' =>$file,
	        'created_at' => $hoy,
	        'updated_at'=>   $hoy,
	        'summary_id'=>  $request->summary_id,
        ]);    


	  $bitacora =  new Bitacora;
      $bitacora->type="add";
      $bitacora->created_date = $hoy;
      $bitacora->activity="Documento";
      $bitacora->id_user=$log;
      $bitacora->id_activity=$id;

      $bitacora->save();
	  return redirect('summary/summary');
		}else{
	    		return view('vendor.adminlte.permission',['summary'=>null]);
	    	}
 
	}

	public function nuevo(Request $request, $id){

		$r=(new SummaryController)->pass($act='adjuntos');
        if($r==1 || $r==2 || $r==3 || $r==6 ){

			$data = Summary::where('id',$id)->first();
			return view('vendor.adminlte.attached.create',['data'=>$data]);
		}else{
	    		return view('vendor.adminlte.permission',['summary'=>null]);
	    	}

	}
	public function edit(Request $request, $id){

		$r=(new SummaryController)->pass($act='adjuntos');
        if($r==1 || $r==2 || $r==4 || $r==7 ){

		$data = Attached::where('id',$id)->first();
		return view('vendor.adminlte.attached.edit',['data'=>$data]);

		}else{
	    		return view('vendor.adminlte.permission',['summary'=>null]);
	    	}


	}

	public function update(Request $request, $id)
	{	
		$hoy = new Datetime ('now');
		$log = Auth::id();
		$data = $request->file('path');
		
		if(isset($data)){
			$file = $request->path->store('attached','public');			
		}


        $attached = Attached::find($id);
        $attached->path = $file;
		$attached->updated_at = $hoy;
		$attached->save();

		$bitacora = new Bitacora;
        $bitacora->created_date = $hoy;
        $bitacora->type="update";
        $bitacora->id_activity=$id;
        $bitacora->activity="Documento";
        $bitacora->id_user=$log;
        $bitacora->save();
		return redirect('attached/attached');
	            
	}

	public function destroy( $id)
	{
		
		$r=(new SummaryController)->pass($act='adjuntos');
        if($r==1 || $r==5 || $r==6 || $r==7){

		$attached = Attached::find($id);
        $attached->delete();
       	return redirect('attached/attached');

       }else{
	    		return view('vendor.adminlte.permission',['summary'=>null]);
	    	}

       	
    }
}



	    // $response = array(
     //            'status' => 'guardo',
     //            'fecha' => $hoy,
     //            'archivo' => $request->path,
     //            );
	    //  return response()->json($response);
