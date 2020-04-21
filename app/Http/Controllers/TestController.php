<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User; //Modelo de user
use App\Test;
use App\Question; //Modelo de Test
use App\Choice; //Modelo de Test
use App\Result; //Modelo de Test


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


    //Recoremos el array como clave valor

    $nota = $n_aciertos = 0;
    foreach($choices as $key => $value ){

    // Llamamos a los objetos implicados para obtener sus valores buscando por su clave

    /// La key se corresponde al ID de Option
    // El value se corresponde a la opcion elegida por el usuario

    $question = Question::find($key);

    $test = Test::find($question->test_id);

    $choice = new Choice();

    $choice->question_id = $key;
    $choice->user_choice = $value;
    $choice->user_id     = Auth::user()->id;
    $choice->test_id     = $test->id;


    if($value == $question->answerd){
        $choice->mark  = $test->mark_right;
        $nota += $choice->mark ;
        $n_aciertos++;
    }else{
        $choice->mark  = $test->mark_wrong;
        $nota += $choice->mark ;
    }
     $choice->save();
    }


    if($nota < 0){
        $nota = '0';


    }else{

        $nota = $nota / $test->num_questions * 100;

        $n_aciertos = $n_aciertos . "/$test->num_questions";
    }

    // vamos a guardar la nota en results

    $result = new Result;

    $current_date = date('Y-m-d H:i:s');

            $result->test_id    = $test->id;
            $result->user_id    = $test->user->id;
            $result->total_mark       = $nota;
            $result->created_at = $current_date;
            $result->updated_at = null;

    $result->save();


    return view('exercise.user_result',[
        'nota'  => $nota,
        'test' =>  $test ,
        'n_aciertos' => $n_aciertos,
         'choices' => $choices,
    ])
    ->with(['message'=>'Choices saved correctly']);

}


}

