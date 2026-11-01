<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Library Manager') | Library Manager</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container header-content">
            <a class="brand" href="{{ route('books.index') }}">Library Manager</a>
            <nav class="main-nav" aria-label="Main navigation">
                <a href="{{ route('books.index') }}" @class(['active' => request()->routeIs('books.*')])>Books</a>
                <a href="{{ route('authors.index') }}" @class(['active' => request()->routeIs('authors.*')])>Authors</a>
                <a href="{{ route('categories.index') }}" @class(['active' => request()->routeIs('categories.*')])>Categories</a>
            </nav>
        </div>
    </header>

    <main class="container page-content">
        @if (session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-error" role="alert">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">Library Manager</div>
    </footer>
</body>
</html>
