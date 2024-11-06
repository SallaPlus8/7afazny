@extends('layouts.master')
@section('title', __('My Students'))

@section('content')
<div class="container mt-5">
    <h2 class="text-center">{{ __('My Students') }}</h2>

    @if($students->isEmpty())
        <div class="alert alert-warning text-center">
            {{ __('No students found') }}
        </div>
    @else
        <div class="d-flex flex-wrap justify-content-center">
            @foreach($students as $student)
                <div class="text-center m-3" style="width: 150px;">
                    <div class="student-circle" data-toggle="modal" data-target="#studentModal{{ $student->id }}" style="cursor: pointer;">
                        <!-- صورة الطالب بشكل دائري -->
                        <img src="https://6c5700edc75e6c62f919-3807c2bf84f2548b953876f1e4affb47.ssl.cf2.rackcdn.com/nlpa_b0e52e6ec3ca94a5657719e72384313d.png" 
                             alt="{{ $student->name }}" 
                             class="rounded-circle img-fluid" 
                             style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <h5 class="mt-2">{{ $student->name }}</h5>
                </div>

                <!-- بوب-أب لعرض التفاصيل وتعديل أو حذف الطالب -->
                <div class="modal fade" id="studentModal{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel{{ $student->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="studentModalLabel{{ $student->id }}">{{ $student->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <!-- صورة الطالب بشكل دائري داخل البوب-أب -->
                                <img src="https://6c5700edc75e6c62f919-3807c2bf84f2548b953876f1e4affb47.ssl.cf2.rackcdn.com/nlpa_b0e52e6ec3ca94a5657719e72384313d.png" 
                                     alt="{{ $student->name }}" 
                                     class="rounded-circle img-fluid mb-3" 
                                     style="width: 200px; height: 200px; object-fit: cover;">
                                <p><strong>{{ __('Gender') }}:</strong> {{ $student->gender }}</p>
                                <p><strong>{{ __('Email') }}:</strong> {{ $student->email ?? __('No description available') }}</p>
                            </div>
                            <div class="modal-footer">
                                <!-- زر التعديل -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editStudentModal{{ $student->id }}" data-dismiss="modal">{{ __('Edit') }}</button>
                                
                                <!-- زر الحذف -->
                                <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                </form>
                                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- بوب-أب للتعديل -->
                <div class="modal fade" id="editStudentModal{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel{{ $student->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStudentModalLabel{{ $student->id }}">{{ __('Edit Student') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- نموذج التعديل -->
                                <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">{{ __('Gender') }}</label>
                                        <select id="gender" class="form-control" name="gender">
                                            <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                            <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
