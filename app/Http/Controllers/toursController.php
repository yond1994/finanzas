<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\summary;
use App\attached;
use App\account;
use App\attributes;
use App\bitacora;
use App\tours;
use App\attributestours;
use App\settings;
use App\transfer;
use Auth;
use Datetime;



class toursController extends Controller
{
     public function index()
   {
      $r=(new summaryController)->pass($act='tours');
      if($r>0 ){
        $tours = tours::all();
        return view('vendor.adminlte.tours.tours',['tours'=>$tours]);
      }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }
   }

   public function save(Request $request)
	{

     $r=(new summaryController)->pass($act='tours');
      if($r==1 || $r==2 || $r==3 || $r==6  ){

    		$hoy=date('Y-m-d H:m:s',strtotime('today'));
          	$log = Auth::id();


    	    $valores = array(
    	    	'name' => $request->name,
    	    	'description' => $request->description,

    	    	);
    	   	$id=tours::insertGetId($valores);

    		  $bitacora =  new bitacora;
    		  $bitacora->type="add";
    		  $bitacora->created_date = $hoy;
    		  $bitacora->activity="tours";
    		  $bitacora->id_user=$log;
    		  $bitacora->id_activity=$id;
    		  $bitacora->save();
    	    return redirect('tours/tours/attr/'.$id);
        }else{
           return view('vendor.adminlte.permission',['summary'=>null]);
        }
	}

	public function edit(Request $request, $id){

      $r=(new summaryController)->pass($act='tours');
      if($r==1 || $r==2 || $r==4 || $r==7  ){

    		$data = tours::where('id',$id)->first();
    		$data1 = attributestours::where('id_tours',$id)->get();

    		return view('vendor.adminlte.tours.edit',['data'=>$data,'data1'=>$data1]);
      }else{
           return view('vendor.adminlte.permission',['summary'=>null]);
      }

	}

	public function update(Request $request, $id=null)
	{
		$hoy=date('Y-m-d H:m:s',strtotime('today'));
        $log = Auth::id();

		$date = $request->input('date');
		$ids= $request->input('id');
    	$values = str_replace(",", "", $request->input('price'));


    	foreach ($date as $n => $v ) {
				    	$valores = array(
				      			'date' => $v,
					    		'price' => $values[$n],
					    		'id_tours' => $id,
					    		);
				    	if($ids[$n]==0){
				    		attributestours::insert($valores);
				    	}else{
				    		attributestours::where('id',$ids[$n])->update($valores);
				    	}

		}



        $categories = tours::find($id);
        $categories->name = $request->name;
		    $categories->description = $request->description;
		    $categories->save();

		    $bitacora = new bitacora;
        $bitacora->created_date = $hoy;
        $bitacora->type="update";
        $bitacora->id_activity=$id;
        $bitacora->activity="tours";
        $bitacora->id_user=$log;
        $bitacora->save();

		return redirect('tours/tours/');
	}

	public function destroy( $id)
	{

   $r=(new summaryController)->pass($act='tours');
    if($r==1 || $r==5 || $r==6 || $r==7  ){
  		$hoy=date('Y-m-d H:m:s',strtotime('today'));
          $log = Auth::id();

  		if($data1 = summary::where('tours_id',$id)->exists()){
  			$messaje = array(
                  'status' => 'error',
                  'messaje' => 'no se pudo Eliminar',
                  'tipo'=>'1');
  	     return view('vendor.adminlte.tours.error',['messaje'=>$messaje]);
  		}else{


  		$categories = tours::find($id);

  		$data = tours::where('id',$id)->first();
      	$attributes = attributestours::where('id_tours',$id)->delete();
          $categories->delete();

          $bitacora = new bitacora;
          $bitacora->created_date = $hoy;
          $bitacora->type="delete";
          $bitacora->id_activity=$id;
          $bitacora->activity="tours";
          $bitacora->id_user=$log;
          $bitacora->save();
         	return redirect('tours/tours');
         	}
        }else{
           return view('vendor.adminlte.permission',['summary'=>null]);
        }
    }
    public function destroyattr( $id)
	{

    $r=(new summaryController)->pass($act='tours');
    if($r==1 || $r==5 || $r==6 || $r==7  ){
		$hoy=date('Y-m-d H:m:s',strtotime('today'));
        $log = Auth::id();

		if($data1 = summary::where('id_attr_tours',$id)->exists()){
			$messaje = array(
                'status' => 'error',
                'messaje' => 'no se pudo Eliminar',
                'tipo'=>'1');
	     return view('vendor.adminlte.tours.error',['messaje'=>$messaje]);
		}else{

		$categories = attributestours::find($id);

        $categories->delete();
        $bitacora = new bitacora;
        $bitacora->created_date = $hoy;
        $bitacora->type="delete";
        $bitacora->id_activity=$id;
        $bitacora->activity="tours";
        $bitacora->id_user=$log;
        $bitacora->save();
       	return redirect('tours/tours');
       	}
       }else{
            return view('vendor.adminlte.permission',['summary'=>null]);
       }
    }

    public function view_attr($id=null){
    	$tours = tours::find($id);

    	return view('vendor.adminlte.tours.attr',['tours'=>$tours]);
    }

    public function save_attr(Request $request,$id=null){
    	$name = $request->input('date');
    	$values = str_replace(",", "", $request->input('price'));


    	foreach ($name as $n => $v) {
	    	$valores = array(
	    		'date' => $v,
	    		'price' => $values[$n],
	    		'id_tours' => $id
	    		);
	    	attributestours::insert($valores);
    	}
    	return redirect('tours/tours');
    }

    public function get_all($id){
    	$data = attributestours::where('id_tours',$id)->get();
    	return response()->json($data);
    }

    public function ver($id){

    $r=(new summaryController)->pass($act='tours');
    if($r>0  ){

        $data = attributestours::where('id_tours',$id)->get();
        $tour = tours::where('id',$id)->first();
        $divisa = settings::where('name','divisa')->first();


         //total add
        foreach ($data as $a) {
         $totale = 0;
            $tmp = summary::where('id_attr_tours',$a->id)->get();

            foreach ($tmp as $t) {

                if($t->type=='add'){
                    $totale += $t->amount;
                }

            }
               $a->setAttribute('totale',$totale);
        }

         //total out
        foreach ($data as $b) {
         $totals = 0;
            $tmp = summary::where('id_attr_tours',$b->id)->get();

            foreach ($tmp as $t) {

                if($t->type=='out'){
                    $totals += $t->amount;
                }

            }
               $b->setAttribute('totals',$totals);
        }
        //total final
         foreach ($data as $c) {
         $totalf = 0;
            $tmp = summary::where('id_attr_tours',$c->id)->get();

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
        return view('vendor.adminlte.tours.tourdetail',['data'=>$data,'tour'=>$tour,'divisa'=>$divisa]);
      }else{
         return view('vendor.adminlte.permission',['summary'=>null]);
      }

    }



    public function fecha(Request $request, $id=null){

      $r=(new summaryController)->pass($act='tours');
      if($r>0  ){
        $hoy = new DateTime('now');

        $summary = summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();


        // $summary = summary::all();
        $categories = categories::all();
        $tours = tours::all();
        $account = account::all();
        $divisa = settings::where('name','divisa')->first();

        $movimientosa = attributestours::where('id',$id)->get();

        $namefecha = attributestours::where('id',$id)->first();

        $idtours=$namefecha->id_tours;
        $nametour= tours::where('id',$idtours)->first();


        $total=array();
        $totaliva=array();
        $totalivae=array();



        $start = $request->input('start');
        $finish = $request->input('finish');
        $dias = $request->input('dias');
        $tipo = $request->input('tipo');
        $cuentas = $request->input('cuentas');
        $categorias = $request->input('categoria');
        $subcategorias = $request->input('id_attr');
        $tf = $request->input('tf');
        $subcatetours = $request->input('id_attr_tours');

        $filter=array();


        if(isset($tipo)) {

          if($tipo==1){
          $filter[] = array('categories_id','=',$tipo);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();


          }else{
          $filter[] = array('type','=',$tipo);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();
          }
        }
        if(isset($cuentas)) {

          $filter[] = array('account_id','=',$cuentas);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();

        }
        if(isset($categorias)) {
          $filter[] = array('categories_id','=',$categorias);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();

        }
        if(isset($subcategorias)) {
          $filter[] = array('id_attr','=',$subcategorias);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();
        }

         if(isset($tf)) {
          $filter[] = array('tours_id','=',$tf);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();

        }
        if(isset($subcatetours)) {
          $filter[] = array('id_attr_tours','=',$subcatetours);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();

        }



        if((isset($start)) and (isset($finish))){

          $start = new Datetime($start);
          $finish = new Datetime($finish);


          $summary = summary::whereBetween('created_at', [$start, $finish])->where($filter)->where('future','=',1)->where('id_attr_tours','=',$id)->get();
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

          $summary = summary::whereBetween('created_at', [$start, $hoy])->where($filter)->where('future','=',1)->where('id_attr_tours','=',$id)->get();

        } else{
            if($filter) {
                $summary = summary::where('created_at','<=',$hoy)->where($filter)->where('future','=',1)->where('id_attr_tours','=',$id)->get();
            }else  {
                $summary = summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();
            }
        }


        foreach ($summary as $s) {
          $name_account = account::find($s->account_id);
          $s->setAttribute('name_account',$name_account->name);

          $name_categories = categories::find($s->categories_id);
          $s->setAttribute('name_categories',$name_categories->name);


         $name_tours = tours::find($s->tours_id);
         if($name_tours!=null){
             $s->setAttribute('name_tours',$name_tours->name);
         }

          if(attached::where('summary_id',$s->id)->exists()){
            $data_attached = attached::where('summary_id',$s->id)->first();
            $s->setAttribute('attached',$data_attached);
          }else{
            $s->setAttribute('attached',null);
          }

          if(attributes::where('id_categorie',$s->account_id)->exists()){
            $data_attributes = attributes::where('id_categorie',$s->account_id)->first();
            $s->setAttribute('attributes',$data_attributes);
          }else{
            $s->setAttribute('attributes',null);
          }




        }

        $total=array();
        foreach ($account as $a) {

          $total[$a->id] = 0;
          foreach ($summary as $t) {

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

           $totalfinal=$b;
        }

          //impuestos

            //impuestos
        foreach ($account as $e) {

          $totalivae[$e->id] = 0;
          foreach ($summary as $ee) {

            if($ee->type=='add'){
              $totalivae[$e->id] += $ee->tax;
            }
          }
        $e->setAttribute('totaliva',$totalivae[$e->id]);

        }



            foreach ($account as $i) {

          $totaliva[$i->id] = 0;
          foreach ($summary as $ii) {

            if($ii->type=='out'){
              $totaliva[$i->id] += $ii->tax;
            }
          }
        $i->setAttribute('totaliva',$totaliva[$i->id]);

        }


         $totalfinaliva=0;
        foreach ($totaliva as $b) {

            $totalfinaliva=$b;
        }

        $totalfinalivae=0;
        foreach ($totalivae as $be) {

            $totalfinalivae=$be;
        }

          //total add
        foreach ($movimientosa as $a) {
         $totale = 0;
            if($filter) {
                $tmp = summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->where($filter)->get();
            }else {
                $tmp = summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->get();
            }


            foreach ($tmp as $t) {

                if($t->type=='add'){
                    $totale += $t->amount;
                }

            }
               $a->setAttribute('totale',$totale);
        }

         //total out
        foreach ($movimientosa as $b) {
         $totals = 0;
         if($filter) {
             $tmp = summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->where($filter)->get();
         } else {
             $tmp = summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->get();
         }


            foreach ($tmp as $t) {

                if($t->type=='out'){
                    $totals += $t->amount;
                }

            }
               $b->setAttribute('totals',$totals);
        }
        //total final
         foreach ($movimientosa as $c) {
         $totalf = 0;
         if($filter) {
             $tmp = summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->where($filter)->get();
         }else {
             $tmp = summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->get();
         }


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
        $movimientosa = $movimientosa->first();

      return view('vendor.adminlte.tours.fecha',['summary'=>$summary,'divisa'=>$divisa,'data'=>$account,'data2'=>$categories,'totalfinal'=>$totalfinal,'totalfinaliva'=>$totalfinaliva,'totalfinalivae'=>$totalfinalivae,'tours'=>$tours,'namefecha'=>$namefecha,'nametour'=>$nametour,'movimientosa'=>$movimientosa]);

        }else{
           return view('vendor.adminlte.permission',['summary'=>null]);
        }
    }

    public function select(){
       $data = tours::all();
     return response()->json($data);
    }

}
