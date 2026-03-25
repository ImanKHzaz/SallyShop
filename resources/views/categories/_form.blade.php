<div class="mb-4">
    <label for="name" class="form-label fw-bold"><i class="fas fa-tag me-2 text-success"></i>اسم الفئة</label>
    <input type="text" class="form-control form-control-lg" id="name" name="name"
        value="{{ old('name', $category->name ?? '') }}" placeholder="أدخل اسم الفئة" required>
    @error('name')
        <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label for="slug" class="form-label fw-bold"><i class="fas fa-link me-2 text-info"></i>الرابط (Slug)</label>
    <input type="text" class="form-control form-control-lg" id="slug" name="slug"
        value="{{ old('slug', $category->slug ?? '') }}" placeholder="أدخل الرابط المختصر" required>
    <small class="text-muted"><i class="fas fa-info-circle me-1"></i>سيُستخدم في عنوان الويب</small>
    @error('slug')
        <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
    @enderror
</div>
