@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Library collection</p>
            <h1>Categories</h1>
        </div>
        <a class="button" href="{{ route('categories.create') }}">Add category</a>
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
                @forelse ($categories as $category)
                    <tr>
                        <td data-label="Name">{{ $category->name }}</td>
                        <td data-label="Books">{{ $category->books_count }}</td>
                        <td data-label="Actions" class="row-actions">
                            <a class="text-link" href="{{ route('categories.edit', $category) }}">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-button text-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td class="empty-state" colspan="3">No categories yet. Add a category to get started.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrap">{{ $categories->links() }}</div>
@endsection
