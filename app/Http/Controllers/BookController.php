<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display all books with search and category filters.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');
        $categoryId = $request->query('category_id');

        $books = Book::with(['author', 'category'])
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->when($categoryId, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->orderBy('title')
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('books.index', compact(
            'books',
            'categories',
            'search',
            'categoryId'
        ));
    }

    /**
     * Show the create book form.
     */
    public function create(): View
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('authors', 'categories'));
    }

    /**
     * Store a new book.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            $this->rules(),
            $this->messages()
        );

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display one book.
     */
    public function show(Book $book): View
    {
        $book->load(['author', 'category']);

        return view('books.show', compact('book'));
    }

    /**
     * Show the edit book form.
     */
    public function edit(Book $book): View
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact(
            'book',
            'authors',
            'categories'
        ));
    }

    /**
     * Update an existing book.
     */
    public function update(
        Request $request,
        Book $book
    ): RedirectResponse {
        $validated = $request->validate(
            $this->rules(),
            $this->messages()
        );

        $book->update($validated);

        return redirect()
            ->route('books.show', $book)
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Delete a book.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    /**
     * Validation rules shared by store() and update().
     */
    private function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'published_at' => ['nullable', 'date'],
            'author_id' => ['required', 'exists:authors,id'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    /**
     * Custom validation messages.
     */
    private function messages(): array
    {
        return [
            'title.required' => 'Please enter the book title.',
            'author_id.required' => 'Please choose an author.',
            'author_id.exists' => 'The selected author does not exist.',
            'category_id.required' => 'Please choose a category.',
            'category_id.exists' => 'The selected category does not exist.',
        ];
    }
}
