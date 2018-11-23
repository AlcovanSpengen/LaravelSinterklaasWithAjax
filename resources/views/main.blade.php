<!doctype html>
<html lang="en">
    <head>
        @include('partials._head')
        @include('partials._javascript')
        @yield('ajax2')
        @yield('ajax')
       
    </head>

    <body>
    <header>
    <div class="header-title"><p>Welkom op de Sinterklaas Blog</p></div>
    </header>
        @include('partials._nav')
        <div class="header"></div>
        <div class="container">
            @yield('content')        
        </div> 
        
        @include('partials._footer')
        
        @yield('scripts')
    </body>
    
</html>