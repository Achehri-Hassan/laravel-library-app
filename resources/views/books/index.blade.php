@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Library collection</p>
            <h1>Books</h1>
        </div>
        <a class="button" href="{{ route('books.create') }}">Add book</a>
    </div>

    <form class="filter-form" action="{{ route('books.index') }}" method="GET">
        <div class="field">
            <label for="search">Search title</label>
            <input id="search" type="search" name="search" value="{{ $search }}" placeholder="Enter a book title">
        </div>
        <div class="field">
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id">
                <option value="">All categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected((string) $categoryId === (string) $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="filter-actions">
            <button class="button" type="submit">Filter</button>
            <a class="button button-secondary" href="{{ route('books.index') }}">Clear</a>
        </div>
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th class="actions-heading">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td data-label="Title"><a class="table-link" href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                        <td data-label="Author">{{ $book->author->name }}</td>
                        <td data-label="Category">{{ $book->category->name }}</td>
                        <td data-label="Published">{{ $book->published_at?->format('M j, Y') ?? '—' }}</td>
                        <td data-label="Actions" class="row-actions">
                            <a class="text-link" href="{{ route('books.edit', $book) }}">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Delete this book?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-button text-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="5">No books found. Add a book or change your filters.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrap">{{ $books->links() }}</div>
@endsection
