<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class AuthorController extends Controller
{
/**
     * List all authors (10 per page) with the number of books of each.
     */
public function index(): View
{
$authors = Author::withCount('books')->orderBy('name')->paginate(10);
return view('authors.index', compact('authors'));
}
/**
     * Show the "create author" form.
     */
public function create(): View
{
return view('authors.create');
}

/**
     * Validate and save a new author.
     */
public function store(Request $request): RedirectResponse
{
$validated = $request->validate($this->rules());
Author::create($validated);
return redirect()->route('authors.index')->with('success', 'Author created successfully.');
}

public function edit(Author $author): View
{
return view('authors.edit', compact('author'));
}
/**
     * Validate and save changes to an author.
     */
public function update(Request $request, Author $author): RedirectResponse
{
$validated = $request->validate($this->rules());
$author->update($validated);
return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
}
/**
     * Delete an author, but only if the author has no books.
     */
public function destroy(Author $author): RedirectResponse
{
if ($author->books()->exists()) {
return redirect()->route('authors.index')->with('error', 'This author still has books, so it cannot be deleted.');
}

$author->delete();
return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
}

/**
     * Validation rules shared by store() and update().
     */
private function rules(): array
{
return [
'name' => ['required', 'string', 'max:255'],
];


}

}
