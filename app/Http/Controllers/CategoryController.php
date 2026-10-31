<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * List all categories (10 per page) with the number of books of each.
     */
    public function index(): View
    {
        $categories = Category::withCount('books')->orderBy('name')->paginate(10);
        return view('categories.index', compact('categories'));
    }
    /**
     * Show the "create category" form.
     */
    public function create(): View
    {
        return view('categories.create');
    }
    /**
     * Validate and save a new category.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        Category::create($validated);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
    /**
     * Show the "edit category" form.
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }


    /**
     * Validate and save changes to an category.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $category->update($validated);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    /**
     * Delete an category, but only if the category has no books.
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($category->books()->exists()) {
            return redirect()->route('categories.index')->with('error', 'This category still has books, so it cannot be deleted.');
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
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
