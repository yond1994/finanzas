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
use Auth;
use Datetime;

class pdfController extends Controller
{


    public function invoice()
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('vendor.adminlte.pdf.invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function getData()
    {

    	$hoy = new DateTime('now');

        $data = summary::where('created_at','<=',$hoy)->get();
        // $summary = summary::all();
        $categories = categories::all();
        $account = account::all();
        $divisa = settings::where('name','divisa')->first();

        return $data;
    }
     public function index(Request $request)
   {

    $r=(new summaryController)->pass($act='pdf');
      if($r=8 || $r=1 || $r=2 || $r=3 || $r=4 || $r=5 || $r=6 || $r=7   ){
        //$hoy=date('Y-m-d',strtotime('today - 1 days'));
        $hoy = new DateTime('now');

        $summary = summary::where('created_at','<=',$hoy)->where('future','=',1)->get();
        // $summary = summary::all();
        $categories = categories::all();
        $atributos = attributes::all();
        $atributostours = attributestours::all();
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
          $summary = summary::where($filter)->where('created_at','<=',$hoy)->where('future','=',1)->get();


          }else{
          $filter[] = array('type','=',$tipo);
          $summary = summary::where($filter)->where('created_at','<=',$hoy)->where('future','=',1)->get();
          }
        }
        if(isset($cuentas)) {

          $filter[] = array('account_id','=',$cuentas);
          $summary = summary::where($filter)->where('created_at','<=',$hoy)->where('future','=',1)->get();

        }
        if(isset($categorias)) {
          $filter[] = array('categories_id','=',$categorias);
          $summary = summary::where($filter)->where('created_at','<=',$hoy)->where('future','=',1)->get();

        }
        if(isset($subcategorias)) {
          $filter[] = array('id_attr','=',$subcategorias);
          $summary = summary::where($filter)->where('created_at','<=',$hoy)->where('future','=',1)->get();
        }

        if(isset($tf)) {
          $filter[] = array('tours_id','=',$tf);
          $summary = summary::where($filter)->where('created_at','<=',$hoy)->where('future','=',1)->get();

        }
        if(isset($subcatetours)) {
          $filter[] = array('id_attr_tours','=',$subcatetours);
          $summary = summary::where($filter)->where('created_at','<=',$hoy)->where('future','=',1)->get();

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
                $summary = summary::where('created_at','<=',$hoy)->where($filter)->where('future','=',1)->get();
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
        $hoy2=date('Y-m-d H:m:s',strtotime('today'));

           $view =  \View::make('vendor.adminlte.pdf.invoice', compact('divisa', 'summary', 'account', 'categories','totalfinal','totalfinaliva','totalfinalivae','hoy2','atributos','atributostours','tours'))->render();



        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($view);

        return $pdf->stream('invoice');

      }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }
   }

     public function indexfuturo(Request $request)
   {

      $r=(new summaryController)->pass($act='pdf');
      if($r>0){
        $hoy = new DateTime('now');

        $summary = summary::where('created_at','>',$hoy)->get();
        // $summary = summary::all();
        $categories = categories::all();
        $atributos = attributes::all();
        $atributostours = attributestours::all();
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
          $summary = summary::where($filter)->where('created_at','>',$hoy)->get();


          }else{
          $filter[] = array('type','=',$tipo);
          $summary = summary::where($filter)->where('created_at','>',$hoy)->get();
          }
        }
        if(isset($cuentas)) {

          $filter[] = array('account_id','=',$cuentas);
          $summary = summary::where($filter)->where('created_at','>',$hoy)->get();

        }
        if(isset($categorias)) {
          $filter[] = array('categories_id','=',$categorias);
          $summary = summary::where($filter)->where('created_at','>',$hoy)->get();

        }
        if(isset($subcategorias)) {
          $filter[] = array('id_attr','=',$subcategorias);
          $summary = summary::where($filter)->where('created_at','>',$hoy)->get();
        }

        if(isset($tf)) {
          $filter[] = array('tours_id','=',$tf);
          $summary = summary::where($filter)->where('created_at','>',$hoy)->get();

        }
        if(isset($subcatetours)) {
          $filter[] = array('id_attr_tours','=',$subcatetours);
          $summary = summary::where($filter)->where('created_at','>',$hoy)->get();

        }


        if((isset($start)) and (isset($finish))){

          $start = new Datetime($start);
          $finish = new Datetime($finish);


          $summary = summary::whereBetween('created_at', [$start, $finish])->where($filter)->get();
        }elseif((isset($dias))){

            if($dias==30){
              $start=date('Y-m-d',strtotime('today + 30 days'));
            }
            if($dias==15){
              $start=date('Y-m-d',strtotime('today + 15 days'));
            }
            if($dias==7){
              $start=date('Y-m-d',strtotime('today + 7 days'));
            }
            if($dias==1){
              $start=date('Y-m-d',strtotime('today + 1 days'));
            }

          $summary = summary::whereBetween('created_at', [$hoy, $start])->where($filter)->get();
        }else{

          $summary = summary::where('created_at','>',$hoy)->where($filter)->get();

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
        $hoy2=date('Y-m-d H:m:s',strtotime('today'));

           $view =  \View::make('vendor.adminlte.pdf.invoice', compact('divisa', 'summary', 'account', 'categories','totalfinal','totalfinaliva','totalfinalivae','hoy2','atributos','atributostours','tours'))->render();


        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
        }else{
        return view('vendor.adminlte.permission',['summary'=>null]);
      }
   }


}
