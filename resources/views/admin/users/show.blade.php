@extends('layouts.app')

@section('title', 'عرض المستخدم - لوحة التحكم')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-user me-2 text-primary"></i>
                عرض المستخدم: {{ $user->name }}
            </h1>
            <div>
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-2"></i>
                    تعديل
                </a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    العودة للمستخدمين
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">معلومات المستخدم</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>الاسم:</strong> {{ $user->name }}</p>
                        <p><strong>البريد الإلكتروني:</strong> {{ $user->email }}</p>
                        <p><strong>الدور:</strong>
                            <span
                                class="badge bg-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'assistant' ? 'warning' : 'secondary') }}">
                                @switch($user->role)
                                    @case('admin')
                                        مدير
                                    @break

                                    @case('assistant')
                                        مساعد
                                    @break

                                    @case('user')
                                        مستخدم
                                    @break
                                @endswitch
                            </span>
                        </p>
                        <p><strong>تاريخ التسجيل:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}</p>
                        <p><strong>آخر نشاط:</strong> {{ $user->updated_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">إحصائيات المستخدم</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>عدد الطلبات:</strong> {{ $user->orders()->count() }}</p>
                        <p><strong>الطلبات المكتملة:</strong> {{ $user->orders()->where('status', 'completed')->count() }}
                        </p>
                        <p><strong>الطلبات المعلقة:</strong> {{ $user->orders()->where('status', 'pending')->count() }}</p>
                    </div>
                </div>

                @if ($user->id != auth()->id())
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="mb-0 text-danger">إجراءات خطيرة</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟ هذا الإجراء لا يمكن التراجع عنه.')">
                                    <i class="fas fa-trash me-2"></i>
                                    حذف المستخدم
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
