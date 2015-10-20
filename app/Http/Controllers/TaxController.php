<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaxRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tax;

class TaxController extends Controller
{
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


    public function create(){
      return view('Admin/tax/create');
    }

    public function store(CreateTaxRequest $request)
    {
      Tax::create($request->all());
      return redirect('admin/tax');
    }


    public function edit($id){
      $tax = Tax::find($id);
      return view('Admin/tax/edit',compact('tax'));
    }


    public function update($id,CreateTaxRequest $request){
      $tax =Tax::find($id);
      $tax->update($request->all());
      return redirect('admin/tax');
    }

    public function destroy($id){
      $tax = Tax::find($id);
      $tax->delete();
      return redirect('admin/tax');
    }
}
