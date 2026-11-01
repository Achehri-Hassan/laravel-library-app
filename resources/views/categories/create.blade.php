@extends('layouts.app')

@section('title', 'Add category')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Library collection</p>
            <h1>Add a category</h1>
        </div>
    </div>

    <section class="form-card">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            @include('categories._form')
        </form>
    </section>
@endsection
