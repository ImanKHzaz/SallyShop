<div class="mb-3">
    <label for="user_id" class="form-label">معرف المستخدم (اختياري)</label>
    <input type="number" class="form-control" id="user_id" name="user_id"
        value="{{ old('user_id', $order->user_id ?? '') }}">
</div>

<div class="mb-3">
    <label for="cart_id" class="form-label">معرف السلة (اختياري)</label>
    <input type="number" class="form-control" id="cart_id" name="cart_id"
        value="{{ old('cart_id', $order->cart_id ?? '') }}">
</div>

<div class="mb-3">
    <label for="status" class="form-label">الحالة</label>
    <select name="status" id="status" class="form-select" required>
        @foreach (['pending', 'processing', 'completed', 'cancelled'] as $status)
            <option value="{{ $status }}"
                {{ old('status', $order->status ?? 'pending') === $status ? 'selected' : '' }}>{{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="total" class="form-label">الإجمالي</label>
    <input type="number" step="0.01" min="0" class="form-control" id="total" name="total"
        value="{{ old('total', $order->total ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="shipping_address" class="form-label">عنوان الشحن</label>
    <textarea class="form-control" id="shipping_address" name="shipping_address">{{ old('shipping_address', $order->shipping_address ?? '') }}</textarea>
</div>
