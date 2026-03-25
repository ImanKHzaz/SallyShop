<div class="mb-4">
    <label for="user_id" class="form-label fw-bold"><i class="fas fa-user me-2 text-primary"></i>معرف المستخدم
        (اختياري)</label>
    <input type="number" class="form-control form-control-lg" id="user_id" name="user_id"
        value="{{ old('user_id', $cart->user_id ?? '') }}" placeholder="أدخل معرف المستخدم">
    @error('user_id')
        <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label for="status" class="form-label fw-bold"><i class="fas fa-ring me-2 text-info"></i>الحالة</label>
    <select name="status" id="status" class="form-select form-select-lg" required>
        <option value="">-- اختر الحالة --</option>
        @foreach (['active' => 'نشطة', 'ordered' => 'مطلوبة', 'abandoned' => 'مهجورة'] as $value => $label)
            <option value="{{ $value }}" {{ old('status', $cart->status ?? '') === $value ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
    @error('status')
        <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
    @enderror
</div>
