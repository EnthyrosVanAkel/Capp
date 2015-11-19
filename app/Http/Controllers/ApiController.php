<?php
/*
************************************************************************
************************************************************************
**                   *********** **** ************                    **
****                 **********        **********                    ***
*****                 ********          ********                    ****
******               Project: Cotizador Vidalta                   ******
*******                  Date: Oct-Nov 2015                      *******
******* ======================================================== *******
******         BackEnd developer: EnthyrosVanAkel in github       ******
*****            FrontEnd developer: miguueelo in github           *****
*******************  ============================== ********************
************************** For: QubitWorks  ****************************
******************************          ********************************
********************************       *********************************
*********************************     **********************************
**********************************   ***********************************
*********************************** ************************************
************************************************************************
*/
namespace App\Http\Controllers;

use App\Http\Requests\modeloRequest;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Catalogo;
use App\Cotizacion;


class ApiController extends Controller
{
    //
/*  
    public function acceso($id){
    	return Catalogo::with('predeterminado','escoger','escoger.escogeroptions','opcional','opcional.opcionaloptions','arquitecto','tax')->findOrFail($id);
  
    }
    	$modelo = $request->input('modelo');
    	$acceso = $request->input('acceso');
    	$user = DB::table('catalogos')->where('acceso', $acceso)->first();
    	$id = $user->id;
        return $id;
    }
*/
    public function acessos(modeloRequest $request){
        $usuario = $request->modelo;
        $modelo = \DB::table('catalogos')->where('modelo',$usuario)->first();
        $id = $modelo->id;

        //$id = $request->input('modelo');
        return Catalogo::with('predeterminado','escoger','escoger.escogeroptions','opcional','opcional.opcionaloptions','arquitecto','tax')->findOrFail($id);
        //return 'Valido';
        //return Response::json($id);
    }


    public function lista(){
    	$catalogo=Catalogo::all()->lists('modelo');
    	foreach ($catalogo as $depto){
    		$lista[] = array("depto" => $depto);
    	}
	$listaJSON = Response::json($lista);		
	return $listaJSON;
    }

    public function get_data(Request $request){
        $cotizacion = new Cotizacion();
        $modelo = $request->input('modelo');
        $numero = $request->input('numero');
        $correo = $request->input('correo');
        $defaults = $request->get('default');
        $escogers = $request->get('escoger');
        $opcionales = $request->get('opcionales');
        $arquitectos = $request->get('arquitecto');
        $taxes = $request->get('tax');

        $cotizacion->modelo = $modelo;
        $cotizacion->departamento = $numero;
        $cotizacion->email = $correo;
        $cotizacion->save();

        $fecha = $cotizacion->created_at;


        $view =  \View::make('Admin/cotizacion/pdf', compact('modelo','numero','correo','fecha','defaults','escoger','opcionales','arquitectos','taxes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $nombre= $cotizacion->id;
        $nombre= $nombre . '.pdf';
        $pdf->save(public_path().'/pdf/'.$nombre);

        
        $cotizacion->url_cotizacion = $nombre;
        $cotizacion->save();

        $url = "http://localhost:8000/pdf/".$nombre;

        return $url;
        
    }

public function get_datax(Request $request){
        $cotizacion = new Cotizacion();
        $modelo = $request->input('modelo');
        $numero = $request->input('numero');
        $correo = $request->input('correo');

        $datos = $request->get('default.0');
        //$default = $datos->default;
       // $listaJSON = Response::json($datos);        
        //return $listaJSON;
        
        //$input = $request->input('default.0');
        for ($i=0; $i < 3; $i++) { 
            $defaults = array();
            array_push($defaults,$request->input('default.'.$i))

        }
        //$defaults[] = array($input);
            # code...
        
        //foreach ($request->get('default') as $valor) {
         //   $defaults[] = array($valor);
        //}
        //$defaults = array($request->get('default'));
        //$valor = count($request->get('defaults'));
        //print_r($request->input('default'));
        $defaults = ($request->input('default'));
        $escogers = $request->get('escoger');
        $opcionales = $request->get('opcionales');
        $arquitectos = $request->get('arquitecto');
        $taxes = $request->get('tax');

        $cotizacion->modelo = $modelo;
        $cotizacion->departamento = $numero;
        $cotizacion->email = $correo;
        $cotizacion->save();

        $fecha = $cotizacion->created_at;


        $view =  \View::make('Admin/cotizacion/pdf', compact('modelo','numero','correo','fecha'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $nombre= $cotizacion->id;
        $nombre= $nombre . '.pdf';
        $pdf->save(public_path().'/pdf/'.$nombre);

        
        $cotizacion->url_cotizacion = $nombre;
        $cotizacion->save();

        $url = "http://localhost:8000/pdf/".$nombre;

        return $defaults;
        
    }
}
