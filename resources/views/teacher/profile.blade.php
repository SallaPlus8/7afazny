@extends('layouts.master')
@section('title', __('Profile'))

@section('content')
<div class="container mt-5">
    <h2 class="text-center">{{ __('My Profile') }}</h2>
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body text-center">
            <!-- عرض صورة البروفايل -->
            <img src="{{ $teacher->photo ? asset('images/teachers/' . $teacher->photo) : asset('assets/images/profile-avatar.jpg') }}" 
                 alt="avatar" 
                 class="img-fluid rounded-circle mb-3" 
                 style="width: 150px; height: 150px;">
            
            <!-- عرض بيانات البروفايل -->
            <p><strong>{{ __('Name') }}:</strong> {{ $teacher->name }}</p>
            <p><strong>{{ __('Email') }}:</strong> {{ $teacher->email }}</p>
            <p><strong>{{ __('Joined At') }}:</strong> {{ $teacher->created_at->format('d M, Y') }}</p>

            <!-- زر تعديل البروفايل -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
                {{ __('Edit Profile') }}
            </button>
        </div>
    </div>
</div>

<!-- بوب-أب لتعديل البروفايل -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">{{ __('Edit Profile') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- نموذج التعديل -->
                <form action="{{ route('teacher.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- حقل الاسم -->
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $teacher->name) }}" required>
                    </div>

                    <!-- حقل البريد الإلكتروني -->
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $teacher->email) }}" required>
                    </div>

                    <!-- حقل كلمة المرور الجديدة -->
                    <div class="form-group">
                        <label for="password">{{ __('New Password') }}</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    
                    <!-- حقل تأكيد كلمة المرور -->
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>

                    <!-- حقل تحميل الصورة -->
                    <div class="form-group">
                        <label for="photo">{{ __('Profile Photo') }}</label>
                        <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
