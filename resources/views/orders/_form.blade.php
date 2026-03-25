<div class="mb-4">
    <label for="user_id" class="form-label fw-bold"><i class="fas fa-user me-2 text-primary"></i>معرف المستخدم
        (اختياري)</label>
    <input type="number" class="form-control form-control-lg" id="user_id" name="user_id"
        value="{{ old('user_id', $order->user_id ?? '') }}" placeholder="أدخل معرف المستخدم">
    @error('user_id')
        <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label for="cart_id" class="form-label fw-bold"><i class="fas fa-shopping-cart me-2 text-info"></i>معرف السلة
        (اختياري)</label>
    <input type="number" class="form-control form-control-lg" id="cart_id" name="cart_id"
        value="{{ old('cart_id', $order->cart_id ?? '') }}" placeholder="أدخل معرف السلة">
    @error('cart_id')
        <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label for="status" class="form-label fw-bold"><i class="fas fa-ring me-2 text-warning"></i>الحالة</label>
    <select name="status" id="status" class="form-select form-select-lg" required>
        <option value="">-- اختر الحالة --</option>
        @foreach (['pending' => 'قيد التوقع', 'processing' => 'قيد المعالجة', 'completed' => 'مكتمل', 'cancelled' => 'ملغى'] as $value => $label)
            <option value="{{ $value }}" {{ old('status', $order->status ?? '') === $value ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
    @error('status')
        <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <label for="total" class="form-label fw-bold"><i class="fas fa-dollar-sign me-2 text-success"></i>الإجمالي
            (ر.س)</label>
        <input type="number" step="0.01" min="0" class="form-control form-control-lg" id="total"
            name="total" value="{{ old('total', $order->total ?? '') }}" placeholder="0.00" required>
        @error('total')
            <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-4">
    <label for="shipping_address" class="form-label fw-bold"><i class="fas fa-map-marker-alt me-2 text-danger"></i>عنوان
        الشحن</label>
    <textarea class="form-control form-control-lg" id="shipping_address" name="shipping_address" rows="3"
        placeholder="أدخل عنوان الشحن">{{ old('shipping_address', $order->shipping_address ?? '') }}</textarea>
    @error('shipping_address')
        <div class="alert alert-danger mt-2"><i class="fas fa-exclamation-circle me-2"></i>{{ $message }}</div>
    @enderror
</div>
