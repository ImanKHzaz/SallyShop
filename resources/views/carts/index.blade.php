<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>السلات - SallyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">السلات</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('carts.create') }}" class="btn btn-primary mb-3">إنشاء سلة جديدة</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الحالة</th>
                    <th>المستخدم</th>
                    <th>اجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($carts as $cart)
                    <tr>
                        <td>{{ $cart->id }}</td>
                        <td>{{ $cart->status }}</td>
                        <td>{{ $cart->user?->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('carts.show', $cart) }}" class="btn btn-info btn-sm">عرض</a>
                            <a href="{{ route('carts.edit', $cart) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('carts.destroy', $cart) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('هل تريد حذف هذه السلة؟');">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">لا توجد سلات</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $carts->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
