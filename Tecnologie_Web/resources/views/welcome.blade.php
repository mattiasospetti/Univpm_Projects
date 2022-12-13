@extends('layout.public')

@section('title' , 'Homepage' )
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<ul class="macrocategorie">
@foreach($MacCategories as $macro)
    <li class="macrocategorie1">
        <div class="contenitoreimg0">
            <div class="sfondo">
                <div class="immagine">
                    <a href="{{route ('catalog2',$macro->catId)}}"> @include('helpers/productCatimg', ['attrs' => 'imagefrm', 'imgFile' => $macro->image])</a> 
                </div>
            </div>
        </div>
        <h4><a href="{{route ('catalog2',$macro->catId)}}"> {{$macro->name}} </a></h4>
    </li>
@endforeach
</ul>

@isset($selectedMacCat)
<div class="microcategorie">
     <h2>In {{ $selectedMacCat->name }}</h2>
            <ul class="listamicro">
                @foreach ($MicCategories as $subCategory)
                <li><a href="{{ route('catalog3', [$selectedMacCat->catId, $subCategory->catId]) }}">{{ $subCategory->name }}</a></li>
                @endforeach
            </ul>
</div>
@endisset

<div class="catalogo">
    @cannot('isStaff')    
    @cannot('isAdmin')        
    
    @empty($selectedMacCat)
    @empty($selectedMicCat)
    <form class="searchview" action="{{route ('search1')}}" method="GET">
        <label> Cerca nel catalogo: </label>
        <input type="search" id="query" name="query" placeholder="Search here">
    </form>   
    @endempty
    @endempty

 

    @isset($selectedMacCat)
    @empty($selectedMicCat)    
    <form class="searchview" action="{{route ('search2', $selectedMacCat->catId)}}" method="GET">
        <label> Cerca nella macrocategoria: </label>
        <input type="search" id="query" name="query" placeholder="Search here">
    </form>  
    @endempty
    @endisset
    
    
    @isset($selectedMicCat, $selectedMacCat)  
    <form class="searchview" action="{{route ('search3', [$selectedMacCat->catId, $selectedMicCat->catId])}}" method="GET">
        <label> Cerca nella microcategoria: </label>
        <input type="search" id="query" name="query" placeholder="Search here">
    </form>
    @endisset
    
      
    @endcannot
    @endcannot
    <div class="inside-container">
        <div class="row">
            <div class="col-12 our-header prom-padd">
                <h2> Catalogo </h2>
                <div  class="text-center">
                    <hr> <i class="far fa-square rotate-45"></i> <i class="far fa-square rotate-45"></i> <hr> 
                </div>
            </div> 
        </div>
        <div class="row" style="width: auto">
            @isset($products)
            @foreach ($products as $product)
            <div class="col-sm-6 col-lg-3 ">
                <div class="product-top product-top-3">
                    <div class="contenitoreimg">
                        @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
                    </div>
                </div>
                <div class="product-text">
                    <div class=" text-center"><span>{{$product->name}}</span> </div>
                    <p id="descbreve">{{$product->descShort}}</p>
                    <p id="prezzo"> @include('helpers/productPrice')</p>
                    <iframe width="330px" height="135px" srcdoc='<p>{!! $product->descLong !!}</p>'></iframe>
                </div>
            </div>
            @endforeach
            @endisset()
        </div>
    </div>
    <div class="pagination justify-content-center" style="font-family: 'Open Sans' , sans-serif">
        @include('pagination.paginator', ['paginator' => $products])
    </div>
</div>
@endsection