@extends('layouts.app')

@section('title', 'الدفع - SallyShop')

@section('content')
    <div class="container">
        <h1 class="mb-4"><i class="fas fa-credit-card me-2"></i>معلومات الدفع</h1>

        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">تفاصيل الطلب</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('checkout.process') }}" method="POST">
                            @csrf

                            <!-- طريقة الدفع -->
                            <div class="mb-4">
                                <label class="form-label fw-bold"><i class="fas fa-money-bill me-2 text-success"></i>طريقة
                                    الدفع</label>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method"
                                                id="sham_cash" value="sham_cash" required>
                                            <label class="form-check-label" for="sham_cash">
                                                <i class="fas fa-wallet me-2 text-warning"></i>شام كاش
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method"
                                                id="cod" value="cod" checked required>
                                            <label class="form-check-label" for="cod">
                                                <i class="fas fa-truck me-2 text-info"></i>الدفع عند التسليم
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @error('payment_method')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- رمز الدولة ورقم الهاتف -->
                            <div class="mb-4">
                                <label class="form-label fw-bold"><i class="fas fa-phone me-2 text-primary"></i>رقم
                                    الهاتف</label>
                                <div class="input-group">
                                    <select name="country_code" class="form-select" style="max-width: 150px;" required>
                                        <option value="" disabled selected>رمز الدولة</option>
                                        <option value="+966">🇸🇦 +966 (السعودية)</option>
                                        <option value="+971">🇦🇪 +971 (الإمارات)</option>
                                        <option value="+962">🇯🇴 +962 (الأردن)</option>
                                        <option value="+961">🇱🇧 +961 (لبنان)</option>
                                        <option value="+970">🇵🇸 +970 (فلسطين)</option>
                                        <option value="+20">🇪🇬 +20 (مصر)</option>
                                    </select>
                                    <input type="number" name="phone_number" class="form-control"
                                        placeholder="رقم الهاتف بدون رمز الدولة" required pattern="\d{9,15}">
                                </div>
                                <small class="text-muted d-block mt-2">
                                    <i class="fas fa-info-circle me-1"></i>أدخل رقم الهاتف بدون رمز الدولة (9 إلى 15 رقم)
                                </small>
                                @error('country_code')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                @error('phone_number')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ملخص المنتجات -->
                            <div class="mb-4">
                                <label class="form-label fw-bold"><i class="fas fa-list me-2 text-info"></i>المنتجات
                                    المطلوبة</label>
                                <div class="list-group">
                                    @foreach ($cart->items as $item)
                                        <div class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                    <small class="text-muted">الكمية: {{ $item->quantity }}</small>
                                                </div>
                                                <span
                                                    class="badge bg-success">{{ number_format($item->quantity * $item->price, 2) }}
                                                    ر.س</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <hr>

                            <!-- أزرار -->
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success btn-lg flex-grow-1">
                                    <i class="fas fa-check-circle me-2"></i>إكمال الطلب
                                </button>
                                <a href="{{ route('cart.index') }}" class="btn btn-secondary btn-lg">
                                    <i class="fas fa-arrow-left me-2"></i>العودة
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ملخص السلة -->
            <div class="col-lg-4">
                <div class="card border-0">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">ملخص الطلب</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span>عدد المنتجات:</span>
                            <strong>{{ $cart->items->count() }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>عدد العناصر:</span>
                            <strong>{{ $cart->items->sum('quantity') }}</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="fs-5">الإجمالي:</span>
                            <span class="fs-5 fw-bold text-success">{{ number_format($total, 2) }} ر.س</span>
                        </div>
                    </div>
                </div>

                <!-- معلومات السلامة -->
                <div class="alert alert-info mt-4">
                    <i class="fas fa-shield-alt me-2"></i>
                    <strong>آمن وموثوق</strong>
                    <p class="mb-0 mt-2 small">جميع معلومات الدفع والشحن محمية وآمنة.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
