<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href={{ asset('favicon.png') }} type="image/png">
    @vite('resources/scss/style.scss')

    
</head>

<body>   
    @include('fragments.loader')
    
    @if ($errors->all())
        @include('fragments.toast', ['errors' => $errors->all()])
    @elseif(session()->has('success'))
        @include('fragments.toast', ['success' => session()->get('success')])
    @endif


    @if (Auth::check())
        @include('fragments.navbar')
        @include('admin.about')
    @endif
    @yield('content')



    <code class="text-center ms-5">
        <p>&copy; {{ $_ENV['APP_NAME'] }} {{ $_ENV['APP_RELEASE'] }} (Master Branch)</p>
        <p>For testing purposes only. Version {{ $_ENV['APP_VERSION'] }}</p>
        <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
    </code>

    @vite('resources/main.ts')
    
    @yield('scripts')

</body>

</html>
