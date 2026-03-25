<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>إدارة المنتجات - SallyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">قائمة المنتجات</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-primary">إضافة منتج جديد</a>
            <a href="/" class="btn btn-secondary">الصفحة الرئيسية</a>
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الوصف</th>
                                <th>السعر</th>
                                <th>الكمية</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ Str::limit($product->description, 50) }}</td>
                                    <td>{{ number_format($product->price, 2) }} ر.س</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product) }}"
                                            class="btn btn-sm btn-info">عرض</a>
                                        <a href="{{ route('products.edit', $product) }}"
                                            class="btn btn-sm btn-warning">تعديل</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">لا توجد منتجات حتى الآن</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">{{ $products->links() }}</div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
</body>

</html>
