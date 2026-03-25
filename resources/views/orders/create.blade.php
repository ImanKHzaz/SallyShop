@extends('layouts.app')

@section('title', 'إنشاء طلب جديد - SallyShop')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-header bg-primary text-white border-0">
                    <h3 class="mb-0"><i class="fas fa-plus me-2"></i>إنشاء طلب جديد</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        @include('orders._form')
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save me-2"></i>حفظ</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary"><i
                                    class="fas fa-times me-2"></i>إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
