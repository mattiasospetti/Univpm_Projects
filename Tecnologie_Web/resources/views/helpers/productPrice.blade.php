@if ($product -> discounted == 0)
<p id="prezzo">{{ number_format($product->getPrice(false), 2, ',', '.') }} €</p>
<!--<p id="prezzo"> {{ number_format($product->getPrice($product->discounted), 2, ',', '.') }} € </p>-->
@endif
@if ($product -> discounted == 1)
@cannot('isUser')
<p id="prezzo">{{ number_format($product->getPrice(false), 2, ',', '.') }} €</p>
@endcannot
@can('isUser')
<p id="prezzo"> {{ number_format($product->getPrice($product->discounted), 2, ',', '.') }} € </p>
<p id="prezzo" style="font-size:12px"> Valore <del>{{ number_format($product->getPrice(false), 2, ',', '.') }} €</del><br>
    Sconto {{ $product->discountPerc }}%</p>
@endcan
@endif
