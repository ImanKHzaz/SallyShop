@extends('layouts.app')

@section('title', 'تأكيد الطلب - SallyShop')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- رسالة النجاح -->
                <div class="alert alert-success text-center mb-4" role="alert">
                    <i class="fas fa-check-circle fa-3x mb-3"></i>
                    <h4 class="alert-heading">تم إنشاء الطلب بنجاح!</h4>
                    <p>شكراً لك على تسوقك معنا. سيتم معالجة طلبك قريباً.</p>
                </div>

                <!-- تفاصيل الطلب -->
                <div class="card border-0 mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-receipt me-2"></i>تفاصيل الطلب #{{ $order->id }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p class="mb-2">
                                    <i class="fas fa-calendar me-2 text-muted"></i>
                                    <strong>تاريخ الطلب:</strong> {{ $order->created_at->format('Y-m-d H:i') }}
                                </p>
                                <p class="mb-2">
                                    <i class="fas fa-ring me-2 text-muted"></i>
                                    <strong>الحالة:</strong> <span class="badge bg-warning">{{ $order->status }}</span>
                                </p>
                                <p>
                                    <i class="fas fa-credit-card me-2 text-muted"></i>
                                    <strong>حالة الدفع:</strong> <span
                                        class="badge {{ $order->payment_status === 'completed' ? 'bg-success' : 'bg-info' }}">
                                        {{ $order->payment_status === 'completed' ? 'مكتمل' : 'قيد الانتظار' }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">
                                    <i class="fas fa-money-bill me-2 text-muted"></i>
                                    <strong>طريقة الدفع:</strong>
                                    {{ $order->payment_method === 'sham_cash' ? 'شام كاش' : 'الدفع عند التسليم' }}
                                </p>
                                <p class="mb-2">
                                    <i class="fas fa-phone me-2 text-muted"></i>
                                    <strong>رقم الهاتف:</strong> {{ $order->country_code }} {{ $order->phone_number }}
                                </p>
                                <p>
                                    <i class="fas fa-map-marker-alt me-2 text-muted"></i>
                                    <strong>عنوان التسليم:</strong> {{ $order->shipping_address }}
                                </p>
                            </div>
                        </div>

                        <hr>

                        <!-- المنتجات المطلوبة -->
                        <h6 class="mb-3"><i class="fas fa-box me-2 text-info"></i>المنتجات:</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th>المنتج</th>
                                        <th>السعر</th>
                                        <th>الكمية</th>
                                        <th>الإجمالي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product->name ?? 'منتج محذوف' }}</td>
                                            <td>{{ number_format($item->unit_price, 2) }} ر.س</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td class="fw-bold">{{ number_format($item->quantity * $item->unit_price, 2) }}
                                                ر.س</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <!-- الإجمالي -->
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>المجموع الفرعي:</span>
                                    <span>{{ number_format($order->total, 2) }} ر.س</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>الشحن:</span>
                                    <span class="badge bg-success">مجاني</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fs-5">
                                    <strong>الإجمالي:</strong>
                                    <strong class="text-success">{{ number_format($order->total, 2) }} ر.س</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- معلومات إضافية -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="card border-0 bg-light">
                            <div class="card-body text-center">
                                <i class="fas fa-truck fa-2x text-primary mb-2"></i>
                                <h6>سيتم التسليم قريباً</h6>
                                <p class="small text-muted mb-0">سنتصل بك على الرقم المسجل قبل التسليم</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 bg-light">
                            <div class="card-body text-center">
                                <i class="fas fa-shield-alt fa-2x text-success mb-2"></i>
                                <h6>محمي وآمن</h6>
                                <p class="small text-muted mb-0">معاملتك آمنة وسرية بنسبة 100%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- أزرار الإجراءات -->
                <div class="d-flex gap-2 justify-content-center">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-shopping-bag me-2"></i>استمرار التسوق
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-home me-2"></i>العودة للصفحة الرئيسية
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
