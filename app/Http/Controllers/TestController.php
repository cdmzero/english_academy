<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use App\User;       //Modelo de user
use App\Test;       //Modelo de Test
use App\Question;   //Modelo de Question
use App\Choice;     //Modelo de Choice
use App\Result;     //Modelo de Result
// use App\Option;     //Modelo de Result


class TestController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function index_exercises(){

        $tests           = Test::where('test_type','=','Exercise')
                                ->where('status','=','Public')
                                ->get();


        $cuenta         = $tests->count();


        return view('exercise.index',[
            'cuenta'    => $cuenta,
            'tests'      => $tests,
                ]);
    }











//Para ver cada las respuestas de los usuarios  ZONA ADMIN / BACK


    public function index_result($result_id){
        //Recogemos el ID de resultado
            $result     = Result::find($result_id);
        
        //Del anterior resultado tomamos el campo ID_Examen para buscarlo el Objeto
            $test       = Test::find($result->test_id);
        
        //Del resultado anterior tomamos el campo ID de la tabla Exam para buscar las QUESTIONS asociadas
        
            $questions = Question::where('test_id' ,'=',$test->id)->get();
        
        //Aqui filtramos el numero de CHOICES solo por el ID de RESULT al que pertenecen
        
            $choices    = Choice::where('result_id' ,'=',$result_id)->get();
        
        
            //Pasamos los parametros a la vista
            
            return view('admin.results.test',[
                 'questions' => $questions,
                 'choices' => $choices,
                 'result' => $result,
                 'test' => $test,
            ]);
        
        }
        

//Funcion para sacar los examenes en la parte USER / FRONT

    public function index_test(){

        $tests           = Test::where('test_type','=','Exam')
                                ->Orwhere('status','=','Public')
                                ->get();


        $cuenta         = $tests->count();


        // var_dump($tests);
        // die();

        return view('exam.index',[
            'cuenta'    => $cuenta,
            'tests'      => $tests,
                ]);
    }




    public function exam_form($test_id){

        $questions      = Question::where('test_id','=',$test_id)->get();

        $cuenta         = $questions->count();

        $test           = Test::find($test_id);


        $question   = Question::find(1);

        $test       =  Test::find($question->test_id);


        return view('exam.form',[
            'questions' => $questions,
            'cuenta'    => $cuenta,
            'test'      => $test,
                ]);
    }




    public function exercise_form($test_id){

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



    //Funcion para guardar los resultados del TEST

    public function store_result(Request $request){

    //Recogemos el array de las opciones marcadas por el usuario

    $choices = $request->input('user_choice');
    $nota = $n_aciertos = 0;

    
    $test = Test::find($request->input('test_id'));

    //Comprobamos que se han contestado la mitad de las preguntas

    $limite_para_no_contestar =  $test->num_questions / 2;

    $valores_contestados = array_count_values($choices);

  
    foreach( $valores_contestados as $clave => $valor){
        if($clave == 5 && $valor > $limite_para_no_contestar){
            $clave = "Debes contestar al menos la mitad de las preguntas";
            var_dump($clave);
            die();
        }
    }


    // Intanciamos el objeto RESULT para posteriormente entregar su ID en CHOICES

    $result = new Result();

    //Agregamos el Id del usuario identificado
    $result->user_id   = Auth::user()->id;
    $result->test_id   = $request->input('test_id');

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
        
    // Calculo de nota individual y global, y tambien, la proporcion.

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

    // vamos a actualizar el RESULT con el ID heredado previamente

    $result  = Result::find($result->id);

            $result->total_mark       = $nota;
            $result->proportion       = $n_aciertos;

            $result->updated_at = null;

    $result->update();

    if($test->test_type == 'Exam'){

        return view('exam.user_result',[
            'nota'  => $nota,
            'test' =>  $test ,
            'n_aciertos' => $n_aciertos,
             'choices' => $choices,
        ])
        ->with(['message'=>'Test saved correctly']);

    } else{

        return view('exercise.user_result',[
            'nota'  => $nota,
            'test' =>  $test ,
            'n_aciertos' => $n_aciertos,
             'choices' => $choices,
        ])
        ->with(['message'=>'Test saved correctly']);
    
    }
    }

   






}

