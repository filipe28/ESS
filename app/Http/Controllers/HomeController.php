<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserPost;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile',compact('user'));
    }

    public function profile_update(UserPost $request){
        $user = Auth::user();
        $validated_data = $request->validated();

        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        $user->NIF = $validated_data['NIF'];
        $user->telefone = $validated_data['telefone'];
        $user->save();
        return redirect()->route('profile')
            ->with('alert-msg', 'Perfil foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function profile_destroy()
    {
        $user = Auth::user();

        foreach($user->contas as $conta){
            foreach($conta->movimentos as $movimento){
                $movimento->forceDelete();
            }

            if(count($conta->autorizacoes)){
                $conta->autorizacoes()->sync([]);
            }

            $conta->forceDelete();
        }

        if(count($user->autorizacoes)){
            $user->autorizacoes()->sync([]);
        }

        $user->delete();

        return redirect()->route('home');

    }

}
