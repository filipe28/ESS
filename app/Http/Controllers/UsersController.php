<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    public function index()
    {
        $query = User::query();

        $users = $query->paginate(10);
        return view('users.index',compact('users'));
    }


    public function indexFilter(Request $request)
    {
        $query = User::query();

        if($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        if(($request->adm != "none") && ($request->filled('adm'))) {
            if($request->adm){
                $query->where('adm', 1);
            }else{
                $query->where('adm', 0);
            }
        }

        if(($request->bloqueado != "none") && ($request->filled('bloqueado'))) {
            if($request->bloqueado){
                $query->where('bloqueado', 1);
            }else{
                $query->where('bloqueado', 0);
            }
        }

        $users = $query->orderBy('id','asc')->paginate(10);
        return view('users.index',compact('users'));
    }

    public function bloquear(User $user)
    {
        $userBloquear = User::findOrFail($user->id);

        switch($userBloquear->bloqueado) {
            case 1:
                $userBloquear->bloqueado = 0;
                break;
            case 0:
                $userBloquear->bloqueado = 1;
        }

        $userBloquear->save();
        return redirect()->route('users.index');
    }

    public function mudarTipoUtilizador(User $user)
    {
        $userMudarTipo = User::findOrFail($user->id);

        switch($userMudarTipo->adm) {
            case 1:
                $userMudarTipo->adm = 0;
                break;
            case 0:
                $userMudarTipo->adm = 1;
        }

        $userMudarTipo->save();
        return redirect()->route('users.index');
    }


}
