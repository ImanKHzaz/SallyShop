<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>الصفحة الرئيسية - SallyShop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-z0Y/6hr0fDQi1H+yKgnWojH3O8NQ8twNnYQxJGl+CHQvy+R2AhwV/8wZY1xtz8KP" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
            min-height: 100vh;
        }
        .hero {
            background: rgba(255, 255, 255, .9);
            border-radius: 28px;
            box-shadow: 0 16px 40px rgba(0,0,0,.12);
        }
        .card-shadow {
            box-shadow: 0 8px 20px rgba(0,0,0,.08);
            border: none;
        }
        .btn-primary {
            background: #0d6efd;
            border: 1px solid #0d6efd;
        }
        .btn-primary:hover {
            background: #0b5ed7;
            border-color: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <header class="hero p-5 mb-5 text-center">
            <h1 class="display-5 fw-bold">مرحبا بك في SallyShop</h1>
            <p class="lead">متجرك الإلكتروني العربي مع تجربة مستخدم مميزة وسهلة التنقل.</p>
            <div class="d-flex justify-content-center gap-2">
                <a href="#products" class="btn btn-lg btn-primary">تسوق الآن</a>
                <a href="#features" class="btn btn-lg btn-outline-primary">استكشف المميزات</a>
            </div>
        </header>

        <section id="features" class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card card-shadow p-4">
                    <div class="h5">واجهة عربية كاملة</div>
                    <p>تصميم يدعم اتجاه RTL وخط عربي جميل لتجربة مستخدم سلسة.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-shadow p-4">
                    <div class="h5">إدارة منتجات سهلة</div>
                    <p>أضف، حرر، احذف منتجات بقاعدة بيانات منظمة وسرعة في الاستجابة.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-shadow p-4">
                    <div class="h5">دعم عربة تسوق</div>
                    <p>خطوات بسيطة لإنشاء عربة تسوق دفعات وطلب واحد. مثالي لمشروع إلكتروني.</p>
                </div>
            </div>
        </section>

        <section id="products" class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card card-shadow h-100">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="منتج 1">
                    <div class="card-body">
                        <h5 class="card-title">منتج مميز 1</h5>
                        <p class="card-text">سعر ممتاز، جودة عالية، وتوصيل سريع إلى باب منزلك.</p>
                        <a href="#" class="btn btn-primary">أضف للسلة</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-shadow h-100">
                    <img src="https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="منتج 2">
                    <div class="card-body">
                        <h5 class="card-title">منتج مميز 2</h5>
                        <p class="card-text">تصميم عصري، ومواصفات تناسب الاستخدام اليومي والاحترافي.</p>
                        <a href="#" class="btn btn-primary">أضف للسلة</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-shadow h-100">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="منتج 3">
                    <div class="card-body">
                        <h5 class="card-title">منتج مميز 3</h5>
                        <p class="card-text">مثالي للأعمال والأنشطة اليومية. مع دعم فني متميز بعد الشراء.</p>
                        <a href="#" class="btn btn-primary">أضف للسلة</a>
                    </div>
                </div>
            </div>
        </section>

        <footer class="text-center mt-5 py-4 text-muted">
            &copy; 2026 SallyShop. جميع الحقوق محفوظة.
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-0EVHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"></script>
</body>
</html>