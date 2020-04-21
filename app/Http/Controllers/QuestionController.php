<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Result; //Modelo de Result
use App\Test; //Modelo de Test
use App\Question; //Modelo de Test
use App\Option; //Modelo de Test


class QuestionController extends Controller
{


   public function index($test_id){


    // Primero traemos toda pregunta asociada al test para listar y paginar

     $questions     = Question::where('test_id', '=', $test_id)
                                ->orderBy('id', 'ASC')
                                ->get();

    
    // Contamos toda pregunta asociada a este test

    $cuenta         = $questions->count();

    // Traemos todos los datos del test 

    $test           = Test::find($test_id);
   


    return view('admin.material.questions.index',[
        'questions' => $questions,
        'cuenta'    => $cuenta,
        'test'      => $test,
            ]);
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

        // Creamos el objeto

        
        $question = new Question();

        $question->question_title   = $question_title;
        $question->test_id          = $test_id;
        $question->answerd          = $answerd;


         $question->save();

        $option_title  = $request->input('option_title');

// var_dump( $option_title[0] );

// die();

$question_id = $question->id;



            $option = new Option();
            for($c = 1 ; $c < 5 ; $c++) {

                $option = new Option();  

                $option->question_id  =  $question_id;

                $option->option_number = $c;

                    $option->option_title = $option_title[$c-1];
                    
                $option->save();
        }
     

     

        // for($i=0; $i <= 4; $i++) {
        
        // //   if(empty($input['qty'][$i]) || !is_numeric($input['qty'][$i])) continue;
        
        //   $data = [ 
        //     'option_number' => $i,
        //     'option_title' => implode(",", $option_title[$i]),
        //   ];
        
        //   Option::create($data);
        // }

        return redirect()->route('admin.questions',[
                                'test_id' =>  $test_id
                            ])
                             ->with(['message'=>'Question created correctly']);

        // Validamos todos los datos
            // $validate = $this->validate($request,[
            //     'test_name'     => ['required' , 'string' , 'max:20','unique:tests' ],
            //     'test_type'     => ['required' , 'string' , 'in:Exam,Exercise,Grammar'],
            //     'num_questions' => ['required' , 'numeric' , 'min:1' , 'max:20'],
            //     'duration'      => ['required' , 'numeric' , 'min:1' , 'max:60'],
            // ]);
    
    
        }



        public function update ($id){

            $test = Test::find($id);
    
            return view('admin.material.update',[
                'test' => $test
            ]);


        }
    
    
        public function save_update(Request $request){
           
            $id = $request->input('id');
    
    
            $test = Test::find($id); //conseguir todos los campos del usuario identificado
                
 
            //Validamos todos los datos

            $request->input('test_name');
    

            $validate = $this->validate($request,[
                'test_name'     => ['required' , 'string' , 'max:20','unique:tests,test_name,'.$test->id],
                'test_type'     => ['required' , 'string' , 'in:Exam,Exercise,Grammar'],
                'num_questions' => ['required' , 'numeric' , 'min:1' , 'max:20'],
                'duration'      => ['required' , 'numeric' , 'min:1' , 'max:60'],
            ]);
    
          
                
            // Recogemos los datos del formulario
            $test_name      = $request->input('test_name');
            $test_type      = $request->input('test_type');
            $num_questions  = $request->input('num_questions');
            $duration       = $request->input('duration');
           
            
          // Asignar nuevos valores al objeto
          
    
          $current_date = date('Y-m-d H:i:s');
    
          $test->test_name        = $test_name;
          $test->test_type        = $test_type;
          $test->num_questions    = $num_questions;
          $test->duration         = $duration;
          $test->updated_at       = $current_date;
                
    
            //Ejecutamos los cambios en la BD y ademas mostramos un mensaje
            $test->update();
    
            return redirect()->route('admin.material')
            ->with(['message'=>'Material update correctly']);   

    
    }    



    public function delete($id){

        $test = Test::find($id);

            //  $test->delete();

            return redirect()->route('admin.material')
            ->with(['message'=>'Material deleted correctly']);   

            
}



    
}
