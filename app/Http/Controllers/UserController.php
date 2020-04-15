<?php

namespace App\Http\Controllers;

use App\User; //Modelo de user
use App\Result; //Modelo de result

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


    public function searcher(Request $request){
        
        $users  =   User::where("user_name","like",$request->texto."%")->get();

            return view('users',[
                "users" => $users ]);
    
    }
    


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

    public function update(Request $request){
       

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
