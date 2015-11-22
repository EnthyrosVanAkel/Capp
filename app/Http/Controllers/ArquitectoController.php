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

use App\Http\Requests\CreateArquitectoRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Arquitecto;

class ArquitectoController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

       public function index()
    {
    	$arquitectos = Arquitecto::all();
    	return view('Admin/arquitecto/index',compact('arquitectos'));   	
    }
 
    public function show($id)
    {
    	$arquitecto = Arquitecto::find($id);
    	return view('Admin/arquitecto/show',compact('arquitecto'));
    }


    public function create($id_catalogo)
    {
    	return view('Admin/arquitecto/create',compact('id_catalogo'));
    }

    public function store($id_catalogo,CreateArquitectoRequest $request)
    {
        $arquitecto = new Arquitecto();
        $file = $request->file('imagen');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre, \File::get($file));

        $arquitecto->catalogo_id = $id_catalogo;
        $arquitecto->nombre = $request->input('nombre');
        $arquitecto->descripcion = $request->input('descripcion');
        $arquitecto->url_img = $nombre; 
        $arquitecto->save();
        return redirect('admin/catalogo/'.$id_catalogo);
   }


    public function edit($id_catalogo,$id)
    {
    	$arquitecto = Arquitecto::find($id);
    	return view('Admin/arquitecto/edit',compact('id_catalogo','arquitecto'));
    }

    public function update($id_catalogo,$id, CreateArquitectoRequest $request)
    {
        //Busca al arquitecto 
    	$arquitecto = Arquitecto::find($id);
        $borrar = $arquitecto->url_img;
        //Borra la imagen
        \Storage::disk('local')->exists($borrar);
        //Agrega la nueva imagen
        $file = $request->file('imagen');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre, \File::get($file));
        //modifica los campos
        $arquitecto->catalogo_id = $id_catalogo;
        $arquitecto->nombre = $request->input('nombre');
        $arquitecto->descripcion = $request->input('descripcion');
        $arquitecto->url_img = $nombre; 
        $arquitecto->save();
    	return redirect('admin/catalogo/'.$id_catalogo);
    }

    public function destroy($catalogo_id,$id){
    	$arquitecto = Arquitecto::find($id);
    	$arquitecto->delete();
    	return redirect('admin/catalogo/'.$catalogo_id);
    }


}


