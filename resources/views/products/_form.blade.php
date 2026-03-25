<div class="mb-3">
    <label for="name" class="form-label">اسم المنتج</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">الفئة</label>
    <select name="category_id" id="category_id" class="form-select">
        <option value="">-- بدون فئة --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="description" class="form-label">الوصف</label>
    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="price" class="form-label">السعر</label>
        <input type="number" step="0.01" min="0" class="form-control" id="price" name="price"
            value="{{ old('price', $product->price ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="quantity" class="form-label">الكمية</label>
        <input type="number" min="0" class="form-control" id="quantity" name="quantity"
            value="{{ old('quantity', $product->quantity ?? '') }}" required>
    </div>
</div>
