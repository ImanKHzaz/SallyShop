@extends('layouts.app')

@section('title', 'عرض السلة - SallyShop')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-header bg-info text-white border-0">
                    <h3 class="mb-0"><i class="fas fa-eye me-2"></i>عرض السلة</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center mb-3">
                            <i class="fas fa-shopping-cart fa-5x text-primary"></i>
                        </div>
                        <div class="col-md-9">
                            <h4 class="text-primary mb-3">السلة رقم {{ $cart->id }}</h4>
                            <hr>
                            <p><i class="fas fa-ring me-2 text-muted"></i><strong>الحالة:</strong>
                                <span
                                    class="badge {{ $cart->status === 'active' ? 'bg-success' : ($cart->status === 'ordered' ? 'bg-info' : 'bg-warning') }}">
                                    {{ $cart->status }}
                                </span>
                            </p>
                            <p><i class="fas fa-user me-2 text-muted"></i><strong>المستخدم:</strong>
                                {{ $cart->user?->name ?? 'لا يوجد' }}</p>
                            <p><i class="fas fa-list me-2 text-muted"></i><strong>عدد العناصر:</strong>
                                {{ $cart->items->count() }}</p>
                            <p><i class="fas fa-calendar me-2 text-muted"></i><strong>تاريخ الإنشاء:</strong>
                                {{ $cart->created_at->format('Y-m-d H:i') }}</p>
                            <p><i class="fas fa-clock me-2 text-muted"></i><strong>منذ:</strong>
                                {{ $cart->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex gap-2">
                        <a href="{{ route('carts.index') }}" class="btn btn-secondary"><i
                                class="fas fa-arrow-left me-2"></i>العودة للقائمة</a>
                        <a href="{{ route('carts.edit', $cart) }}" class="btn btn-warning"><i
                                class="fas fa-edit me-2"></i>تعديل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
