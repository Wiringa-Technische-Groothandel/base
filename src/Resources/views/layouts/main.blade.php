<!doctype html>
<html lang="nl">
    @include('base::components.head')

    <body>
        @yield('before_content')

        @if(!Auth::check())
            @include('base::components.login')
        @endif

        @include('base::components.navigation')

        @include('base::components.notifications')

        <div class="bg-primary site-title">
            @yield('title')
        </div>

        <div class="container" id="content">
            @yield('content')
        </div>

        @include('base::components.footer')

        @yield('after_content')

        @if(!app()->environment('production'))
            <div style="position: fixed;bottom: 20px;right: 20px;background-color: red;color:#333;padding:5px;border:3px solid #333;">{{ ucfirst(app()->environment()) }}</div>
        @endif

        <script src="{{ mix('js/app.js') }}"></script>

        @yield('extraJS')
    </body>
</html>
