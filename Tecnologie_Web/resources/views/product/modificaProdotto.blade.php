@extends('layout.staff')

@section('title' , 'Modifica Prodotto' )

@section('scripts')
@parent  

<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('confermamodifica' , $product->prodId ) }}";
    var formId = 'conf';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#conf").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>

@endsection


@section('content')
<div class="contmodificaprodotto">
    <div class="modificaprodotto">
        <h3>Modifica Prodotto</h3>
        <p>Utilizza questa form per modificare un prodotto del Catalogo</p>
        <div class="">
            {{ Form::open(array('route'=>['confermamodifica', $product->prodId], 'id'=>'conf', 'files' => true, 'method'=>'post')) }}

            @csrf    
            <div id='input-group'>
                {{ Form::label('name', 'Nome Prodotto: ', ['class' => 'label-input']) }}
                {{ Form::text('name', $product->name , ['class' => 'input', 'id' => 'name']) }}
            </div>

            <br>

            <div id='input-group'>
                {{ Form::label('catId', 'Categoria: ', ['class' => 'label-input']) }}
                {{ Form::select('catId', $cats, $product->catId , ['class' => 'input','id' => 'catId']) }}
            </div>

            <br>

            <div id='input-group'>
                {{ Form::label('descShort', 'Descrizione Breve: ', ['class' => 'label-input']) }}
                {{ Form::text('descShort', $product->descShort , ['class' => 'input', 'id' => 'descShort']) }}
            </div>

            <br>

            <div id='input-group'>
                {{ Form::label('price', 'Prezzo: ', ['class' => 'label-input']) }}
                {{ Form::text('price', $product->price , ['class' => 'input', 'id' => 'price']) }}
            </div>

            <br>

            <div class="immaginemod">
                @if ($product->image != null)
                <p>Immagine corrente:  </p>
                <img src="{{asset('images/products/' .$product->image)}}">
                @else
                <p> Nessuna immagine per il prodotto</p>
                @endif
            </div> 

            <br>

            <div id='input-group'>
                {{ Form::label('image', 'Nuova Immagine: ', ['class' => 'label-input']) }}
                {{ Form::file('image', ['class' => 'input', 'id' => 'image']) }}
            </div>

            <br>

            <div id='input-group'>
                {{ Form::label('discounted', 'In Sconto: ', ['class' => 'label-input', 'id' => 'discounted']) }}
                {{ Form::select('discounted', $discounted, $product->discounted, ['class' => 'input','id' => 'discounted']) }}
            </div>

            <br>

            <div id='input-group'>
                {{ Form::label('discountPerc', 'Sconto (%): ', ['class' => 'label-input', 'id' => 'discountPerc']) }}
                {{ Form::text('discountPerc', $product->discountPerc, ['class' => 'input', 'id' => 'discountPerc']) }}
            </div>

            <br>

            <div id='input-group'>
                {{ Form::label('descLong', 'Descrizione Estesa: ', ['class' => 'label-input']) }}
                <div  class="boxdesclong">
                    {{ Form::textarea('descLong', $product->descLong, ['class' => 'input', 'id' => 'descLong', 'rows' => 2, 'placeholder'=>'max 1500 caratteri']) }}
                </div>
            </div>


            <br>
            <br>

            <div class="bottoneins">   
                {{ Form::submit('Modifica Prodotto') }}
            </div>

            {{ Form::close() }}


        </div>

    </div>
</div>



@endsection

