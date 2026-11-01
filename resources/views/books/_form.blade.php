<div class="form-grid">
    <div class="field field-full">
        <label for="title">Title <span class="required">*</span></label>
        <input id="title" name="title" type="text" value="{{ old('title', $book->title ?? '') }}" maxlength="255" required>
        @error('title') <p class="field-error">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="author_id">Author <span class="required">*</span></label>
        <select id="author_id" name="author_id" required>
            <option value="">Choose an author</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" @selected((string) old('author_id', $book->author_id ?? '') === (string) $author->id)>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
        @error('author_id') <p class="field-error">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="category_id">Category <span class="required">*</span></label>
        <select id="category_id" name="category_id" required>
            <option value="">Choose a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((string) old('category_id', $book->category_id ?? '') === (string) $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <p class="field-error">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="published_at">Publication date</label>
        <input id="published_at" name="published_at" type="date" value="{{ old('published_at', isset($book) && $book->published_at ? $book->published_at->format('Y-m-d') : '') }}">
        @error('published_at') <p class="field-error">{{ $message }}</p> @enderror
    </div>

    <div class="field field-full">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="5" maxlength="2000">{{ old('description', $book->description ?? '') }}</textarea>
        @error('description') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="form-actions">
    <a class="button button-secondary" href="{{ route('books.index') }}">Cancel</a>
    <button class="button" type="submit">{{ isset($book) ? 'Save changes' : 'Add book' }}</button>
</div>
