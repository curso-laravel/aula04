<?php

namespace App\Http\Controllers;

use App\Heroi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeroiController extends Controller
{
    public function index(Request $req)
    {
        //$qb = DB::table('herois')->select(['nome', 'id']);
        $qb= Heroi::select('nome', 'id');        
        $herois = $qb->get();
        return view('herois.list', ['herois' => $herois]); 
    }

    public function create()
    {
        return view('herois.create'); 
    }

    public function store(Request $req){

        $req->validate(
            ['nome' => 'required|alpha|min:3|max:100',
             'identidade_secreta' => 'max:255',
             'origem' => 'alpha|max:100',
             'file' => 'file',
            ]);

        $heroi = new Heroi();
        $heroi->nome = $req->nome;
        $heroi->identidade_secreta = $req->identidade_secreta;
        $heroi->origem = $req->origem;
        $heroi->forca = $req->forca;
        $heroi->terraqueo = ($req->terraqueo && $req->terraqueo === 'on') ? true : false;
        $heroi->pode_voar = ($req->pode_voar && $req->pode_voar === 'on') ? true : false;
        
        $path = $req->file('foto')->getRealPath();
        $foto = file_get_contents($path);
        $base64 = base64_encode($foto);

        $heroi->foto = $base64;
        $heroi->save();

        return redirect('/herois');

    }
}
