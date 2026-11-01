@extends('layouts.app')

@section('title', 'Edit author')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Library collection</p>
            <h1>Edit author</h1>
        </div>
    </div>

    <section class="form-card">
        <form action="{{ route('authors.update', $author) }}" method="POST">
            @csrf
            @method('PUT')
            @include('authors._form')
        </form>
    </section>
@endsection
