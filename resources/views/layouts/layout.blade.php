<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <title>@yield('title', config('seo.seo.title'))</title>
    <meta name="description" content="@yield('description',  config('seo.seo.description'))"/>
    <meta name="keywords" content="@yield('keywords',  config('seo.seo.keywords'))"/>
    @yield('canonical', '')

</head>
<body class="page {{ route_name() }}">
<div id="content" class="content_ {{ route_name() }} ">
    <x-message.message/>
    <x-message.message_error/>
   @include('include.templates.header', ['route' => route_name()])
    @yield('content')
    @include('include.templates.footer', ['route' => route_name()])

</div><!--.content_-->

{{--@include('templates.axeld.footer')--}}
{{--@include('html.mobile.bottom')--}}
{{--@include('include.connect.connect')--}}
@include('include.modals.temp_forms.call_me')



</body>
</html>

