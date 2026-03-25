<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>عرض المنتج - SallyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">عرض المنتج</h1>

        <div class="card">
            <div class="card-body">
                <h3>{{ $product->name }}</h3>
                <p><strong>الوصف:</strong> {{ $product->description ?: 'لا يوجد وصف' }}</p>
                <p><strong>السعر:</strong> {{ number_format($product->price, 2) }} ر.س</p>
                <p><strong>الكمية:</strong> {{ $product->quantity }}</p>
                <p><strong>تاريخ الإضافة:</strong> {{ $product->created_at->diffForHumans() }}</p>

                <a href="{{ route('products.index') }}" class="btn btn-secondary">العودة</a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">تعديل</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
