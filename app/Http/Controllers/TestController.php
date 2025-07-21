<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Response; //Para devolver la imagen desde la BD
use Auth;
use App\User;       //Modelo de user
use App\Test;       //Modelo de Test
use App\Question;   //Modelo de Question
use App\Result;     //Modelo de Result
use App\Option;     //Modelo de Option
use App\Line;       //Modelo de Line


class TestController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index_exercises', 'index_test']);
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



//Para ver cada una de las respuestas de los usuarios  ZONA ADMIN / BACK


    public function index_result($result_id){


        //Recogemos el ID de resultado
            $result     = Result::findOrFail($result_id);

            if(Auth::user()->id != $result->user_id ){
                
                if(Auth::user()->role != 'admin'){
                    Result::findOrFail('Fail');
                }
                
            }
        
        //Del anterior resultado tomamos el campo ID_Examen para buscar el Objeto
            $test       = Test::find($result->test_id);

            $lines       = Line::where('result_id','=',$result_id)->get();

           
// 1.Cogemos todas las lineas
    // 2. A cada linea le corresponde 4 opciones
            // 3. Esas 4 opciones se meten en un array y ademas se clasifican por un indice del 1 al 4

foreach($lines as $line){

     $opts[$line->id][1] = $line->Option1          ; 
     $opts[$line->id][2] = $line->Option2          ; 
     $opts[$line->id][3] = $line->Option3          ; 
     $opts[$line->id][4] = $line->Option4          ; 
   
}


// 4.Ahora recorremos los indices y los guardamos como claves
    //5. Estas claves nos ayudaran para asociar la opcion elegida por el usuario entre las 4 opciones y tambien si esta correcta la opcion o no.


foreach($opts as $key => $value){

  $option_numbers =  array_keys($value);

}

            return view('admin.results.test',[
                'option_numbers'=>$option_numbers,
                'opts'          =>$opts,
                'lines'         => $lines,
                'result'        => $result,
                'test'          => $test,
            ]);
        
        }
        

//Funcion para sacar los examenes en la parte USER / FRONT

    public function index_test(){

        $tests           = Test::where('test_type','=','Exam')
                                ->where('status','=','Public')
                                ->get();

                                

        $cuenta         = $tests->count();




        return view('exam.index',[
            'cuenta'    => $cuenta,
            'tests'      => $tests,
                ]);
    }




    public function exam_form($test_id){

        $test           = Test::findOrFail($test_id);

        if($test->test_type != 'Exam' || $test->status != 'Public'){
            Test::findOrFail('fail');
        }

        $questions      = Question::where('test_id','=',$test_id)->inRandomOrder()->get();

        foreach($questions as $question){
            $options[$question->id]  = Option::where('question_id','=',$question->id)->inRandomOrder()->get(); 
        }


        $cuenta         = $questions->count();

       


        return view('exam.form',[
            'questions' => $questions,
            'cuenta'    => $cuenta,
            'test'      => $test,
            'options'   => $options,
                ]);
    }




    public function exercise_form($test_id){

        $test           = Test::findOrFail($test_id);

     
        if($test->test_type == 'Exam' || $test->status != 'Public'){
            Test::findOrFail('fail');
        }

        $questions      = Question::where('test_id','=',$test_id)->get();

        $cuenta         = $questions->count();




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

    
    $error = false;

    foreach($choices as $clave => $valor)
    {
        $question = Question::findOrFail($clave);

        if($question->test_id != $request->input('test_id'))
        {
            $error = true;
        }

        if($valor > 5 || $valor < 1 || $error )
        {
            Question::findOrFail('404Error');
        }
    }



    $test = Test::findOrFail($request->input('test_id'));


    $limite_para_no_contestar =  $test->num_questions / 2; //Limite para comprobar que se han contestado la mitad de las preguntas

    $lim = round($limite_para_no_contestar);

    $valores_contestados = array_count_values($choices);    //Contamos las opciones elegidas del 1 al 5



    foreach( $valores_contestados as $clave => $valor){

        //Si la opcion 5 (no se, no contesto) ha sido elegida mas del 50% en todo el test volvemos atras 

            if($clave == 5 && $valor > $limite_para_no_contestar){

                return back()->with(['error'=>"You must answer at least $lim questions"]);
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

    $question   = Question::find($key);

    $line       = new Line(); //Creamos una nueva instacia de linea

    $options    = Option::where('question_id','=',$key)->get();


    foreach($options as $option){

        $opt[$key][] = $option->option_title;  //Le creo un array de arrays

    }

  
    $line->question_title   = $question->question_title;
    $line->Option1          = $opt[$key][0]; 
    $line->Option2          = $opt[$key][1]; 
    $line->Option3          = $opt[$key][2]; 
    $line->Option4          = $opt[$key][3]; 
    $line->answerd          = $question->answerd;
   

    $test = Test::find($question->test_id);


        $line->result_id        = $result->id;


        if($value == 5){
                 $line->user_choice      =  0;
        }else{
         
                 $line->user_choice      = $value;
        }
        
    // Calculo de nota individual y global, y tambien, la proporcion.

    if($value == $question->answerd){

        $nota      += $test->mark_right;
      
        
        $n_aciertos++;
    }
    
    if($value != $question->answerd && $value != 5 ){
        
        $nota       += $test->mark_wrong; 

    }else{
        $nota += 0;
    }


        $line->updated_at = null;
        $line->save();




    }

    if($nota < 0){
        $nota = '0';


    }else{

        $nota = $nota / $test->num_questions * 100;
        
        $nota = round($nota, 2);
    }

    $n_aciertos = $n_aciertos . "/$test->num_questions";

    // vamos a actualizar el RESULT con el ID heredado previamente

    $result  = Result::find($result->id);



            $result->total_mark       = $nota;
            $result->proportion       = $n_aciertos;

    $result->updated_at = null;
    $result->update();




    if($test->test_type == 'Exam'){
        if($nota <= 65){
       //Si la nota es menor del 65% traeremos todos los ejercicios disponibles para el nivel del examen que estemos realizando

        $exercises = Test::where('test_type','=','Exercise')
                           ->where('status','=','Public')
                           ->paginate(3);

            return view('exam.user_result',[
            'exercises' => $exercises,
            'result_id' => $result->id,
            'nota'  => $nota,
            'test' =>  $test ,
            'n_aciertos' => $n_aciertos,
            'choices' => $choices,

          
            ])
            ->with(['message'=>'Exam submitted correctly']);

       }else{

       return view('exam.user_result',[
       'result_id' => $result->id,
       'nota'  => $nota,
       'test' =>  $test ,
       'n_aciertos' => $n_aciertos,
        'choices' => $choices,
   ])
   ->with(['message'=>'Exam submitted correctly']);



    }


}else{

    return  redirect()->action('TestController@index_result', [
        'result_id' => $result->id,
    ]);

    }

}

public function export_pdf(Request $request)
{
    // Validar entrada para mayor seguridad
    $validated = $request->validate([
        'result_id' => 'required|integer|exists:results,id',
    ]);

    // Buscar el resultado
    $result = Result::findOrFail($validated['result_id']);

    // Cargar la vista y generar el PDF
    $pdf = Pdf::loadView('exam.diploma', ['result' => $result]);

    // Descargar el PDF con nombre personalizado
    return $pdf->setPaper('a4', 'landscape')->download('diploma_' . $result->id . '.pdf');
}


}

