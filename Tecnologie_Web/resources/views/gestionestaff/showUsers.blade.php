@extends('layout.admin')

@section('title' , 'Lista Utenti' )

@section('content')
@isset($lista)
<div class="contlistastaff">
<table class="listastaff">
    <p> Elimina gli utenti registrati nel sito </p>
    <tr><td> Nome </td><td> Cognome </td><td> Username </td><td> Residenza </td> <td> Data di nascita </td> <td> Elimina </td>
        @foreach ($lista as $user)
    <tr><td>{{$user->nome}} </td> <td> {{$user->cognome}} </td> <td> {{$user->username}} </td><td>{{$user->residenza}}</td><td>{{$user->data}}</td>
        <td>
            {{ Form::open(array( 'route'=> ['eliminautenti'],'method'=>'post')) }}
            {{ Form::checkbox('checked[]', $user->id , false, ['id' => 'checkbox']) }}
        </td>
    </tr>
    @endforeach
    <tr id="rigabottoneelimina"> <td></td><td></td><td></td><td></td><td></td><td>{{ Form::submit('Elimina') }}  </td></tr>
{{ Form::close() }}</td>
</table>  
@endisset
</div>
@endsection