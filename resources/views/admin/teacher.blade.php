@extends('layouts.master')
@section('title', __('All Teachers'))

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">{{ __('All Teachers') }}</h2>

    @if($teachers->isEmpty())
        <div class="alert alert-warning text-center">
            {{ __('No teachers found') }}
        </div>
    @else
        <div class="row">
            @foreach($teachers as $teacher)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ $teacher->photo ? asset('images/teachers/' . $teacher->photo) : asset('assets/images/default-avatar.jpg') }}" 
                             alt="{{ $teacher->name }}" 
                             class="card-img-top rounded-circle mx-auto mt-3" 
                             style="width: 150px; height: 150px; object-fit: cover;">

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $teacher->name }}</h5>
                            <p class="card-text">{{ $teacher->email }}</p>
                            <p class="card-text"><strong>{{ __('Topic') }}:</strong> {{ $teacher->topic ?? __('Not specified') }}</p>

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#teacherModal{{ $teacher->id }}">
                                {{ __('View Profile') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="teacherModal{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="teacherModalLabel{{ $teacher->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="teacherModalLabel{{ $teacher->id }}">{{ __('Teacher Details') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <img src="{{ $teacher->photo ? asset('images/teachers/' . $teacher->photo) : asset('assets/images/default-avatar.jpg') }}" 
                                         alt="{{ $teacher->name }}" 
                                         class="rounded-circle" 
                                         style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                                <p><strong>{{ __('Name') }}:</strong> {{ $teacher->name }}</p>
                                <p><strong>{{ __('Email') }}:</strong> {{ $teacher->email }}</p>
                                <p><strong>{{ __('Phone') }}:</strong> {{ $teacher->phone ?? __('Not specified') }}</p>
                                <p><strong>{{ __('Topic') }}:</strong> {{ $teacher->topic ?? __('Not specified') }}</p>
                                <p><strong>{{ __('Bio') }}:</strong> {{ $teacher->bio ?? __('No bio available') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editTeacherModal{{ $teacher->id }}" data-dismiss="modal">
                                    {{ __('Edit') }}
                                </button>

                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                </form>

                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#feedbackModal{{ $teacher->id }}" data-dismiss="modal">
                                    {{ __('View Feedback') }}
                                </button>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for editing teacher details -->
                <div class="modal fade" id="editTeacherModal{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="editTeacherModalLabel{{ $teacher->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editTeacherModalLabel{{ $teacher->id }}">{{ __('Edit Teacher') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $teacher->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $teacher->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">{{ __('Phone') }}</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $teacher->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="topic">{{ __('Topic') }}</label>
                                        <select class="form-control" id="topic" name="topic" required>
                                            <option value="Quran" {{ $teacher->topic == 'Quran' ? 'selected' : '' }}>{{ __('Quran') }}</option>
                                            <option value="Lang Teacher" {{ $teacher->topic == 'Lang Teacher' ? 'selected' : '' }}>{{ __('Lang Teacher') }}</option>
                                            <option value="Both" {{ $teacher->topic == 'Both' ? 'selected' : '' }}>{{ __('Both') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">{{ __('Bio') }}</label>
                                        <textarea class="form-control" id="bio" name="bio">{{ $teacher->bio }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feedback Modal with delete option for each feedback -->
                <div class="modal fade" id="feedbackModal{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel{{ $teacher->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="feedbackModalLabel{{ $teacher->id }}">{{ __('Feedback for ') }} {{ $teacher->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @forelse($teacher->reviews as $feedback)
                                    <div class="mb-3">
                                        <p><strong>{{ $feedback->user->name ?? __('Unknown User') }}</strong>:</p>
                                        <p>{{ $feedback->comment }}</p>
                                        <p><strong>{{ __('Rating') }}:</strong> {{ str_repeat('★', $feedback->rate) }}</p>
                                        
                                        <!-- Delete button for feedback -->
                                        <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete Feedback') }}</button>
                                        </form>
                                    </div>
                                @empty
                                    <p>{{ __('No feedback available') }}</p>
                                @endforelse
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
