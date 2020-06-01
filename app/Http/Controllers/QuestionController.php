<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Gate;
use App\User;       //Modelo de user
use App\Test;       //Modelo de Test
use App\Question;   //Modelo de Question
use App\Result;     //Modelo de Result
use App\Option;     //Modelo de Result

class QuestionController extends Controller
{

    public function __construct(){

        $this->middleware('admin');

    }

   public function index($test_id){

    //Comprobamos que el test exista
    
    $test_check = Test::findOrFail($test_id);


    $test = Test::findOrFail($test_id);

    $exam_owner =   $test->user_id;

    $user = Auth::user()->id;


    if (Gate::forUser($user)->allows('owner-exam', $exam_owner) | $test->status == 'Public') {


    // Primero traemos toda pregunta asociada al test para listar y paginar



     $questions     = Question::where('test_id', '=', $test_id)
                                ->orderBy('id', 'ASC')
                                ->get();

    
    // Contamos toda pregunta asociada a este test

    $cuenta        = $questions->count();

    $status         =    Test::withCount(['questions'])->get();
    

    foreach($status as $test){ 
 
        if( !empty($test->questions_count) && $test->questions_count == $test->num_questions ){

           if($test->status == 'Pending'){
                $test->status = 'Complete';
                $test->save();
           }
        }else{
            if($test->status == 'Complete'){
                    $test->status = 'Pending';
                    $test->save();
           }
        }
    }

    $test = Test::find($test_id);

    return view('admin.material.questions.index',[
        'questions' => $questions,
        'cuenta'    => $cuenta,
        'test'      => $test,
            ])
        
    ->with(['message'=>'Question created correctly']);   
            

    }else{
        return redirect()->route('admin.material')
        ->with(['message'=>'Make sure you do not mess around    ;-)']); 
    }

}


    // Funcion para crear una nueva pregunta


   public function create($test_id){

    //Comprobamos que el test exista
    
    $test = Test::findOrFail($test_id);

    $exam_owner =   $test->user_id;

    $user = Auth::user()->id;


    if (Gate::forUser($user)->allows('owner-exam', $exam_owner) && $test->status != 'Complete' && $test->status != 'Public') {


    $questions     = Question::where('test_id', '=', $test_id)
                                ->orderBy('id', 'ASC')
                                ->get();


    $cuenta        = $questions->count();


        return view('admin.material.questions.create',[
            'questions' => $questions,
            'cuenta'    => $cuenta,
            'test'      => $test,
                ]);

    

    }else{

        return redirect()->route('admin.material')
        ->with(['message'=>'Make sure you do not mess around    ;-)']);  
    }

}





    public function store(Request $request){


        $test           = Test::findOrFail($request->input('test_id'));

        $exam_owner     =   $test->user_id;
    
        $user           = Auth::user()->id;



        



        $validate = $this->validate($request,[
            'question_title'     => ['required' , 'string' , 'max:100','unique:questions'],
            'answerd'     => ['required' , 'string' , 'in:1,2,3,4'],
            "option_title.*"  => ['required','string','distinct','max:100'],

        ]);
    
    
        if (Gate::forUser($user)->allows('owner-exam', $exam_owner) && $test->status != 'Complete' && $test->status != 'Public') {
    
        //Primero
            //Recogemos los campos de la pregunta
                
            $question_title = $request->input('question_title');
            $test_id        = $request->input('test_id');
            $answerd        = $request->input('answerd');

        // Creamos un nuevo objeto

        
        $question = new Question();

        $question->question_title   = $question_title;
        $question->test_id          = $test_id;
        $question->answerd          = $answerd;


        $question->save();


        $option_title  = $request->input('option_title');


        $question_id = $question->id;



            $option = new Option();


            for($c = 1 ; $c < 5 ; $c++) {

                $option = new Option();  

                $option->question_id  =  $question_id;

                $option->option_number = $c;

                $option->option_title = $option_title[$c-1];
                    
                $option->save();
        }
     


        $status     =    Test::withCount(['questions'])->get();
    

       

        foreach($status as $test){ 

            if($test->id == $test_id){

                if( $test->questions_count == $test->num_questions){

                    if($test->status == 'Pending'){
                         $test->status = 'Complete';
                         $test->save();
                    }
                 }
                elseif($test->questions_count < $test->num_questions){
                     if($test->status == 'Complete'){
                             $test->status = 'Pending';
                             $test->save();
                    }
                 }

            }
            
        }



    $test = Test::find($test_id);



    if($test->status == "Complete"){

        return redirect()->route('admin.questions',[
            'test_id' =>  $test_id,
            
        ])
        ->with(['message'=>'Test ready to be public']);

        
    }else{
    
        return redirect()->route('admin.question.create',[
                                'test_id' =>  $test_id,
                                
                            ])
                             ->with(['message'=>'Question created correctly']);
        }


    }else{
        return redirect()->route('admin.material')
        ->with(['message'=>'Make sure you do not mess around    ;-)']); 
    }
        }



        public function update($question_id){

            $check_question = Question::findOrFail($question_id);

            $question = Question::find($question_id); //recuperamos la pregunta por su id

            $test = Test::find($question->test_id); //recuperamos los datos del test

            $exam_owner =   $test->user_id;
        
            $user = Auth::user()->id;
        
            if (Gate::forUser($user)->allows('owner-exam', $exam_owner) && $test->status != 'Public') {



      

            $questions     = Question::where('test_id', '=',$question->test_id) // preguntamos a que test pertenece la pregunta recuperada de la BD
                                                ->orderBy('id', 'ASC')
                                                ->get();

            $cuenta         = $questions->count(); //Contamos el numero de preguntas creadas para el test al que pertenecen

            $test = Test::find($question->test_id); //recuperamos los datos del test

            $options = Option::where('question_id', '=', $question->id)->get(); //recuperamos la opciones que pertenecen a la pregunta

         
    
            return view('admin.material.questions.update',[
                'question'  =>  $question,
                'test'      =>  $test,
                'options'   =>  $options,
                'cuenta'    =>  $cuenta
            ]);

        }else{
            return redirect()->route('admin.material')
            ->with(['message'=>'Make sure you do not mess around    ;-)']); 
        }


        }
    
        public function save_update(Request $request){

            $question_id    = $request->input('question_id');

                $question       = Question::findOrFail($question_id); //conseguir todos los campos de la pregunta identificado


            
            // Validamos todos los datos
                 $validate = $this->validate($request,[
                     'question_title'     => ['required' , 'string' , 'max:100','unique:questions,id,'.$question_id],
                     'answerd'     => ['required' , 'string' , 'in:1,2,3,4'],
                     "option_title.*"  => ['required','string','distinct','max:100'],

                 ]);

     
            

            $test           = Test::findOrFail($question->test_id);

            $exam_owner     =   $test->user_id;

            $user           = Auth::user()->id;


            if (Gate::forUser($user)->allows('owner-exam', $exam_owner) && $test->status != 'Public') {

             
            //Recogemos los campos del formulario
            
            $question_title = $request->input('question_title');
            $answerd        = $request->input('answerd');

            //Asignamos los campos
            $question->question_title   = $question_title;
            $question->answerd          = $answerd;
    
            //actualizamos
            $question->update();

            //Recogemos el array de opciones
    
            $opciones = $request->input('option_title');
    
            foreach($opciones as $key => $value){
                $option = Option::find($key);
                $option->option_title  = $value;
                $option->update();
            }

            return redirect()->route('admin.questions',[
                                    'test_id' =>  $question->test_id,
                                    
                                ])
                                 ->with(['message'=>'Question updated correctly']);
    
       
        
        
            }else{
                return redirect()->route('admin.material')
                ->with(['message'=>'Make sure you do not mess around    ;-)']); 
            }

            }



    public function delete($question_id){


        $question       = Question::findOrFail($question_id);


        $test           = Test::find($question->test_id);

        $exam_owner     = $test->user_id;
    
        $user           = Auth::user()->id;
    

        if (Gate::forUser($user)->allows('owner-exam', $exam_owner) && $test->status != 'Public') {


            $test_id = $question->test_id;
        

            $question->delete();


                return redirect()->route('admin.questions',[
                        'test_id' => $test_id
                ])
                ->with(['message'=>'Question deleted correctly']);   

        }else{
            return redirect()->route('admin.material')
            ->with(['message'=>'Make sure you do not mess around    ;-)']); 
        }

            
}




    
}
