@extends('layouts.app')
@section('title', 'Dashboard' )
@section('content')

<div id="temps_div"></div>
// With Lava class alias
<?= Lava::render('LineChart', 'Temps', 'temps_div') ?>

@endsection
