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

use App\Http\Requests\UpdateOptionRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EscogerOptions;

class EscogerOptionsController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    //
	public function edit($id_catalogo,$id_escoger,$option)
	{
		$opcion = EscogerOptions::find($option);
        return view('Admin/Escoger/opcion/edit',compact('id_catalogo','id_escoger','opcion'));
	}  

	public function update($id_catalogo,$id_escoger,$option,UpdateOptionRequest $request){
        $opcion = EscogerOptions::find($option);
        $borrar = $opcion->url_img;
        //Borra la imagen
        \Storage::disk('local')->exists($borrar);
        //Agrega la nueva imagen
        $file = $request->file('imagen');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre, \File::get($file));
        //modifica los campos
        $opcion->escoger_id = $id_escoger;
        $opcion->nombre = $request->input('nombre');
        $opcion->descripcion = $request->input('descripcion');
        $opcion->precio = $request->input('precio');
        $opcion->proveedor = $request->input('proveedor');
        $opcion->url_img = $nombre; 
        $opcion->save();

        return redirect('admin/catalogo/'.$id_catalogo.'/e/'.$id_escoger);
    }  
}
