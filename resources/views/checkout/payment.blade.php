@extends('layouts.app')

@section('title', 'معالجة الدفع - SallyShop')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-gradient-primary text-white text-center py-4">
                        <h2 class="mb-0">
                            <i class="fas fa-credit-card me-2"></i>
                            معالجة الدفع
                        </h2>
                        <p class="mb-0 mt-2">يرجى الانتظار بينما نقوم بمعالجة طلبك...</p>
                    </div>

                    <div class="card-body p-5">
                        <!-- مؤشر التحميل -->
                        <div class="text-center mb-4">
                            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                                <span class="visually-hidden">جاري المعالجة...</span>
                            </div>
                            <h4 class="mt-3 text-muted">جاري معالجة الدفع</h4>
                            <p class="text-muted">لا تغلق هذه الصفحة</p>
                        </div>

                        <!-- خطوات المعالجة -->
                        <div class="mb-4">
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                    role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted">
                                    <i class="fas fa-check-circle text-success me-1"></i>
                                    التحقق من البيانات
                                </small>
                                <small class="text-muted">
                                    <i class="fas fa-spinner fa-spin text-primary me-1"></i>
                                    معالجة الدفع
                                </small>
                                <small class="text-muted">
                                    <i class="fas fa-clock text-warning me-1"></i>
                                    إكمال الطلب
                                </small>
                            </div>
                        </div>

                        <!-- معلومات الطلب -->
                        <div class="alert alert-info">
                            <h5 class="alert-heading">
                                <i class="fas fa-info-circle me-2"></i>
                                معلومات الطلب
                            </h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>رقم الطلب:</strong> #{{ $order->id ?? 'غير محدد' }}</p>
                                    <p class="mb-1"><strong>المجموع الكلي:</strong>
                                        {{ number_format($order->total ?? 0, 2) }} ر.س</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>طريقة الدفع:</strong>
                                        @if ($order->payment_method ?? '' == 'sham_cash')
                                            شام كاش
                                        @elseif($order->payment_method ?? '' == 'cod')
                                            الدفع عند التسليم
                                        @else
                                            غير محدد
                                        @endif
                                    </p>
                                    <p class="mb-1"><strong>حالة الدفع:</strong>
                                        <span
                                            class="badge bg-{{ $order->payment_status ?? 'secondary' == 'completed' ? 'success' : 'warning' }}">
                                            {{ $order->payment_status ?? 'معلق' }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- رسالة نجاح -->
                        <div class="text-center">
                            <div class="alert alert-success d-none" id="successMessage">
                                <i class="fas fa-check-circle fa-2x text-success mb-3"></i>
                                <h5>تم معالجة الدفع بنجاح!</h5>
                                <p>سيتم توجيهك إلى صفحة التأكيد خلال لحظات...</p>
                            </div>
                        </div>

                        <!-- زر العودة (في حالة فشل) -->
                        <div class="text-center d-none" id="errorSection">
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle fa-2x text-danger mb-3"></i>
                                <h5>حدث خطأ في معالجة الدفع</h5>
                                <p>يرجى المحاولة مرة أخرى أو الاتصال بالدعم</p>
                            </div>
                            <a href="{{ route('checkout.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left me-2"></i>
                                العودة إلى الدفع
                            </a>
                        </div>
                    </div>

                    <div class="card-footer bg-light text-center py-3">
                        <small class="text-muted">
                            <i class="fas fa-shield-alt me-1"></i>
                            جميع المعاملات محمية وآمنة
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript لمحاكاة المعالجة -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                // إخفاء مؤشر التحميل
                document.querySelector('.spinner-border').style.display = 'none';
                document.querySelector('h4').style.display = 'none';
                document.querySelector('p.text-muted').style.display = 'none';

                // عرض رسالة النجاح
                document.getElementById('successMessage').classList.remove('d-none');

                // توجيه إلى التأكيد بعد 3 ثوانٍ
                setTimeout(function() {
                    window.location.href = '{{ route('checkout.confirmation', $order->id ?? '') }}';
                }, 3000);
            }, 3000); // محاكاة 3 ثوانٍ للمعالجة
        });
    </script>
@endsection

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .progress-bar-animated {
        animation: progress-bar-stripes 1s linear infinite;
    }

    @keyframes progress-bar-stripes {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: 40px 0;
        }
    }
</style>
