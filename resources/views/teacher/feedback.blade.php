<!-- resources/views/teacher/feedback/index.blade.php -->

@extends('layouts.master')
@section('title', __('Feedback'))

@section('content')
<div class="container mt-5">
    <h2 class="text-center">{{ __('Feedback') }}</h2>

    @if($feedbacks->isEmpty())
        <div class="alert alert-warning text-center">
            {{ __('No feedback found') }}
        </div>
    @else
        <ul class="list-group">
            @foreach($feedbacks as $feedback)
                <li class="list-group-item">
                    <div>
                        <strong>{{ $feedback->user->name }}</strong>
                        <span class="float-right">
                            {{ __('Rating') }}:
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $feedback->rate)
                                    <i class="fas fa-star text-warning"></i>
                                @else
                                    <i class="far fa-star text-muted"></i>
                                @endif
                            @endfor
                        </span>
                    </div>
                    
                    <p>{{ $feedback->comment }}</p>
                    <small class="text-muted">{{ $feedback->created_at->format('d M, Y') }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
