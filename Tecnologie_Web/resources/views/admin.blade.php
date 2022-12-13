@extends('layout.admin')

@section('title' , 'Area Admin' )

@section('content')
<div class="admin">
<h3> Benvenuto nell'area riservata all'admin del sito: </h3>
<p> {{Auth::user()->nome}} &nbsp; {{Auth::user()->cognome}}</p>
</div>
@endsection