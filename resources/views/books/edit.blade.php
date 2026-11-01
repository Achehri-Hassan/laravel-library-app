@extends('layouts.app')

@section('title', 'Edit book')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Library collection</p>
            <h1>Edit book</h1>
        </div>
    </div>

    <section class="form-card">
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            @include('books._form')
        </form>
    </section>
@endsection
