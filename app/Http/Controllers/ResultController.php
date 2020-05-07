<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Result; //Modelo de Result
use App\Test; //Modelo de Test
use App\User; //Modelo de User

use Illuminate\Support\Facades\Redirect; // para redireccionar a otras rutas


class ResultController extends Controller
{


    public function results_index(){

        $tests      = Test::orderBy('id', 'DESC')->get();

        return view('admin.results.index',[
            'tests'     => $tests
                ]);
        }




    //Recibimos el ID del test y sacamos los resultados

    public function results($id){



        $test      = Test::where('id','=',$id)->first();

        $results    = Result::where('test_id','=',$id)
                            ->orderBy('id', 'DESC')
                            ->paginate(5);

        $cuenta     = Result::where('test_id','=',$id)
                            ->count();
                            
     
        return view('admin.results.menu',[
            'test'     => $test,
            'results'   => $results,
            'cuenta'    => $cuenta
                    ]);

      
}

// Cargar la vista para editar un resultado

public function detail_results($test_id, $user = null){

    $result   = Result::find($test_id);

    if($user){
        return view('admin.results.detail',[
            'result'   => $result,
            'user'   => $user,
                    ]);    
    }else{
        return view('admin.results.detail',[
            'result'   => $result,
                    ]);    
    }
   
}


    
    public function update_mark(Request $request){
       
        //variable para controlador si la peticion viene de la vista 'resultado' o  de la vista 'usuario'
       
         $user = $request->input('user');
    
        $validate = $this->validate($request,[
            'mark' => ['required','numeric', 'between:0,100.00']
        ]);
    
        // Recogemos los datos del formulario
        $mark         = $request->input('mark');
        $id           = $request->input('id');
    
    
        // Conseguir datos
         // Asignar nuevos valores al objeto del usuario
         $result        = Result::find($id);
         $result->total_mark  = $mark;
    
       
    
    
        //Ejecutamos consulta,cambios en la BD y ademas mostramos un mensaje
        $result->update();
    
        if(empty($user)){
            return redirect()->route('admin.results.detail',[
                'result_id' => $id
                        ])
            ->with(['message'=>'Result updated correctly']);
    
        }else{
            return redirect()->route('admin.results.detail',[
                'result_id' => $id,
                'user'   => $user,
                        ])
            ->with(['message'=>'Result updated correctly']);
        }
    
    }
    


    // Funcion para borrar un resultado

public function delete_result($result_id, $user_id = null){

    $result = Result::find($result_id);

    $test_id = $result->test_id;

    $result->delete();

    //Por si se queda a 0 en resultados el usuario
    $cuenta = Result::where('user_id','=',$user_id)->count();


    if(empty($user_id) || $cuenta == 0 ){

        return Redirect::route('admin.results.menu', array('id' => $test_id))
        ->with(['message'=>'Result deleted correctly']);

    }else{
          return Redirect::route('admin.userview', array('id' => $user_id))
            ->with(['message'=>'Result deleted correctly']);
                    
    }


}

}
