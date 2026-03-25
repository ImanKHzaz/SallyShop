<div class="mb-3">
    <label for="name" class="form-label">اسم الفئة</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label for="slug" class="form-label">Slug (رابط مختصر)</label>
    <input type="text" class="form-control" id="slug" name="slug"
        value="{{ old('slug', $category->slug ?? '') }}" required>
</div>
