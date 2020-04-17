<?php

namespace App\Http\Controllers;

use App\User; //Modelo de user
use App\Result; //Modelo de result
use Illuminate\Support\Facades\Hash; //Para cifra contraseña
use Illuminate\Http\Request; //FUCK no borrar, trae todas las cosas que mandemos por POST
use Illuminate\Support\Facades\Storage; //Necesario para subir archivos
use Illuminate\Support\Facades\File; //Necesario para guardar el archivo subido
use Illuminate\Http\Response; //Para devolver la imagen desde la BD


class UserController extends Controller{


    public function __construct(){
        $this->middleware('auth');
    }


    public function config(){
        return view('user.config');
    }


    

    //Metodo para ver el perfil del usuario logueado

    public function profile(){

        $user       = \Auth::user();
        $results    = Result::where('user_id','=',$user->id)
                            ->orderBy('id', 'DESC')
                            ->paginate(4);

        $cuenta     = Result::where('user_id','=',$user->id)
                            ->count();

        return view('user.profile',[
            'user'    => $user,
            'results' => $results,
            'cuenta'  => $cuenta

            ]);
    
        
    }

    // Vista para crear un USER
    public function create(){
        return view('admin.users.create');
    }


    // Metodo para crear un USER

    public function store(Request $request){
               
       
    // Validamos todos los datos
        $validate = $this->validate($request,[
            'user_name'     => ['required' , 'string' , 'max:20' , 'regex:/^([A-Za-zÑñ]+[áéíóú]?[A-Za-z]*){2,10}\s?([A-Za-zÑñ]+[áéíóú]?[A-Za-z]*){0,10}$/iu'],
            'surname'       => ['required' , 'string' , 'max:20' , 'regex:/^([A-Za-zÑñ]+[áéíóú]?[A-Za-z]*){2,18}\s?([A-Za-zÑñ]+[áéíóú]?[A-Za-z]*){0,36}$/iu'],
            'nick'          => ['required' , 'string' , 'max:11' , 'unique:users'],
            'email'         => ['required' , 'string' , 'email' , 'max:30' , 'unique:users'],
            'password'      => ['required' , 'string' , 'min:5' , 'max:20' ,'confirmed'],
            'role'          => ['required' , 'in:user,admin'],
            'image_path'    => ['nullable' , 'mimes:jpeg,jpg,png,gif' , 'max:3000'],
        ]);

      
            
        // Recogemos los datos del formulario
        $user_name  = $request->input('user_name');
        $surname    = $request->input('surname');
        $nick       = $request->input('nick');
        $email      = $request->input('email');
        $password   = Hash::make($request->input('password'));
        $role       = $request->input('role');
        $image_path = $request->file('image_path');


        // Creamos el objeto
        $user = new User();

          if($image_path){
              // Pone un nombre unico
              $image_name = time().$image_path->getClientOriginalName();
  
              // Guarda en la carpeta /storage/app/users
              Storage::disk('users')->put($image_name, File::get($image_path));

              // Seteamos la imagen
              $user->image        = $image_name;
          }
    
        // Asignar nuevos valores al objeto del usuario
        

        $current_date = date('Y-m-d H:i:s');

        $user->user_name    = $user_name;
        $user->surname      = $surname;
        $user->nick         = $nick;
        $user->email        = $email;
        $user->password     = $password;
        $user->role         = $role;
        $user->created_at   = $current_date;
        $user->updated_at   = null;



        // Ejecutamos los cambios en la BD y ademas mostramos un mensaje
        $user->save();

        
        return redirect()->route('admin.users')
                         ->with(['message'=>'User created correctly']);


    }


    public function update ($id){

        $user = User::find($id);

        return view('admin.users.update',[
            'user' => $user
        ]);
    }


    public function save_update(Request $request){
       
        $id = $request->input('id');


        $user = User::find($id); //conseguir todos los campos del usuario identificado
        
        $id = $user->id; //Conseguir el ID


        //Validamos todos los datos

        $validate = $this->validate($request,[
            'user_name'     => ['required' , 'string' , 'max:20' , 'regex:/^([A-Za-zÑñ]+[áéíóú]?[A-Za-z]*){2,10}\s?([A-Za-zÑñ]+[áéíóú]?[A-Za-z]*){0,10}$/iu'],
            'surname'       => ['required' , 'string' , 'max:20' , 'regex:/^([A-Za-zÑñ]+[áéíóú]?[A-Za-z]*){2,18}\s?([A-Za-zÑñ]+[áéíóú]?[A-Za-z]*){0,36}$/iu'],
            'nick'          => ['required' , 'string' , 'max:11' , 'unique:users,nick,'.$id],
            'email'         => ['required' , 'string' , 'email' , 'max:30' , 'unique:users,nick,'.$id],
            'role'          => ['required' , 'in:user,admin'],
            'image_path'    => ['nullable' , 'mimes:jpeg,jpg,png,gif' , 'max:3000'],
        ]);
            
        // Recogemos los datos del formulario
               $user_name  = $request->input('user_name');
               $surname    = $request->input('surname');
               $nick       = $request->input('nick');
               $email      = $request->input('email');
               $role       = $request->input('role');
               $image_path = $request->file('image_path');
       
        //Recogemos los datos del formulario
        if($image_path){
            // Pone un nombre unico
            $image_name = time().$image_path->getClientOriginalName();

            // Guarda en la carpeta /storage/app/users
            Storage::disk('users')->put($image_name, File::get($image_path));

            // Seteamos la imagen
            $user->image        = $image_name;
        }
  
      // Asignar nuevos valores al objeto del usuario
      

      $current_date = date('Y-m-d H:i:s');

      $user->user_name    = $user_name;
      $user->surname      = $surname;
      $user->nick         = $nick;
      $user->email        = $email;
      $user->role         = $role;

        //Ejecutamos los cambios en la BD y ademas mostramos un mensaje
        $user->update();

            return redirect()->route('admin.users.update',[
                                'id'    =>      $id
            ])             ->with(['message'=>'User updated correctly']);



    }
    public function update_profile(Request $request){
       

        $user = \Auth::user(); //conseguir todos los campos del usuario identificado
        
        $id = $user->id; //Conseguir el ID


        //Validamos todos los datos

        $validate = $this->validate($request,[

        'user_name' => ['required', 'string', 'max:255'],
        'surname'   => ['required', 'string', 'max:255'],
        'nick'      => ['required', 'string', 'max:255', 'unique:users,nick,'.$id],
        'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        'image_path'=> [ 'image', 'max:3000']
        ]);
            
        //Recogemos los datos del formulario
        $user_name  = $request->input('user_name');
        $surname    = $request->input('surname');
        $nick       = $request->input('nick');
        $email      = $request->input('email');
    

        //Subir imagen
        $image_path = $request->file('image_path');

        if($image_path){
            //Pone un nombre unico
            $image_name = time().$image_path->getClientOriginalName();

            //Guardar en la carpeta /storage/app/users
            Storage::disk('users')->put($image_name, File::get($image_path));
        
           //Seteo el nombre de la imagen en el objeto
            $user->image = $image_name;
        }

        //Asignar nuevos valores al objeto del usuario
        $user->user_name    = $user_name;
        $user->surname      = $surname;
        $user->nick         = $nick;
        $user->email        = $email;
      

        //Ejecutamos los cambios en la BD y ademas mostramos un mensaje
        $user->update();

        return redirect()->route('config')
                         ->with(['message'=>'User updated correctly']);



    }

    //Para sacar la foto por pantalla
    
    public function delete($id){

        $user = User::find($id);

        if(confirm("Realmente tal"))
        {
            //  $user->delete();
            return redirect()->route('admin.users')
            ->with(['message'=>'User deleted correctly']);
        }
        

            
}


    //Para sacar la foto por pantalla
    
public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
}




public function users_index(){
    $users      = User::orderBy('id', 'ASC')->get();

    return view('admin.users.index',[
        'users'     => $users
            ]);
    }



    public function user_view($id){

        $user    = User::find($id);
    
        $results = Result::where('user_id','=',$id)
                            ->paginate(5);
    
        $cuenta     = Result::where('user_id','=',$id)
                            ->count();
    
        return view('admin.userview',[
            'user' => $user,
            'results' => $results,
            'cuenta' => $cuenta,
                    ]);
    
    }






}
