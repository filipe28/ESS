@extends('layouts.app')
@section('title', 'Dashboard' )
@section('content')
@linechart('Temps', 'temps_div')
@endsection
