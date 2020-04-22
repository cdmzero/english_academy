<?php


 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;  
use App\Result; //Modelo de Result
use App\Test; //Modelo de Test
use App\User; //Modelo de user



class MaterialController extends Controller
{


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
                'test_type'     => ['required' , 'string' , 'in:Exam,Exercise,Grammar'],
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
                'test_level'    => ['required' , 'string' , 'in:Basic,Intermediate,High'],
                'num_questions' => ['required' , 'numeric' , 'min:1' , 'max:20'],
                'duration'      => ['required' , 'numeric' , 'min:1' , 'max:60'],
            ]);
    
          
                
            // Recogemos los datos del formulario
            $test_name              = $request->input('test_name');
            $test_type              = $request->input('test_type');
            $test_level             = $request->input('test_level');
            $num_questions          = $request->input('num_questions');
            $duration               = $request->input('duration');
           
            
          // Asignar nuevos valores al objeto
          
     
    
          $current_date = date('Y-m-d H:i:s');
    
          $test->test_name        = $test_name;
          $test->test_type        = $test_type;
          $test->test_level       = $test_level;
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
