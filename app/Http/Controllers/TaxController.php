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

use App\Http\Requests\CreateTaxRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tax;

class TaxController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
    	$taxes = Tax::all();
        return view('Admin/tax/index',compact('taxes'));
    }
 
    public function show($id)
    {
        $tax= Tax::find($id);
        return view('Admin/tax/show',compact('tax'));
    }


    public function create($id_catalogo){
      return view('Admin/tax/create',compact('id_catalogo'));
    }

    public function store($id_catalogo,CreateTaxRequest $request)
    {
      Tax::create($request->all());
      return redirect('/admin/catalogo/'.$id_catalogo);
    }


    public function edit($id_catalogo,$id){
      $tax = Tax::find($id);
      return view('Admin/tax/edit',compact('id_catalogo','tax'));
    }


    public function update($id_catalogo,$id,CreateTaxRequest $request){
      $tax =Tax::find($id);
      $tax->update($request->all());
      return redirect('/admin/catalogo/'.$id_catalogo);
    }

    public function destroy($catalogo,$id){
      $tax = Tax::find($id);
      $tax->delete();
      return redirect('/admin/catalogo/'.$catalogo);
    }
}
