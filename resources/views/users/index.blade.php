
@extends('home')
@section('title','Users' )
@section('content')

    <form action="{{route('users.indexFilter')}}" method="get" class="form-group">
        @csrf
        <div class="form-row form-inline  align-items-center">
            <div class="form-group col-auto">
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Nome"/>
            </div>

            <div class="form-group col-auto">
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email"/>
            </div>

            <div class="form-group col-auto mr-2">
                <select name="adm" class="form-control" id="inputType">
                    <option value="none" disabled selected>Tipo de utilizador</option>
                    <option value="1">Administrador</option>
                    <option value="0">Normal</option>
                </select>
            </div>

            <div class="form-group col-auto mr-2">
                <select name="bloqueado" class="form-control" id="inputType">
                    <option value="none" disabled selected>Utilizador Bloqueado?</option>
                    <option value="1">Bloqueado</option>
                    <option value="0">Não Bloqueado</option>
                </select>
            </div>

            <div class="form-group col-auto">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <hr class="colorgraph">

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Email</th>
                @if (Auth::user()->adm)
                    <th>Tipo utilizador</th>
                    <th>Utilizador Bloqueado?</th>
                    <th>NIF</th>
                    <th>Telefone</th>
                    <th>Utilizador Bloqueado?</th>
                    <th>Mudar Tipo Utilizador</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <img src="{{$user->foto ? asset('storage/fotos/' . $user->foto) : asset('img/default_img.png') }}" alt="Foto do docente"  class="img-profile rounded-circle" style="width:40px;height:40px">
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if (Auth::user()->adm)
                        <td> @if($user->adm)Administrador @else Normal @endif</td>
                        <td> @if($user->bloqueado) Bloqueado @else Não Bloqueado @endif </td>
                        <td>{{$user->NIF}}</td>
                        <td>{{$user->telefone}}</td>
                        <td>
                            <form method="POST" action="{{route('users.bloquear', ['user' => $user]) }}" class="form-group">
                                @method('PATCH')
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                @if($user->bloqueado)
                                    <button type="submit"  class="btn btn-success btn-sm" name="desbloquear">Desbloquear</button>
                                @else
                                    <button type="submit"  class="btn btn-warning btn-sm" name="bloquear"> Bloquear</button>
                                @endif
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{route('users.mudarTipoUtilizador', ['user' => $user]) }}" class="form-group">
                                @method('PATCH')
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                <button type="submit" class="btn btn-primary btn-sm" name="mudarTipo"> @if($user->adm) Normal @else Administrador @endif </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->withQueryString()->links() }}
@endsection

