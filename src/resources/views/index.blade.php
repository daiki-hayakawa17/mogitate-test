@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="products__inner">
    <div class="products__title">
        <h2 class="products__title--text">
            商品一覧
        </h2>

        <div class="products-create__button" >
            <a  class="products-create__button-submit" href="{{ route('product.register') }}">
                + 商品を追加
            </a>
        </div>
    </div>

    <div class="products__content">
        <form class="products__search" action="/products/search" method="get">
            @csrf
            <input class="products__search--input" type="text" name="keyword" value="{{ old ('keyword') }}" placeholder="商品名で検索">
            <div class="products__search--button">
                <button class="products__search--button-submit" type="submit">検索</button>
            </div>
        </form>

        <div class="products__cards">
            <div class="products__cards--inner">
                @foreach ($products as $product)
                <a class="card" href="/products/{{ $product->id }}">
                    <div class="card__img">
                        <img src="{{ asset('storage/fruits-img/'. $product->image) }}">
                    </div>
                    <div class="card__content">
                        <p class="card__text">{{ $product->name}}</p>
                        <p class="card__price">￥{{ $product->price}}</p>
                    </div>
                </a>
                @endforeach
            </div>
            
            {{ $products->links('pagination::default') }}
            
        </div>
    </div>
</div>

@endsection