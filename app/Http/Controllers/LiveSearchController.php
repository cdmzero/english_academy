<?php

namespace App\Http\Controllers;
use App\User; //Modelo de User

use Illuminate\Http\Request;

class LiveSearchController extends Controller
{

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = User::where('user_name', 'like', '%'.$query.'%')
         ->orWhere('surname', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }else{
       $data = User::orderBy('id', 'asc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0){
        foreach($data as $row)
        {
            if($row->image){
                $output .= 
                '
                <div class="col-lg-4 text-center panel">
               
                <a href="'. route('admin.userview',['id'=>$row->id]) .'">
                        <img src="'.route('user.avatar',['filename'=>$row->image]) .'" class="rounded-circle" height="150px" width="150px"></img>
                        </a>
                        <h2 class="title">'. $row->user_name ." ". $row->surname .'
                      
                      <div class="dropdown">
                      <button class="btn btn-noborder" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-cog"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn-menu" href="'. route('admin.users.update',['id'=>$row->id]) .'"><i class="fa fa-edit"></i> Edit</a>
                        <a class="dropdown-item btn-menu btn-delete"  href="'. route('admin.users.delete',['id'=>$row->id]) .'"><i class="fa fa-trash"></i> Remove</a>
                      </div>
                      </div>
                        </h2>      
                </div>                   
                ';
            }else{
                $output .= '
              <div class="col-lg-4 text-center">
                        <a href="'. route('admin.userview',['id'=>$row->id]) .'">
                        <img src="../img/nopic.png" class="rounded-circle" height="150px" width="150px"></img>
                        </a>
                        <h2 class="title">'. $row->user_name ." ". $row->surname.

                        '<div class="dropdown">
                        <button class="btn btn-noborder" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item btn-menu" href="'. route('admin.users.update',['id'=>$row->id]) .'"><i class="fa fa-edit"></i> Edit</a>
                          <a class="dropdown-item btn-menu .btn-delete" href="'. route('admin.users.delete',['id'=>$row->id]) .'"><i class="fa fa-trash"></i> Remove</a>
                        </div>
                        </div>
                        
                        </h2>
             </div>               
                    
                ';
            }   
        }
      }else{
       $output = '
       <div class="col-lg-4 text-center mx-auto">
        <h2>No data found!</h2>
       </div>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );
      echo json_encode($data);
     }
    }

}
