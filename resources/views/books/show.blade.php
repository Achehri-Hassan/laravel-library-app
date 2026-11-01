@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Book details</p>
            <h1>{{ $book->title }}</h1>
        </div>
        <div class="heading-actions">
            <a class="button button-secondary" href="{{ route('books.index') }}">Back to books</a>
            <a class="button" href="{{ route('books.edit', $book) }}">Edit book</a>
        </div>
    </div>

    <section class="detail-card">
        <dl class="detail-list">
            <div>
                <dt>Author</dt>
                <dd>{{ $book->author->name }}</dd>
            </div>
            <div>
                <dt>Category</dt>
                <dd>{{ $book->category->name }}</dd>
            </div>
            <div>
                <dt>Publication date</dt>
                <dd>{{ $book->published_at?->format('F j, Y') ?? 'Not specified' }}</dd>
            </div>
            <div class="detail-description">
                <dt>Description</dt>
                <dd>{{ $book->description ?: 'No description provided.' }}</dd>
            </div>
        </dl>
    </section>
@endsection
