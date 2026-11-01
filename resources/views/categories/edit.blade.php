@extends('layouts.app')

@section('title', 'Edit category')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Library collection</p>
            <h1>Edit category</h1>
        </div>
    </div>

    <section class="form-card">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            @include('categories._form')
        </form>
    </section>
@endsection
