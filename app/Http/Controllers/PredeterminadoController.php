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

use App\Http\Requests\CreatePredeterminadoRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Predeterminado;

class PredeterminadoController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    //
    public function index()
	{
		$predeterminados = Predeterminado::all();
		return view('Admin/predeterminado/index',compact('predeterminados'));
	}
 
	public function show($id)
	{
		$predeterminado = Predeterminado::find($id);
		return view('Admin/predeterminado/show',compact('predeterminado'));
	}

	public function create($id_catalogo){
		return view('Admin/predeterminado/create',compact('id_catalogo'));
	}

	public function store($id_catalogo,CreatePredeterminadoRequest $request){
		$predeterminado = new Predeterminado();
        $file = $request->file('imagen');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre, \File::get($file));

        $predeterminado->catalogo_id = $id_catalogo;
        $predeterminado->nombre = $request->input('nombre');
        $predeterminado->descripcion = $request->input('descripcion');
        $predeterminado->precio = $request->input('precio');
        $predeterminado->url_img = $nombre; 
        $predeterminado->proveedor = $request->input('proveedor');
        $predeterminado->save();
        return redirect('admin/catalogo/'.$id_catalogo);
	}

	public function edit($id_catalogo,$id){
		$predeterminado = Predeterminado::find($id);
		return view('Admin/predeterminado/edit',compact('id_catalogo','predeterminado'));
	}

	public function update($id_catalogo,$id, CreatePredeterminadoRequest $request)
    {
        //Busca al arquitecto 
    	$predeterminado = Predeterminado::find($id);
        $borrar = $predeterminado->url_img;
        //Borra la imagen
        \Storage::disk('local')->exists($borrar);
        //Agrega la nueva imagen
        $file = $request->file('imagen');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre, \File::get($file));
        //modifica los campos
       	$predeterminado->catalogo_id = $id_catalogo;
        $predeterminado->nombre = $request->input('nombre');
        $predeterminado->descripcion = $request->input('descripcion');
        $predeterminado->precio = $request->input('precio');
        $predeterminado->url_img = $nombre; 
        $predeterminado->proveedor = $request->input('proveedor');
        $predeterminado->save();
    	return redirect('admin/catalogo/'.$id_catalogo);
    }

	public function destroy($catalogo_id,$id){
		$predeterminado = Predeterminado::find($id);
		$predeterminado->delete();
		return redirect('admin/catalogo/'.$catalogo_id);
	}
}
