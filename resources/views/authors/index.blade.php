@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Library collection</p>
            <h1>Authors</h1>
        </div>
        <a class="button" href="{{ route('authors.create') }}">Add author</a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Books</th>
                    <th class="actions-heading">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($authors as $author)
                    <tr>
                        <td data-label="Name">{{ $author->name }}</td>
                        <td data-label="Books">{{ $author->books_count }}</td>
                        <td data-label="Actions" class="row-actions">
                            <a class="text-link" href="{{ route('authors.edit', $author) }}">Edit</a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" onsubmit="return confirm('Delete this author?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-button text-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="empty-state" colspan="3">No authors yet. Add an author to get started.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrap">{{ $authors->links() }}</div>
@endsection
