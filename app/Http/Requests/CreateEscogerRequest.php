<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEscogerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        'seccion' => 'required',
        'nombre1'=> 'required',
        'descripcion1'=> 'required',
        'precio1'=> 'required',
        'proveedor1'=> 'required',
        'imagen1'=> 'required',

        'nombre2'=> 'required',
        'descripcion2'=> 'required',
        'precio2'=> 'required',
        'proveedor2'=> 'required',
        'imagen2'=> 'required',

        'nombre3'=> 'required',
        'descripcion3'=> 'required',
        'precio3'=> 'required',
        'proveedor3'=> 'required',
        'imagen3'=> 'required',
         ];
    }
}
