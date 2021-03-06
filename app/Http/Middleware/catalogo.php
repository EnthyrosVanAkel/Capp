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
namespace App\Http\Middleware;

use Closure;


class catalogo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usuario = $request->input('modelo');
        $contrasena = $request->input('acceso');
        $verificar = \DB::table('catalogos')->where('modelo', $usuario)->first();
        $verpas = $verificar->acceso;
        if ($verpas == $contrasena)
        {
            return $next($request);
        }
        else{
            return 'INVALIDO';
        }
    }
}
