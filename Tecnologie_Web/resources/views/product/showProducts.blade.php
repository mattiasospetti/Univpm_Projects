@extends('layout.staff')

@section('title', 'ModificaElimina Prodotto')

@section('content')
<script>
    $(document).on("click", ".modifica", function () {

    });
</script>
@isset($products)
    <div class="listaprodstaff">
        <table class="listaprodotti">
            <tr> <td> Immagine </td><td> Nome </td> <td> Prezzo </td> <td> Azioni </td></tr>
            @foreach($products as $product)
            <tr> 
                <td>
                    <div class='imagecontainermodfica'>
                        @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image]) 
                    </div> 
                </td> 
                <td> 
                    {{$product->name}}
                </td> 
                <td> 
                    {{$product->price}} € 
                </td>
                <td id="bottonicol">
                    <div class="bottoni">
                        <div class="bottonic">
                            {{ Form::open(array('route'=>['modificaprodotto', $product->prodId] , 'method' => 'post' )) }}
                            {{ Form::submit('Modifica', ['class' => 'bottonic', 'id' => 'modifica']) }} 
                            {{ Form::close() }} 
                        </div>
                        &nbsp; 
                        <div class="bottonic">
                            {{ Form::open(array('route'=>['eliminaprodotto', $product->prodId] , 'method' => 'post' )) }}
                            {{ Form::submit ('Elimina', ['class' => 'bottonic', 'id'=>'elimina']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="paginazionestaff">
            @include('pagination.paginator', ['paginator' => $products])
        </div>
        @endisset
    </div>
@endsection