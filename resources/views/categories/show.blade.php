<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>عرض الفئة - SallyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">عرض الفئة</h1>

        <div class="card">
            <div class="card-body">
                <h3>{{ $category->name }}</h3>
                <p><strong>Slug:</strong> {{ $category->slug }}</p>
                <p><strong>عدد المنتجات:</strong> {{ $category->products->count() }}</p>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">العودة</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
