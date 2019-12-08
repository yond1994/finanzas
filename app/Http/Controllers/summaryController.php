<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\summary;
use App\account;
use App\categories;
use App\attached;
use App\settings;
use App\bitacora;
use App\transfer;
use App\attributes;
use App\tours;
use App\attributestours;
use App\permissions;
use Auth;
use Datetime;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class summaryController extends Controller
{
  

    public function pass($act=null)
   {    
    $permisos = permissions::where('id_user',Auth::id())->first();
    $permisos = $permisos->toArray();
    return $permisos[$act];
   }
   
    public function index(Request $request)
   {    
        
        $r=$this->pass('movimientos');
        if($r>0){

        //$hoy=date('Y-m-d',strtotime('today - 1 days'));
        $hoy = new DateTime('now');
      
        $summary = summary::where('created_at','<=',$hoy)->where('future','=',1)->get();
        // $summary = summary::all();
        $categories = categories::all();
        $tours = tours::all();
        $account = account::all();
        $divisa = settings::where('name','divisa')->first();


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
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->get();

          
          }else{
          $filter[] = array('type','=',$tipo);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->get();
          }
        }
        if(isset($cuentas)) {  

          $filter[] = array('account_id','=',$cuentas);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->get();

        }
        if(isset($categorias)) {  
          $filter[] = array('categories_id','=',$categorias);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->get();
        
        }
        if(isset($subcategorias)) {  
          $filter[] = array('id_attr','=',$subcategorias);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->get();
        }

         if(isset($tf)) {  
          $filter[] = array('tours_id','=',$tf);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->get();
         
        }
        if(isset($subcatetours)) {  
          $filter[] = array('id_attr_tours','=',$subcatetours);
          $summary = summary::where($filter)->where('created_at','=<',$hoy)->where('future','=',1)->get();
         
        }
       
      

        if((isset($start)) and (isset($finish))){

          $start = new Datetime($start);
          $finish = new Datetime($finish);

         
          $summary = summary::whereBetween('created_at', [$start, $finish])->where($filter)->where('future','=',1)->get();

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

          $summary = summary::whereBetween('created_at', [$start, $hoy])->where($filter)->where('future','=',1)->get();
        }else{

            if($filter) {
                $summary = summary::where('created_at','<=',$hoy)->where('future','=',1)->where($filter)->get();
            }else {
                $summary = summary::where('created_at','<=',$hoy)->where('future','=',1)->get();
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


        return view('vendor.adminlte.summary.summary',['summary'=>$summary,'divisa'=>$divisa,'data'=>$account,'data2'=>$categories,'totalfinal'=>$totalfinal,'totalfinaliva'=>$totalfinaliva,'totalfinalivae'=>$totalfinalivae,'tours'=>$tours]);

      }else{
          return view('vendor.adminlte.permission',['summary'=>null]);
      }
   }	
     
   public function crear(Request $request){

     $r=$this->pass('movimientos');
        if($r==1 || $r==2 || $r==3  || $r==6 ){

      $type = $request->input('type');
      $data = account::all();
      $data2 = categories::all();
      $tours = tours::all();
   
        return view('vendor.adminlte.summary.create',['data'=>$data,'data2'=>$data2,'type'=>$type,'tours'=>$tours]);

    }else{
          return view('vendor.adminlte.permission',['summary'=>null]);
      }
    
  }
	
  public function save(Request $request)
  {
    $adjunto = $request->file('path');

    $hoy=date('Y-m-d H:m:s',strtotime('today'));
    $log = Auth::id();
 
    $str = str_replace(",", "", $request->amount);
    $iva = str_replace(",", "", $request->tax);


    if($request->created_at > $hoy){
      $alerta=2;
    }else{
      $alerta=1;
    }
   
      $id=summary::insertGetId([
        'created_at' => $request->created_at,
        'id_attr' => $request->id_attr,
        'concept'=>  $request->concept,
        'type'=> $request->type,
        'amount'=> $str,
        'tax'=> $iva, 
        'factura'=> $request->factura,
        'account_id'=> $request->account_id,
        'categories_id'=>$request->categories_id,
        'id_attr_tours'=>$request->id_attr_tours,
        'tours_id'=>$request->tours_id,
        'id_autor'=>$log,
        'future'=>$alerta   
        ]);     

       
        
        if($adjunto!=null){
         $file = $request->path->store('attached','public');
           $id2=attached::insertGetId([
              'path' =>$file,
              'created_at' => $hoy,
              'updated_at'=>   $hoy,
              'summary_id'=>  $id,
            ]);    
        }

  

      $bitacora =  new bitacora;
      if($request->type=="add"){
        $bitacora->type="add";
      }else{        
        $bitacora->type="out";
      }
      $bitacora->created_date = $hoy;
      $bitacora->activity="movimiento";
      $bitacora->id_user=$log;
      $bitacora->id_activity=$id;
      $bitacora->save();

      return redirect('summary/summary');
  }
  public function edit(Request $request, $id){

    $r=$this->pass('movimientos');
    if($r==1 || $r==2  || $r==4  || $r==7){

          $categories = categories::all();
          $account = account::all();
          $data = summary::where('id',$id)->first();
          $tours = tours::all();

          if($attached = attached::where('summary_id',$id)->exists()){
            $attached = attached::where('summary_id',$id)->first();
            $data->setAttribute('attached',$attached);
          }else{
            $data->setAttribute('attached',null);
          }
      return view('vendor.adminlte.summary.edit',['data'=>$data,'account'=>$account,'categories'=>$categories,'tours'=>$tours]);
    }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
    }

  }

  public function update(Request $request, $id)
  { 

    $hoy=date('Y-m-d H:m:s',strtotime('today'));
    $log = Auth::id();
    

    $summary = summary::find($id);


    $summary->created_at = $request->created_at;
    $summary->concept = $request->concept;
    $summary->type = $request->type;
    $str = str_replace(",", "", $request->amount);
    // $str2 = str_replace(",", ".", $str);
    $summary->amount = $str;
    $iva = str_replace(",", "", $request->tax);
    $summary->tax  = $iva;
    $summary->factura  = $request->factura;
    $summary->account_id  = $request->account_id  ;
    $summary->categories_id  = $request->categories_id  ;
    $summary->id_attr_tours = $request->id_attr_tours;
    $summary->tours_id = $request->tours_id;
    $summary->save();

    $bitacora = new bitacora;
    $bitacora->created_date = $hoy;
    $bitacora->type="update";
    $bitacora->id_activity=$id;
    $bitacora->activity="movimiento";
    $bitacora->id_user=$log;
    $bitacora->save();
    return redirect('summary/summary');
              
  }
  public function destroy( $id)
  { 

      $r=$this->pass('movimientos');
      if($r==1  ){
          $hoy=date('Y-m-d H:m:s',strtotime('today'));
          $log = Auth::id();
          $summary = summary::find($id);
          $summary->delete();

          $bitacora = new bitacora;
          $bitacora->created_date = $hoy;
          $bitacora->type="delete";
          $bitacora->id_activity=$id;
          $bitacora->activity="movimiento";
          $bitacora->id_user=$log;
          $bitacora->save();
          return redirect('summary/summary');

        }else{
          return view('vendor.adminlte.permission',['summary'=>null]);
      }
       
    }
   
    public function destroyt( $id)
  {
      $r=$this->pass('movimientos');
      if($r==1 || $r==5 || $r==6 || $r==7  ){
        $hoy=date('Y-m-d H:m:s',strtotime('today'));
        $log = Auth::id();
       
         $transfer= transfer::where('id',$id)->get();
        foreach ($transfer as $t ) {
            $a=$t->id_add;
            $b=$t->id_out;
        }
        $transfer1 = summary::find($a);
        $transfer1->delete();

        $transfer2 = summary::find($b);
        $transfer2->delete();

        $transfer3 = transfer::find($id);
        $transfer3->delete();
        
        $bitacora = new bitacora;
        $bitacora->created_date = $hoy;
        $bitacora->type="delete";
        $bitacora->id_activity=$id;
        $bitacora->activity="movimiento";
        $bitacora->id_user=$log;
        $bitacora->save();

        return redirect('summary/summary');
        }else{
          return view('vendor.adminlte.permission',['summary'=>null]);
      }
       
    }
   
  

}
