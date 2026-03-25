@extends('layouts.app')

@section('title', 'الصفحة الرئيسية - SallyShop')

@section('content')
    <div class="hero-section text-center text-white">
        <h1 class="display-4 fw-bold mb-3"><i class="fas fa-star me-2"></i>مرحبا بك في SallyShop</h1>
        <p class="lead mb-4">متجرك الإلكتروني العربي مع تجربة مستخدم مميزة وسهلة التنقل.</p>

        @auth
            <div class="mb-4">
                <p class="lead">أنت مسجل دخول كـ <span class="badge bg-light text-dark">{{ Auth::user()->role }}</span></p>
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <a href="{{ route('products.index') }}" class="btn btn-light btn-lg text-primary"><i
                            class="fas fa-box me-2"></i>المنتجات</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-light btn-lg text-success"><i
                            class="fas fa-tags me-2"></i>الفئات</a>
                    <a href="{{ route('carts.index') }}" class="btn btn-light btn-lg text-warning"><i
                            class="fas fa-shopping-cart me-2"></i>السلات</a>
                    <a href="{{ route('orders.index') }}" class="btn btn-light btn-lg text-info"><i
                            class="fas fa-receipt me-2"></i>الطلبات</a>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('login') }}" class="btn btn-light btn-lg text-primary"><i
                        class="fas fa-sign-in-alt me-2"></i>تسجيل دخول</a>
                <a href="{{ route('register') }}" class="btn btn-light btn-lg text-success"><i
                        class="fas fa-user-plus me-2"></i>تسجيل حساب</a>
            </div>
        @endauth

        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="#products" class="btn btn-primary btn-lg"><i class="fas fa-shopping-bag me-2"></i>تسوق الآن</a>
            <a href="#features" class="btn btn-secondary btn-lg"><i class="fas fa-info-circle me-2"></i>استكشف المميزات</a>
        </div>
    </div>

    <section id="features" class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <i class="fas fa-globe fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">واجهة عربية كاملة</h5>
                    <p class="card-text">تصميم يدعم اتجاه RTL وخط عربي جميل لتجربة مستخدم سلسة.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <i class="fas fa-cogs fa-3x text-success mb-3"></i>
                    <h5 class="card-title">إدارة منتجات سهلة</h5>
                    <p class="card-text">أضف، حرر، احذف منتجات بقاعدة بيانات منظمة وسرعة في الاستجابة.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <i class="fas fa-shopping-cart fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">دعم عربة تسوق</h5>
                    <p class="card-text">خطوات بسيطة لإنشاء عربة تسوق دفعات وطلب واحد. مثالي لمشروع إلكتروني.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="products" class="mb-5">
        <h2 class="text-center text-white mb-4"><i class="fas fa-boxes me-2"></i>أحدث المنتجات</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse(\App\Models\Product::latest()->take(6)->get() as $product)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-box fa-4x text-primary mb-3"></i>
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="text-primary fw-bold">{{ number_format($product->price, 2) }} ر.س</p>
                            <p class="text-muted">الكمية: {{ $product->quantity }}</p>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary"><i
                                    class="fas fa-eye me-2"></i>عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card text-center p-5">
                        <div class="card-body">
                            <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                            <h5 class="card-title">لا توجد منتجات حالياً</h5>
                            <p class="card-text">أضف بعض المنتجات لتبدأ التسوق!</p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary"><i
                                    class="fas fa-plus me-2"></i>إضافة منتج</a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        @if (\App\Models\Product::count() > 6)
            <div class="text-center mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg"><i
                        class="fas fa-list me-2"></i>عرض
                    جميع المنتجات</a>
            </div>
        @endif
    </section>
@endsection
