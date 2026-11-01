@extends('layouts.app')

@section('title', 'Add author')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Library collection</p>
            <h1>Add an author</h1>
        </div>
    </div>

    <section class="form-card">
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            @include('authors._form')
        </form>
    </section>
@endsection
