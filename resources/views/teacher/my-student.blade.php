<!-- resources/views/students/my-student.blade.php -->

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

                <!-- بوب-أب لعرض التفاصيل -->
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
