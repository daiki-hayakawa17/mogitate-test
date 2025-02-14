<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <style>
         @import url('https://fonts.cdnfonts.com/css/jsmath-cmti10');
    </style>  
    @yield('css')
    @livewireStyles
</head>
<body>
    @livewireScripts
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">
                mogitate
            </h1>
        </div>
    </header>


    <main>
        @yield('content')
    </main>
</body>
</html>