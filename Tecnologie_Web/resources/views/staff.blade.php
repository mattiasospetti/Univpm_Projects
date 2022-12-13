@extends('layout.staff')

@section('title' , 'Area Staff' )

@section('content')
<div class="staff">
<h3> Benvenuto nell'area riservata allo staff del sito: </h3>
<p> {{Auth::user()->nome}} &nbsp; {{Auth::user()->cognome}}</p>
</div>
@endsection