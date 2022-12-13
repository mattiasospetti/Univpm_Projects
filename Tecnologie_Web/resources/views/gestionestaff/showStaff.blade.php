@extends('layout.admin')

@section('title' , 'Lista Staff' )

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@isset($lista)
<div class="contlistastaff">
<table class="listastaff">
    <p> Modifica o elimina gli utenti dello staff </p>
    <tr><td> Nome </td><td> Cognome </td><td> Username </td><td> Modifica </td> <td> Elimina </td>
        @foreach ($lista as $staff)
    <tr><td>{{$staff->nome}} </td> <td> {{$staff->cognome}} </td> <td> {{$staff->username}} </td>
        <td>
            <a href="{{route ('modificast', $staff->id)}}" > Modifica </a>
        </td>
        <td>
            {{ Form::open(array( 'route'=> ['eliminastaff'],'method'=>'post')) }}
            {{ Form::checkbox('checked[]', $staff->id , false, ['id' => 'checkbox']) }}
        </td>
    </tr>
    @endforeach
    <tr id="rigabottoneelimina"> <td></td><td></td><td></td><td></td><td>{{ Form::submit('Elimina') }}  </tr>
{{ Form::close() }}</td>
</table>  
@endisset
</div>
@endsection
