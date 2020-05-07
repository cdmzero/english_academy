<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;       //Modelo de user
use App\Test;       //Modelo de Test
use App\Question;   //Modelo de Question
use App\Choice;     //Modelo de Choice
use App\Result;     //Modelo de Result
use App\Option;     //Modelo de Result

class QuestionController extends Controller
{


   public function index($test_id){


    // Primero traemos toda pregunta asociada al test para listar y paginar

     $questions     = Question::where('test_id', '=', $test_id)
                                ->orderBy('id', 'ASC')
                                ->get();

    
    // Contamos toda pregunta asociada a este test

    $cuenta         = $questions->count();

    $status =    Test::withCount(['questions'])->get();
    

    foreach($status as $test){ 
        if( !empty($test->questions_count) && $test->questions_count == $test->num_questions){

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

    // Traemos todos los datos del test 

    $test           = Test::find($test_id);
   


    return view('admin.material.questions.index',[
        'questions' => $questions,
        'cuenta'    => $cuenta,
        'test'      => $test,
            ])
        
    ->with(['message'=>'Question created correctly']);   
            ;
    }


    // Funcion para crear una nueva pregunta


   public function create($test_id){


    $questions     = Question::where('test_id', '=', $test_id)
                                ->orderBy('id', 'ASC')
                                ->get();


    $cuenta        = $questions->count();

    $test          = Test::find($test_id);

    


        return view('admin.material.questions.create',[
            'questions' => $questions,
            'cuenta'    => $cuenta,
            'test'      => $test,
                ]);

    }







    public function store(Request $request){

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
        ->with(['message'=>'Test Ready to public']);

        
    }else{
    
        return redirect()->route('admin.question.create',[
                                'test_id' =>  $test_id,
                                
                            ])
                             ->with(['message'=>'Question created correctly']);
        }

        }



        public function update($question_id){

            $question = Question::find($question_id);


            $test = Test::find($question->test_id);

            $options = Option::where('question_id', '=', $question->id)->get();
    
            return view('admin.material.questions.update',[
                'question'  => $question,
                'test'      =>$test,
                'options'   =>  $options
            ]);

        }
    
    
        public function save_update(Request $request){
           

            $question_id = $request->input('question_id');
            
            $question = Question::find($question_id); //conseguir todos los campos de la pregunta identificado
             

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
    
            // Validamos todos los datos
                // $validate = $this->validate($request,[
                //     'test_name'     => ['required' , 'string' , 'max:20','unique:tests' ],
                //     'test_type'     => ['required' , 'string' , 'in:Exam,Exercise,Grammar'],
                //     'num_questions' => ['required' , 'numeric' , 'min:1' , 'max:20'],
                //     'duration'      => ['required' , 'numeric' , 'min:1' , 'max:60'],
                // ]);
        
        
            }



    public function delete($question_id){

        $question = Question::find($question_id);


        // var_dump($question);
        // die();

        $test_id = $question->test_id;
     

        $question->delete();



    

            return redirect()->route('admin.questions',[
                    'test_id' => $test_id
            ])
            ->with(['message'=>'Question deleted correctly']);   

            
}




    
}
