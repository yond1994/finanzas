<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Summary;
use App\Models\Attached;
use App\Models\Account;
use App\Models\Attributes;
use App\Models\Bitacora;
use App\Models\Tours;
use App\Models\Attributestours;
use App\Models\Settings;
use App\Models\Transfer;
use Auth;
use Datetime;



class ToursController extends Controller
{
     public function index()
   {
      $r=(new SummaryController)->pass($act='tours');
      if($r>0 ){
        $tours = Tours::all();
        return view('vendor.adminlte.tours.tours',['tours'=>$tours]);
      }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }
   }

   public function save(Request $request)
	{

     $r=(new SummaryController)->pass($act='tours');
      if($r==1 || $r==2 || $r==3 || $r==6  ){

    		$hoy=date('Y-m-d H:m:s',strtotime('today'));
          	$log = Auth::id();


    	    $valores = array(
    	    	'name' => $request->name,
    	    	'description' => $request->description,

    	    	);
    	   	$id=Tours::insertGetId($valores);

    		  $bitacora =  new Bitacora;
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

      $r=(new SummaryController)->pass($act='tours');
      if($r==1 || $r==2 || $r==4 || $r==7  ){

    		$data = Tours::where('id',$id)->first();
    		$data1 = AttributesTours::where('id_tours',$id)->get();

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
				    		AttributesTours::insert($valores);
				    	}else{
				    		AttributesTours::where('id',$ids[$n])->update($valores);
				    	}

		}



        $categories = Tours::find($id);
        $categories->name = $request->name;
		    $categories->description = $request->description;
		    $categories->save();

		    $bitacora = new Bitacora;
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

   $r=(new SummaryController)->pass($act='tours');
    if($r==1 || $r==5 || $r==6 || $r==7  ){
  		$hoy=date('Y-m-d H:m:s',strtotime('today'));
          $log = Auth::id();

  		if($data1 = Summary::where('tours_id',$id)->exists()){
  			$messaje = array(
                  'status' => 'error',
                  'messaje' => 'no se pudo Eliminar',
                  'tipo'=>'1');
  	     return view('vendor.adminlte.tours.error',['messaje'=>$messaje]);
  		}else{


  		$categories = Tours::find($id);

  		$data = Tours::where('id',$id)->first();
      	$attributes = AttributesTours::where('id_tours',$id)->delete();
          $categories->delete();

          $bitacora = new Bitacora;
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

    $r=(new SummaryController)->pass($act='tours');
    if($r==1 || $r==5 || $r==6 || $r==7  ){
		$hoy=date('Y-m-d H:m:s',strtotime('today'));
        $log = Auth::id();

		if($data1 = Summary::where('id_attr_tours',$id)->exists()){
			$messaje = array(
                'status' => 'error',
                'messaje' => 'no se pudo Eliminar',
                'tipo'=>'1');
	     return view('vendor.adminlte.tours.error',['messaje'=>$messaje]);
		}else{

		$categories = AttributesTours::find($id);

        $categories->delete();
        $bitacora = new Bitacora;
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
    	$tours = Tours::find($id);

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
	    	AttributesTours::insert($valores);
    	}
    	return redirect('tours/tours');
    }

    public function get_all($id){
    	$data = AttributesTours::where('id_tours',$id)->get();
    	return response()->json($data);
    }

    public function ver($id){

    $r=(new SummaryController)->pass($act='tours');
    if($r>0  ){

        $data = AttributesTours::where('id_tours',$id)->get();
        $tour = Tours::where('id',$id)->first();
        $divisa = Settings::where('name','divisa')->first();


         //total add
        foreach ($data as $a) {
         $totale = 0;
            $tmp = Summary::where('id_attr_tours',$a->id)->get();

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
            $tmp = Summary::where('id_attr_tours',$b->id)->get();

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
            $tmp = Summary::where('id_attr_tours',$c->id)->get();

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

      $r=(new SummaryController)->pass($act='tours');
      if($r>0  ){
        $hoy = new DateTime('now');

        $summary = Summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();


        // $summary = Summary::all();
        $categories = Categories::all();
        $tours = Tours::all();
        $account = Account::all();
        $divisa = Settings::where('name','divisa')->first();

        $movimientosa = AttributesTours::where('id',$id)->get();

        $namefecha = AttributesTours::where('id',$id)->first();

        $idtours=$namefecha->id_tours;
        $nametour= Tours::where('id',$idtours)->first();


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
          $summary = Summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();


          }else{
          $filter[] = array('type','=',$tipo);
          $summary = Summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();
          }
        }
        if(isset($cuentas)) {

          $filter[] = array('account_id','=',$cuentas);
          $summary = Summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();

        }
        if(isset($categorias)) {
          $filter[] = array('categories_id','=',$categorias);
          $summary = Summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();

        }
        if(isset($subcategorias)) {
          $filter[] = array('id_attr','=',$subcategorias);
          $summary = Summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();
        }

         if(isset($tf)) {
          $filter[] = array('tours_id','=',$tf);
          $summary = Summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();

        }
        if(isset($subcatetours)) {
          $filter[] = array('id_attr_tours','=',$subcatetours);
          $summary = Summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();

        }



        if((isset($start)) and (isset($finish))){

          $start = new Datetime($start);
          $finish = new Datetime($finish);


          $summary = Summary::whereBetween('created_at', [$start, $finish])->where($filter)->where('future','=',1)->where('id_attr_tours','=',$id)->get();
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

          $summary = Summary::whereBetween('created_at', [$start, $hoy])->where($filter)->where('future','=',1)->where('id_attr_tours','=',$id)->get();

        } else{
            if($filter) {
                $summary = Summary::where('created_at','<=',$hoy)->where($filter)->where('future','=',1)->where('id_attr_tours','=',$id)->get();
            }else  {
                $summary = Summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours','=',$id)->get();
            }
        }


        foreach ($summary as $s) {
          $name_account = Account::find($s->account_id);
          $s->setAttribute('name_account',$name_account->name);

          $name_categories = Categories::find($s->categories_id);
          $s->setAttribute('name_categories',$name_categories->name);


         $name_tours = Tours::find($s->tours_id);
         if($name_tours!=null){
             $s->setAttribute('name_tours',$name_tours->name);
         }

          if(Attached::where('summary_id',$s->id)->exists()){
            $data_attached = Attached::where('summary_id',$s->id)->first();
            $s->setAttribute('attached',$data_attached);
          }else{
            $s->setAttribute('attached',null);
          }

          if(Attributes::where('id_categorie',$s->account_id)->exists()){
            $data_attributes = Attributes::where('id_categorie',$s->account_id)->first();
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
                $tmp = Summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->where($filter)->get();
            }else {
                $tmp = Summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->get();
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
             $tmp = Summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->where($filter)->get();
         } else {
             $tmp = Summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->get();
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
             $tmp = Summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->where($filter)->get();
         }else {
             $tmp = Summary::where('created_at','<=',$hoy)->where('future','=',1)->where('id_attr_tours',$a->id)->get();
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
       $data = Tours::all();
     return response()->json($data);
    }

}
