<!-- resources/views/current_bookings/index.blade.php -->

@extends('layouts.master')
@section('title', __('Current Bookings'))

@section('content')
<div class="container mt-5">
    <h2 class="text-center">{{ __('Current Bookings') }}</h2>

    @if($bookings->isEmpty())
        <div class="alert alert-warning text-center">
            {{ __('No bookings found') }}
        </div>
    @else
        <ul class="list-group">
            @foreach($bookings as $booking)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $booking->user->name }}</strong> - {{ $booking->comment }}
                    </span>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#bookingModal{{ $booking->id }}">
                        {{ __('View Details') }}
                    </button>
                </li>

                <!-- Modal لعرض التفاصيل -->
                <div class="modal fade" id="bookingModal{{ $booking->id }}" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel{{ $booking->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookingModalLabel{{ $booking->id }}">{{ __('Booking Details') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>{{ __('Comment') }}:</strong> {{ $booking->comment }}</p>
                                <p><strong>{{ __('Time') }}:</strong> {{ $booking->time }}</p>
                                <p><strong>{{ __('Start At') }}:</strong> {{ $booking->start_at }}</p>
                                <p><strong>{{ __('End At') }}:</strong> {{ $booking->end_at }}</p>
                                <p><strong>{{ __('Confirmed') }}:</strong> {{ $booking->confirm ? 'Yes' : 'No' }}</p>
                            </div>
                            <div class="modal-footer">
                                <!-- زر التأكيد -->
                                <form action="{{ route('current_bookings.confirm', $booking->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="confirm" value="1">
                                    <button type="submit" class="btn btn-success">{{ __('Confirm') }}</button>
                                </form>

                                <!-- زر الحذف -->
                                <form action="{{ route('current_bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                </form>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    @endif
</div>
@endsection
