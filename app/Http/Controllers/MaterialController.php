<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Result; //Modelo de Result
use App\Test; //Modelo de Test



class MaterialController extends Controller
{
   public function index(){

    $tests      = Test::orderBy('id', 'ASC')->paginate(5);
    $cuenta     = Test::count();

    return view('admin.material.index',[
        'tests'     => $tests,
        'cuenta'    => $cuenta
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
                'num_questions' => ['required' , 'numeric' , 'min:5' , 'max:20'],
                'duration'      => ['required' , 'numeric' , 'min:5' , 'max:60'],
            ]);
    
          
                
            // Recogemos los datos del formulario
            $test_name      = $request->input('test_name');
            $test_type      = $request->input('test_type');
            $num_questions  = $request->input('num_questions');
            $duration       = $request->input('duration');
     
    
            // Creamos el objeto
            $test = new Test();
    
        
            // Asignar nuevos valores al objeto 
            
    
            $current_date = date('Y-m-d H:i:s');
    
            $test->test_name        = $test_name;
            $test->test_type        = $test_type;
            $test->num_questions    = $num_questions;
            $test->duration         = $duration;
            $test->created_at       = $current_date;
            $test->updated_at       = null;

    
    
    
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
                'num_questions' => ['required' , 'numeric' , 'min:5' , 'max:20'],
                'duration'      => ['required' , 'numeric' , 'min:5' , 'max:60'],
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
    
                return redirect()->route('admin.material.update',[
                                    'id'    =>      $id
                ])             ->with(['message'=>'Material updated correctly']);
    
    }    



    public function delete($id){

        $test = Test::find($id);

            //  $test->delete();

            return redirect()->route('admin.material')
            ->with(['message'=>'Material deleted correctly']);   

            
}



    
}
