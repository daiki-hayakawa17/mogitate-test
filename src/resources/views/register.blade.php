@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="regster-form__content">
    <div class="regster-form__heading">
        <h2>商品登録</h2>
    </div>

    <form class="form" action="/products/register" method="post" enctype="multipart/form-data" wire:submit.prevent="save">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品名</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" placeholder="商品名を入力">
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
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="number" name="price" placeholder="値段を入力">
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
                <span class="form__label--item">商品画像</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--file">
                    <livewire:preview>
                     <!-- <input type="file" wire:model="register" accept="image/png, image/jpeg"> -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">季節</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    @foreach($seasons as $season)
                    <input type="radio" name="season_name" value="{{$season->name}}">
                    <span class="input__radio--text">{{$season->name}}</span>
                    @endforeach
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
                <span class="form__label--item">商品説明</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <textarea name="description" placeholder="商品の説明を入力"></textarea>
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <a class="return__button-submit" href="{{ route('products') }}">戻る</a>
            <button class="add__button-submit" type="submit" name="add">登録</button>
        </div>
    </form>
</div>

@endsection