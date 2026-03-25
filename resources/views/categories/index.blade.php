<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>الفئات - SallyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">إدارة الفئات</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">إضافة فئة جديدة</a>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3 ms-2">المنتجات</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>السلج</th>
                    <th>اجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-info btn-sm">عرض</a>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('حذف الفئة؟');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">لا توجد فئات بعد</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
