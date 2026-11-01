@extends('layouts.app')

@section('title', 'Add book')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Library collection</p>
            <h1>Add a book</h1>
        </div>
    </div>

    <section class="form-card">
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            @include('books._form')
        </form>
    </section>
@endsection
