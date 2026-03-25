@extends('layouts.app')

@section('title', 'إضافة منتج - SallyShop')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0"><i class="fas fa-plus me-2"></i>إضافة منتج جديد</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        @include('products._form')
                        <div class="mt-4 d-flex gap-2">
                            <button class="btn btn-success"><i class="fas fa-save me-2"></i>حفظ</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary"><i
                                    class="fas fa-times me-2"></i>إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
