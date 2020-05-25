<?php


 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;  
use Gate;  
use App\Result; //Modelo de Result
use App\Test; //Modelo de Test
use App\User; //Modelo de user
use App\Question;   //Modelo de Question
use App\Choice;     //Modelo de Choice



class MaterialController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function admin_index(){

        return view('admin.index');
    }


   public function index(){

//  Para controlar si los examenes estan listos para ser publicados 
//  debemos controlar cuantas preguntas maximas estos pueden contener
//  para ello, comparamos la columna test.num_questions con el numero de la columna questions.test_id 
//  esta funcion puede retornar dos estados => full o pending

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

    // Primero traemos todos los tests para listarlos y paginarlos

     $tests      = Test::orderBy('id', 'ASC')->paginate(5);



    // Contamos todos los tests
    $cuenta     = Test::count();


    

    return view('admin.material.index',[
        'tests'     => $tests,
        'cuenta'    => $cuenta,
        'status'    => $status,
            ]);
    }


   public function create(){
    return view('admin.material.create');
    }

    public function store(Request $request){

       
        // Validamos todos los datos
            $validate = $this->validate($request,[
                'test_name'     => ['required' , 'string' , 'max:20','unique:tests' ],
                'test_type'     => ['required' , 'string' , 'in:Exam,Exercise'],
                'test_level'    => ['required' , 'string' , 'in:Basic,Intermediate,High'],
                'num_questions' => ['required' , 'numeric' , 'min:1' , 'max:20'],
                'duration'      => ['required' , 'numeric' , 'min:1' , 'max:60'],
            ]);
    
          
                
            // Recogemos los datos del formulario
            $test_name          = $request->input('test_name');
            $test_type          = $request->input('test_type');
            $test_level         = $request->input('test_level');
            $num_questions      = $request->input('num_questions');
            $duration           = $request->input('duration');
     
    
            // Creamos el objeto
            $test = new Test();
    
        
            // Asignar nuevos valores al objeto 
            
                 //Creamos por defecto estos valores, mas adelante se pueden actualizar si se desea.

            $test->created_at           = date('Y-m-d H:i:s');
            $test->mark_right           = 1;
            $test->mark_wrong           = 0;
            $test->status               = 'Pending';
            $test->updated_at           = null;
    

            $test->user_id              = Auth::user()->id;

            // Lo que llega desde el formulario de creacion
            $test->test_name            = $test_name;
            $test->test_type            = $test_type;
            $test->test_level           = $test_level;
            $test->num_questions        = $num_questions;
            $test->duration             = $duration;
                     
            
    
            // Ejecutamos los cambios en la BD y ademas mostramos un mensaje
            $test->save();
    
            
            return redirect()->route('admin.material')
                             ->with(['message'=>'Material created correctly']);
    
    
        }



        public function update ($id){

            $test   = Test::findOrFail($id);

          if( $test->status == 'Public'){

            return redirect()->route('admin.material')
                                 ->with(['error'=>'Sorry, you need to unpublish before anything :/']);

          }else{


             // Para conseguir la autorizacion
             $exam_owner =   $test->user_id;
             $user = Auth::user()->id; 


            if (Gate::forUser($user)->allows('owner-exam', $exam_owner) ) {

         
                $status = Test::withCount(['questions'])->get();
    
                foreach($status as $statu){
                    if($statu->id == $id){
                        $current_questions = $statu->questions_count;
                    }
                }
             
                return view('admin.material.update',[
                    'test' => $test,
                    'current_questions' => $current_questions
                ]);
            }else{
    
                return redirect()->route('admin.material')
                                 ->with(['error'=>'Sorry, you do not have enough permissions for that :/']);
            }

          }
           
           

        }
    
    
        public function save_update(Request $request){

        $id = $request->input('id');

        $test = Test::findOrFail($id); //conseguir todos los campos del usuario identificado

        // Para conseguir la autorizacion

        $exam_owner =   $test->user_id;
        $user = Auth::user()->id;
     
         
        if (Gate::forUser($user)->allows('owner-exam', $exam_owner)) {
             

            $current_questions = $request->input('current_questions');
          

         

            //Validamos todos los datos

            $request->input('test_name');

                    // Recogemos los datos del formulario
                    $test_name              = $request->input('test_name');
                    $test_type              = $request->input('test_type');
                    $test_level             = $request->input('test_level');
                    $num_questions          = $request->input('num_questions');
                    $mark_wrong             = $request->input('mark_wrong');
                    $mark_right             = $request->input('mark_right');
                    $duration               = $request->input('duration');
                   
    

            $validate = $this->validate($request,[
                'test_name'     => ['required' , 'string' , 'max:20','unique:tests,test_name,'.$test->id],
                'test_type'     => ['required' , 'string' , 'in:Exam,Exercise'],
                'test_level'    => ['required' , 'string' , 'in:Basic,Intermediate,High'],
                'num_questions' => ['required' , 'numeric' , 'min:'.$current_questions , 'max:20'],
                'mark_wrong'    => ['required','numeric', 'min:-2.0','max:0.0','lte:mark_right'],
                'mark_right'    => ['required','numeric', 'min:0','max:2.0','gte:mark_wrong'],
            ]);

          // Asignar nuevos valores al objeto
          
     
    
          $current_date = date('Y-m-d H:i:s');
    
          $test->test_name        = $test_name;
          $test->test_type        = $test_type;
          $test->test_level       = $test_level;
          $test->num_questions    = $num_questions;
          $test->mark_wrong         = $mark_wrong;
          $test->mark_right         = $mark_right;
          $test->updated_at       = $current_date;


                
    
            //Ejecutamos los cambios en la BD y ademas mostramos un mensaje
            $test->update();
    
            return redirect()->route('admin.material.update',[
                'test_id'   => $test->id
            ])
            ->with(['message'=>'Material update correctly']);   

    
    }else{
        return redirect()->route('admin.material.update',[
            'test_id'   => $test->id
        ])
        ->with(['message'=>'Sorry you cannot do that :/']); 
    }
    
    }    
    



    public function delete($id){

         $test = Test::findOrFail($id);

         // Para conseguir la autorizacion
         $exam_owner =   $test->user_id;
         $user = Auth::user()->id;

 
         if (Gate::forUser($user)->allows('owner-exam', $exam_owner)) {



          $test->delete();

            return redirect()->route('admin.material')
            ->with(['message'=>'Material deleted correctly']);   
         }else{
            return redirect()->route('admin.material')
            ->with(['message'=>'Sorry, you do not have enough permissions for that :/']);   
         }

            
}


public function publication($test_id){

        $test = Test::findOrFail($test_id);

         // Para conseguir la autorizacion
         $exam_owner =   $test->user_id;

         $user = Auth::user()->id;

 
         if (Gate::forUser($user)->allows('owner-exam', $exam_owner)) {


            
                if($test->status == 'Complete'){
                    $test->status = 'Public';
                    $test->update();


                    return redirect()->route('admin.questions',[
                        'test_id' => $test_id])
                        ->with(['message'=>'Material published on front-page correctly']);

                }
                if($test->status == 'Public'){

                    //Cuando despubliquemos un ejercicio las respuestas que hayamos dado se borraran , pero se mantendran los resultados.
                    $test->status = 'Complete';
                    $test->update();

                    $results = Result::where('test_id','=',$test->id)
                                        ->get();
                                        
                    foreach($results as $result){
                        $choices = Choice::where('result_id','=',$result->id)->get();   
                            foreach($choices as $choice){
                                $choice->delete();
                            }                            
                    }


                   
                    return redirect()->route('admin.questions',[
                        'test_id' => $test_id])
                    ->with(['message'=>'Material unpublish on front-page correctly']);  
                }


                if($test->status == 'Pending'){

                    return redirect()->route('admin.questions',[
                        'test_id' => $test_id])
                    ->with(['error'=>'Please check the status before anything thanks ;-)']);  
                
                }


        }else{

            return redirect()->route('admin.material')
            ->with(['error'=>'Sorry, you do not have enough permissions for that :/']);   

        }


       
        
}




    
}
