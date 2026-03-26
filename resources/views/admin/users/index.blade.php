@extends('layouts.app')

@section('title', 'إدارة المستخدمين - لوحة التحكم')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-users me-2 text-primary"></i>
                إدارة المستخدمين
            </h1>
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>
                إضافة مستخدم جديد
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>البريد الإلكتروني</th>
                                <th>الدور</th>
                                <th>تاريخ التسجيل</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
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
                                    </td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $user) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i> عرض
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-edit"></i> تعديل
                                        </a>
                                        @if ($user->id != auth()->id())
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                                                    <i class="fas fa-trash"></i> حذف
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
