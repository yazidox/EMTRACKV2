<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>EMTRACK - @yield('title')</title>
  </head>
  <body>


  <div class="h-screen flex overflow-hidden bg-gray-100">
  @include('layouts.header')
  @include('layouts.sidebar')
  <div class="flex flex-col w-0 flex-1 overflow-hidden">
    <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">

    </div>

    <main class="flex-1 relative overflow-y-auto focus:outline-none">
      <div class="py-6">
        <div class="max-w-10xl mx-auto px-4 sm:px-6 md:px-8">
             @yield('content')
        </div>
      </div>


      
    </main>
  </div>


</div>


  </body>
</html>