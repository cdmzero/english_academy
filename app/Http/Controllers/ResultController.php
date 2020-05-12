<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;  
use Gate;  
use App\Result; //Modelo de Result
use App\Test; //Modelo de Test
use App\User; //Modelo de User

use Illuminate\Support\Facades\Redirect; // para redireccionar a otras rutas


class ResultController extends Controller
{

    public function __construct(){

        $this->middleware('admin');

    }

    public function results_index(){

        $tests      = Test::orderBy('id', 'DESC')->get();

        return view('admin.results.index',[
            'tests'     => $tests
                ]);
        }




    //Recibimos el ID del test y sacamos los resultados

    public function results($id){



        $test       = Test::findOrFail($id);

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

public function detail_results($result_id, $user = null){


    $result   = Result::findOrFail($result_id);

    $test       = Test::find($result->test_id);

    $exam_owner = $test->user_id;
    $user_check = Auth::user()->id;;

    if (Gate::forUser($user_check)->allows('owner-exam', $exam_owner)) {

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
   
    }else{
        
        if(empty($user)){
            return Redirect::route('admin.results.menu', array('id' => $result->test_id))
                ->with(['message'=>'Sorry, you do not have enough permissions for that! :/']);


        }else{
            return Redirect::route('admin.results')
            ->with(['message'=>'Sorry, you do not have enough permissions for that! :/']);

        }
    }

}

    
    public function update_mark(Request $request){

        $result = Result::findOrFail($request->input('id'));
        $test = Test::find($result->test_id);
   
        $exam_owner = $test->user_id;

        $user = Auth::user()->id;
        
        if (Gate::forUser($user)->allows('owner-exam', $exam_owner)) {
       
    // Variable para controlador si la peticion viene de la vista 'resultado' o  de la vista 'usuario'
       
         $user = $request->input('user');
    
        $validate = $this->validate($request,[
            'mark' => ['required','numeric', 'between:0,100.00']
        ]);
    
    // Recogemos los datos del formulario
        $mark         = $request->input('mark');
    
    
    // Conseguir datos
    // Asignar nuevos valores al objeto del usuario

         $result->total_mark  = $mark;

    // Ejecutamos consulta,cambios en la BD y ademas mostramos un mensaje
        $result->update();
    
        if(empty($user)){
            return redirect()->route('admin.results.detail',[
                'result_id' => $request->input('id')
                            ])
                    ->with(['message'=>'Result updated correctly']);
    
        }else{
            return redirect()->route('admin.results.detail',[
                'result_id' => $request->input('id'),
                'user'   => $user,
                            ])
                    ->with(['message'=>'Result updated correctly']);
        }
    
    }else{
        return redirect()->route('admin.results.detail',[
            'result_id' => $request->input('id')
                            ])
                    ->with(['message'=>'You do not have enough permissions for that! :/']);
    }



    }
    


public function delete_result($result_id, $user_id = null){

    $result = Result::find($result_id);

    // Para conseguir la autorizacion recuperamos el ID del creador
    $test = Test::find($result->test_id);
   
    $exam_owner =   $test->user_id;
    $user = Auth::user()->id;

    $test_id = $result->test_id;

    if (Gate::forUser($user)->allows('owner-exam', $exam_owner)) {

        $result->delete();

        //Por si se queda a 0 la vista de user_view
        $cuenta = Result::where('user_id','=',$user_id)->count();


        if(empty($user_id) || $cuenta == 0 ){

            return Redirect::route('admin.results.menu', array('id' => $test_id))
            ->with(['message'=>'Result deleted correctly']);

        }else{
            return Redirect::route('admin.userview', array('id' => $user_id))
                ->with(['message'=>'Result deleted correctly']);
                        
        }

    }else{
        return Redirect::route('admin.results.menu', array('id' => $test_id))
        ->with(['message'=>'Sorry you do not have enough permissions for that :/']);
    }

}




}
