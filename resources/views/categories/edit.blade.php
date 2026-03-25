@extends('layouts.app')

@section('title', 'تعديل الفئة - SallyShop')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-header bg-warning text-white border-0">
                    <h3 class="mb-0"><i class="fas fa-edit me-2"></i>تعديل الفئة</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('categories._form')
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-warning"><i class="fas fa-refresh me-2"></i>تحديث</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary"><i
                                    class="fas fa-times me-2"></i>إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
