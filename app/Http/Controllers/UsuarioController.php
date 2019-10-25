<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index(Request $req)
    {
        $req->validate(
            ['nome' => 'nullable|alpha|min:3|max:255']);

        $qb = DB::table('users')->select(['name', 'id']);
        if($req->nome){
            $qb->where('name','like', "$req->nome%");
        }

        $usuarios = $qb->get();
        return view('usuario', ['usuarios' => $usuarios]); 
    }

    public function index2(Request $req)
    {
        $req->validate(
            ['nome' => 'nullable|alpha|min:3|max:255']);

      

        $qb = User::select('name', 'id');
        if($req->nome){
            $qb->where('name','like', "$req->nome%");
        }
        $usuarios = $qb->get();
        return view('usuario', ['usuarios' => $usuarios]); 
    }
}
