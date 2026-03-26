@extends('layouts.app')

@section('title', 'تعديل المستخدم - لوحة التحكم')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-user-edit me-2 text-primary"></i>
                تعديل المستخدم: {{ $user->name }}
            </h1>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                العودة للمستخدمين
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">معلومات المستخدم</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">الاسم</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">كلمة المرور (اتركها فارغة إذا لم تريد تغييرها)</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">الدور</label>
                                <select name="role" class="form-control" required>
                                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>مستخدم
                                    </option>
                                    <option value="assistant"
                                        {{ old('role', $user->role) == 'assistant' ? 'selected' : '' }}>مساعد</option>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>مدير
                                    </option>
                                </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                حفظ التغييرات
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
