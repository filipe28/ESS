@extends('layouts.app')

@section('title','Perfil' )
@section('content')

    <div class="col-md-12">
        <form method="POST" action="{{ route('profile_update') }}">

            @csrf
            @method('PUT')
            <hr class="colorgraph">

        <input type="hidden" name="id" value="{{auth()->user()->id}}">

            <label>Nome</label>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control input-lg" value="{{old('name', $user->name)}}" tabindex="1">
                    </div>
                </div>
            </div>

            <label>Email</label>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control input-lg" value="{{old('email', $user->email)}}" tabindex="2">
                    </div>
                </div>
            </div>

            <label>Password</label>
            <div class="row">
                <div class="col-xs-12 col-md-2"><a href="#" class="btn btn-warning btn-block btn-lg" tabindex="3">Change Password</a></div>
            </div>

            <label>NIF</label>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="number" name="NIF" id="NIF" class="form-control input-lg" value="{{old('NIF', $user->NIF)}}" tabindex="4">
                    </div>
                </div>
            </div>

            <label>Nº Telefone</label>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="number" name="telefone" id="telefone" class="form-control input-lg" value="{{old('telefone', $user->telefone)}}" tabindex="5">
                    </div>
                </div>
            </div>

            <label>Fotografia</label>
            <div class="row">
                <div class="col-xs-12 col-sm-1 col-md-1 px-0">
                    <div class="form-group px-0">
                        @if ($user->foto == null)
                            <img class="img-fluid" src="/img/default_img.png" >
                        @else
                            <img class="img-fluid" src='/storage/fotos/{{$user->foto}}'>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input id="inputFoto" type="file" class="form-control" name="foto" value="{{ old('foto')}}">
                    </div>
                </div>
            </div>

            <hr class="colorgraph">

            <div class="row">
                <div class="col-xs-12 col-md-6"><button type="submit" class="btn btn-success btn-block btn-lg" name="ok" tabindex="6">Save</button></div>
            </div>

        </form>

        <form action="{{route('profile_destroy')}}" method="POST">
            @csrf
            @method("DELETE")

            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <button type="submit" class="btn btn-danger btn-block btn-lg" href="" id="delete" role="button" tabindex="7">Delete Account</button>
                </div>
            </div>
        </form>

    </div>

@endsection
