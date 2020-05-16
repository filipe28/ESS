@extends('layout.app')
@section('title', 'Novo Utilizador' )
@section('content')
    <form method="POST" action="{{route('admin.users.store')}}" class="form-group">
        @csrf
        @include('admistradores.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.admistradores.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
