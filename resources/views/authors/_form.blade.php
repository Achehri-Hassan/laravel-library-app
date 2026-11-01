<div class="field">
    <label for="name">Name <span class="required">*</span></label>
    <input id="name" name="name" type="text" value="{{ old('name', $author->name ?? '') }}" maxlength="255" required>
    @error('name') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="form-actions">
    <a class="button button-secondary" href="{{ route('authors.index') }}">Cancel</a>
    <button class="button" type="submit">{{ isset($author) ? 'Save changes' : 'Add author' }}</button>
</div>
