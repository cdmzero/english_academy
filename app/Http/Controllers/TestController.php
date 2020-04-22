<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;       //Modelo de user
use App\Test;       //Modelo de Test
use App\Question;   //Modelo de Question
use App\Choice;     //Modelo de Choice
use App\Result;     //Modelo de Result


class TestController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function index_exercise($test_id){

        $questions      = Question::where('test_id','=',$test_id)->get();

        $cuenta         = $questions->count();

        $test           = Test::find($test_id);


        $question   = Question::find(1);

        $test       =  Test::find($question->test_id);


        return view('exercise.form',[
            'questions' => $questions,
            'cuenta'    => $cuenta,
            'test'      => $test,
                ]);
    }


    public function store_result(Request $request){

    //Recogemos el array de las opciones marcadas por el usuario

    $choices = $request->input('user_choice');
    $nota = $n_aciertos = 0;

    $test = Test::find($request->input('test_id'));

    $limite_para_no_contestar =  $test->num_questions / 2;

    $valores_contestados = array_count_values($choices);
  
    foreach( $valores_contestados as $clave => $valor){
        if($clave == 5 && $valor > $limite_para_no_contestar){
            $clave = "Debes contestar al menos la mitad de las preguntas";
            var_dump($clave);
            die();
        }
    }

// var_dump($valores_contestados);
// die();

    // Intanciamos el objeto RESULT para posteriormente agregarle su valor ID en CHOICES

    $result = new Result();

    //Agregamos el Id del usuario identificado
    $result->user_id   = Auth::user()->id;

    $result->save();



    //Recoremos el array como clave valor
    foreach($choices as $key => $value ){

    // Llamamos a los objetos implicados para obtener sus valores buscando por su clave

    /// La key se corresponde al ID de Option
    // El value se corresponde a la opcion elegida por el usuario

    $question = Question::find($key);

    $test = Test::find($question->test_id);

    // Instanciamos Choices en segundo lugar para que herede el ID de RESULT
    $choice = new Choice();


        $choice->result_id      = $result->id;
        $choice->question_id    = $key;

        if($value == 5){
        $choice->user_choice    =  0;
        }else{
        $choice->user_choice    = $value;
        }
        

    // Calculo de nota individual y global,tambien ,de proporcion.

    if($value == $question->answerd){

        $choice->mark       = $test->mark_right;
      
        $nota               += $choice->mark ;
        $n_aciertos++;
    }
    
    if($value != $question->answerd && $value != 5 ){
        $choice->mark        = $test->mark_wrong;
        $nota                += $choice->mark ;
    }else{
        $choice->mark = 0;
    }
        $choice->updated_at     = null;

     $choice->save();
    }

    if($nota < 0){
        $nota = '0';


    }else{

        $nota = $nota / $test->num_questions * 100;   
    }

    $n_aciertos = $n_aciertos . "/$test->num_questions";

    // vamos a actualizar el ultimo registro con la nota en RESULTS
    $result         =    Result::find($result->id);

            $result->total_mark       = $nota;
            $result->proportion       = $n_aciertos;

            $result->updated_at = null;


    $result->update();


    return view('exercise.user_result',[
        'nota'  => $nota,
        'test' =>  $test ,
        'n_aciertos' => $n_aciertos,
         'choices' => $choices,
    ])
    ->with(['message'=>'Choices saved correctly']);

}


}

