<div class="mb-4">
    <label for="name" class="form-label fw-bold"><i class="fas fa-box me-2 text-primary"></i>اسم المنتج</label>
    <input type="text" class="form-control form-control-lg" id="name" name="name"
        value="{{ old('name', $product->name ?? '') }}" placeholder="أدخل اسم المنتج" required>
</div>

<div class="mb-4">
    <label for="category_id" class="form-label fw-bold"><i class="fas fa-tag me-2 text-success"></i>الفئة</label>
    <select name="category_id" id="category_id" class="form-select form-select-lg">
        <option value="">-- بدون فئة --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label for="description" class="form-label fw-bold"><i class="fas fa-align-left me-2 text-info"></i>الوصف</label>
    <textarea class="form-control" id="description" name="description" rows="4" placeholder="وصف المنتج">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <label for="price" class="form-label fw-bold"><i class="fas fa-dollar-sign me-2 text-warning"></i>السعر
            (ر.س)</label>
        <input type="number" step="0.01" min="0" class="form-control form-control-lg" id="price"
            name="price" value="{{ old('price', $product->price ?? '') }}" placeholder="0.00" required>
    </div>
    <div class="col-md-6 mb-4">
        <label for="quantity" class="form-label fw-bold"><i class="fas fa-cubes me-2 text-danger"></i>الكمية</label>
        <input type="number" min="0" class="form-control form-control-lg" id="quantity" name="quantity"
            value="{{ old('quantity', $product->quantity ?? '') }}" placeholder="0" required>
    </div>
</div>
