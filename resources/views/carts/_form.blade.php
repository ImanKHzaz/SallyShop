<div class="mb-3">
    <label for="user_id" class="form-label">معرف المستخدم (اختياري)</label>
    <input type="number" class="form-control" id="user_id" name="user_id"
        value="{{ old('user_id', $cart->user_id ?? '') }}">
</div>
<div class="mb-3">
    <label for="status" class="form-label">الحالة</label>
    <select name="status" id="status" class="form-select" required>
        @foreach (['active', 'ordered', 'abandoned'] as $status)
            <option value="{{ $status }}"
                {{ old('status', $cart->status ?? 'active') === $status ? 'selected' : '' }}>{{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>
