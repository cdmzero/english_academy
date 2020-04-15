<?php

namespace App\Http\Controllers;
use App\User; //Modelo de User

use Illuminate\Http\Request;

class LiveSearchController extends Controller
{
    public function index()
    {
        return view('live_search');
    }


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
         ->orWhere('nick', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = User::orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0){
        foreach($data as $row)
        {
            if($row->image){
                $output .= '
                <div class="col-lg-4 text-center" id="">
                        <a href="'. route('admin.userview',['id'=>$row->id]) .'">
                        <img src="'.route('user.avatar',['filename'=>$row->image]) .'" class="rounded-circle" height="150px" width="150px"></img>
                        </a>
                        <h2 class="title">'. $row->user_name ." ". $row->surname .'</h2>
                    </div>
                    </div>
                   
                ';
            }else{
                $output .= '
                <div class="col-lg-4 text-center" id="">
                        <a href="'. route('admin.userview',['id'=>$row->id]) .'">
                        <img src="../img/nopic.png" class="rounded-circle" height="150px" width="150px"></img>
                        </a>
                        <h2 class="title">'. $row->user_name ." ". $row->surname .'</h2>
                    </div>
                    </div>
                    
                ';
            }
                
            
        }
      }else{
       $output = '
       <div class="col-lg-4 text-center" id="">
        <h2>No Data Found</h2>
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
