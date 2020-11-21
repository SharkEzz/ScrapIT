@component('mail::message')
# Nouveau deal !

### Produit : <a href="{{ $product->url }}">{{ $product->name }}</a>
## Prix actuel : {{ $currentPrice }}

@endcomponent
