@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<div class="detail__inner">
    <div class="detail__content">
        <p class="content__title">
            商品一覧 <span class="content__title--black">> {{ $product->name}}</span>
        </p>

        <form action="/products/{id}/update" method="post" id="update" class="form">
            @method('patch')
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}" id="update">
            <div class="form__group--file">
                <img src="{{ asset('storage/fruits-img/'. $product->image) }}">
                <input type="file" name="image" accept="image/png, image/jpeg" form="update">
                <div class="form__error">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>  
            </div>
            <div class="form__input">
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">商品名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="name" value="{{ $product->name }}" form="update">
                        </div>
                        <div class="form__error">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">値段</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="number" name="price" value="{{ $product->price }}" form="update">
                        </div>
                        <div class="form__error">
                            @error('price')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">季節</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--radio">
                            @foreach($seasons as $season)
                            <input type="radio" name="season_name" value="{{$season->name}}" form="update">
                            <span class="input__radio--text">{{$season->name}}</span>
                            @endforeach
                        </div>
                        <div class="form__error">
                            @error('season_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form__input--description">
            <div class="form__group-title">
                <span class="form__label--item">商品説明</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <textarea name="description" form="update">{{ $product->description }}</textarea>
                </div>
                <div class="form__error">
                    @error('description')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <a class="return__button-submit" href="{{ route('products') }}">戻る</a>
            <!-- <form action="/products/{id}/update" method="post" id="update">
                @method('patch')
                @csrf -->
            <button class="add__button-submit" type="submit" name="update">変更を保存</button>
        </form>
            <form class="delete__form--button" action="/products/{productid}/delete" method="post">
                @csrf
                <div class="delete__button">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button class="delete__button-submit" type="submit" name="delete">
                        <svg width="21" height="23" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 4.33325H17.6667V2.99992C17.6667 1.52792 16.472 0.333252 15 0.333252H5.66671C4.19471 0.333252 3.00004 1.52792 3.00004 2.99992V4.33325H1.66671C0.930707 4.33325 0.333374 4.93058 0.333374 5.66658C0.333374 6.40259 0.930707 6.99992 1.66671 6.99992V17.6666C1.66671 20.6079 4.05871 22.9999 7.00004 22.9999H13.6667C16.608 22.9999 19 20.6079 19 17.6666V6.99992C19.736 6.99992 20.3334 6.40259 20.3334 5.66658C20.3334 4.93058 19.736 4.33325 19 4.33325ZM5.66671 2.99992H15V4.33325H5.66671V2.99992ZM16.3334 17.6666C16.3334 19.1386 15.1387 20.3333 13.6667 20.3333H7.00004C5.52804 20.3333 4.33337 19.1386 4.33337 17.6666V6.99992H16.3334V17.6666ZM6.33337 8.99992C5.96671 8.99992 5.66671 9.29992 5.66671 9.66658V17.6666C5.66671 18.0333 5.96671 18.3333 6.33337 18.3333C6.70004 18.3333 7.00004 18.0333 7.00004 17.6666V9.66658C7.00004 9.29992 6.70004 8.99992 6.33337 8.99992ZM9.00004 8.99992C8.63337 8.99992 8.33337 9.29992 8.33337 9.66658V17.6666C8.33337 18.0333 8.63337 18.3333 9.00004 18.3333C9.36671 18.3333 9.66671 18.0333 9.66671 17.6666V9.66658C9.66671 9.29992 9.36671 8.99992 9.00004 8.99992ZM11.6667 8.99992C11.3 8.99992 11 9.29992 11 9.66658V17.6666C11 18.0333 11.3 18.3333 11.6667 18.3333C12.0334 18.3333 12.3334 18.0333 12.3334 17.6666V9.66658C12.3334 9.29992 12.0334 8.99992 11.6667 8.99992ZM14.3334 8.99992C13.9667 8.99992 13.6667 9.29992 13.6667 9.66658V17.6666C13.6667 18.0333 13.9667 18.3333 14.3334 18.3333C14.7 18.3333 15 18.0333 15 17.6666V9.66658C15 9.29992 14.7 8.99992 14.3334 8.99992Z" fill="#FD0707"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection