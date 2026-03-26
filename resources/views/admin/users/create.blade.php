@extends('layouts.app')

@section('title', 'إضافة مستخدم جديد - لوحة التحكم')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-user-plus me-2 text-primary"></i>
                إضافة مستخدم جديد
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
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">الاسم</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">كلمة المرور</label>
                                <input type="password" name="password" class="form-control" required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">الدور</label>
                                <select name="role" class="form-control" required>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>مستخدم</option>
                                    <option value="assistant" {{ old('role') == 'assistant' ? 'selected' : '' }}>مساعد
                                    </option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>مدير</option>
                                </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                إضافة المستخدم
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
