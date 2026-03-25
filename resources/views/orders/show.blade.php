<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>عرض الطلب - SallyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">عرض الطلب</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>رقم الطلب:</strong> {{ $order->id }}</p>
                <p><strong>الحالة:</strong> {{ $order->status }}</p>
                <p><strong>المجموع:</strong> {{ number_format($order->total, 2) }}</p>
                <p><strong>عنوان الشحن:</strong> {{ $order->shipping_address ?? 'غير متوفر' }}</p>
                <p><strong>عدد الأصناف:</strong> {{ $order->items->count() }}</p>
                <a class="btn btn-secondary" href="{{ route('orders.index') }}">العودة</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
