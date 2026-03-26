@extends('layouts.app')

@section('title', 'السلة الشرائية - SallyShop')

@section('content')
    <div class="container">
        <h1 class="mb-4"><i class="fas fa-shopping-cart me-2"></i>السلة الشرائية</h1>

        @if ($cart && $cart->items->count() > 0)
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>المنتج</th>
                                            <th>السعر</th>
                                            <th>الكمية</th>
                                            <th>الإجمالي</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart->items as $item)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('products.show', $item->product) }}"
                                                        class="text-primary">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </td>
                                                <td>{{ number_format($item->price, 2) }} ر.س</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td class="fw-bold">{{ number_format($item->quantity * $item->price, 2) }}
                                                    ر.س</td>
                                                <td>
                                                    <form action="{{ route('cart.remove', $item) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="حذف">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">ملخص السلة</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span>عدد العناصر:</span>
                                <strong>{{ $cart->items->count() }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>الإجمالي:</span>
                                <strong class="text-success fs-5">
                                    {{ number_format($cart->items->sum(fn($item) => $item->quantity * $item->price), 2) }}
                                    ر.س
                                </strong>
                            </div>
                            <hr>
                            <a href="{{ route('checkout.index') }}" class="btn btn-success w-100">
                                <i class="fas fa-credit-card me-2"></i>متابعة الدفع
                            </a>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary w-100 mt-2">
                                <i class="fas fa-shopping-bag me-2"></i>العودة للتسوق
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center py-5">
                <i class="fas fa-inbox fa-4x mb-3"></i>
                <p class="h5 mt-3">السلة فارغة</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-shopping-bag me-2"></i>العودة للتسوق
                </a>
            </div>
        @endif
    </div>
@endsection
