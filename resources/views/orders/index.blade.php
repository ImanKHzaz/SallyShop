<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>الطلبات - SallyShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">الطلبات</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">إنشاء طلب جديد</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الحالة</th>
                    <th>المجموع</th>
                    <th>اجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ number_format($order->total, 2) }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm">عرض</a>
                            <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('حذف الطلب؟');">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">لا توجد طلبات</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
