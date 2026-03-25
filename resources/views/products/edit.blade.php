@extends('layouts.app')

@section('title', 'تعديل منتج - SallyShop')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h3 class="mb-0"><i class="fas fa-edit me-2"></i>تعديل المنتج: {{ $product->name }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('products._form')
                        <div class="mt-4 d-flex gap-2">
                            <button class="btn btn-warning"><i class="fas fa-save me-2"></i>تحديث</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary"><i
                                    class="fas fa-times me-2"></i>إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
