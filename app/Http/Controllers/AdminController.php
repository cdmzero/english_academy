<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result; //Modelo de test
use App\User; //Modelo de user
use App\Test; //Modelo de user

use Illuminate\Support\Facades\Redirect; // para redireccionar a otras rutas
   
class AdminController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function admin_index(){

        return view('admin.index');
    }







   








}