<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mensagem;
use App\User;

class MensagemController extends Controller
{
   
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //return Mensagem::where('user_id')->id()->get();
        return Mensagem::all();
    }

   
    public function store(Request $request)
    {
        $mensagem = new Mensagem();
        $mensagem->description = $request->description;
        $mensagem->user_id = auth()->id();
        $mensagem->save();
        return  $mensagem;
    }

   
    public function show($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        $mensagem = Mensagem::find($id);
        $mensagem->description = $request->description;
        $mensagem->save();
        return  $mensagem;
    }

   
    public function destroy($id)
    {
        $mensagem = Mensagem::find($id);
        $mensagem->delete();
    }
}
