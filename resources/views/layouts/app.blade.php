<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.head', ['pageTitle' => $pageTitle ?? 'Default Title', 'metaTitle' => $metaTitle ?? 'Default Meta'])

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @include('partials.menu')

    <div>
        @yield('content')
    </div>
</body>

</html>
