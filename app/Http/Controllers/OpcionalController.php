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

use App\Http\Requests\CreateOpcionalRequest;
use App\Http\Requests\UpdateOpcionalRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Opcional;
use App\OpcionalOptions;

class OpcionalController extends Controller
{

    
    public function __construct()
{
    $this->middleware('auth');
}

    //
        public function index()
    {
        //return Opcional::with('opcionaloptions')->get();
        return Opcional::all();
    }
 
    public function show($catalogo,$id)
    {
        //return Opcional::with('opcionaloptions')->findOrFail($id);
        $opcional = Opcional::find($id);
        return view('Admin/Opcional/show',compact('catalogo','opcional'));
    }

    public function create($id_catalogo){
        return view('Admin/Opcional/create',compact('id_catalogo'));
    }

    public function store($id_catalogo,CreateOpcionalRequest $request){
        $opcional = new Opcional();
        $opcionaloptions1 = new OpcionalOptions();
        $opcionaloptions2 = new OpcionalOptions();
        $opcionaloptions3 = new OpcionalOptions();

        $file1 = $request->file('imagen1');
        $nombre1 = $file1->getClientOriginalName();
        \Storage::disk('local')->put($nombre1, \File::get($file1));
        $file2 = $request->file('imagen2');
        $nombre2 = $file2->getClientOriginalName();
        \Storage::disk('local')->put($nombre2, \File::get($file2));
        $file3 = $request->file('imagen3');
        $nombre3 = $file3->getClientOriginalName();
        \Storage::disk('local')->put($nombre3, \File::get($file3));

        $opcional->catalogo_id = $id_catalogo;
        $opcional->seccion = $request->input('seccion');
        $opcional->save();   

        $opcionaloptions1->opcional_id = $opcional->id;
        $opcionaloptions1->nombre = $request->input('nombre1');
        $opcionaloptions1->descripcion = $request->input('descripcion1');
        $opcionaloptions1->precio = $request->input('precio1');
        $opcionaloptions1->url_img = $nombre1; 
        $opcionaloptions1->proveedor = $request->input('proveedor1');
        $opcionaloptions1->save();

        $opcionaloptions2->opcional_id = $opcional->id;
        $opcionaloptions2->nombre = $request->input('nombre2');
        $opcionaloptions2->descripcion = $request->input('descripcion2');
        $opcionaloptions2->precio = $request->input('precio2');
        $opcionaloptions2->url_img = $nombre2; 
        $opcionaloptions2->proveedor = $request->input('proveedor2');
        $opcionaloptions2->save();

        $opcionaloptions3->opcional_id = $opcional->id;
        $opcionaloptions3->nombre = $request->input('nombre3');
        $opcionaloptions3->descripcion = $request->input('descripcion3');
        $opcionaloptions3->precio = $request->input('precio3');
        $opcionaloptions3->url_img = $nombre3; 
        $opcionaloptions3->proveedor = $request->input('proveedor3');
        $opcionaloptions3->save();
        return redirect('admin/catalogo/'.$id_catalogo);
    }  

    public function edit($id_catalogo,$id){
        $opcional = Opcional::find($id);
        return view('Admin/Opcional/edit',compact('id_catalogo','opcional'));
    }

    public function update($id_catalogo,$id,UpdateOpcionalRequest $request){
      $opcional = Opcional::find($id);
      $opcional->update($request->all());
      return redirect('/admin/catalogo/'.$id_catalogo);
    }

     public function destroy($catalogo_id,$id){
        $opcional = Opcional::find($id);
        foreach ($opcional->opcionaloptions as $opcion) {
            $opcion->delete();
        }
        $opcional->delete();
        return redirect('admin/catalogo/'.$catalogo_id);
    }

}
