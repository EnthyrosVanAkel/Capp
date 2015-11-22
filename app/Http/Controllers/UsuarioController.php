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

use App\Http\Requests\RegistrarUserRequest;
use App\Http\Requests\LoginRequest;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{

    //
    public function login(){
    	// Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return redirect()->intended('admin/cotizaciones');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return \View::make('Admin/login/login');
    }

    public function acceso(LoginRequest $request){
    	 // Guardamos en un arreglo los datos del usuario.
        $userdata = array(
            'email' => $request->input('email'),
            'password'=> $request->input('password')
        );
        if (Auth::attempt($userdata))
        {
            return redirect()->intended('admin/cotizaciones');
        }
        else
        {
        return redirect('admin/login')->withInput()->with('message', 'Login Failed');
        }
    }


    public function registrar(){
        return \View::make('Admin/login/register');
    }


 public function registrado(RegistrarUserRequest $request)
   {
       $usuario = new User();
       $usuario->name = $request->input('name');
       $usuario->email = $request->input('email');
       $usuario->password = bcrypt($request->input('password'));
       $usuario->save();
       return redirect('admin/login');
   }


   public function logout(){
    Auth::logout();
    return redirect('admin/login');
   }



}


