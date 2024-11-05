<!-- resources/views/certifications/my-certifications.blade.php -->

@extends('layouts.master')
@section('title', __('My Certifications'))

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">{{ __('My Certifications') }}</h2>

    @if($certifications->isEmpty())
        <div class="alert alert-warning text-center">
            {{ __('No certifications found') }}
        </div>
    @else
        <div class="row">
            @foreach($certifications as $certification)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm" data-toggle="modal" data-target="#certificationModal{{ $certification->id }}" style="cursor: pointer;">
                        <!-- عرض الصورة بالرابط الثابت -->
                        <img src="https://6c5700edc75e6c62f919-3807c2bf84f2548b953876f1e4affb47.ssl.cf2.rackcdn.com/nlpa_b0e52e6ec3ca94a5657719e72384313d.png" alt="{{ $certification->name }}" class="card-img-top">
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $certification->name }}</h5>
                        </div>
                    </div>
                </div>

                <!-- بوب-أب لعرض التفاصيل -->
                <div class="modal fade" id="certificationModal{{ $certification->id }}" tabindex="-1" role="dialog" aria-labelledby="certificationModalLabel{{ $certification->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="certificationModalLabel{{ $certification->id }}">{{ $certification->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- صورة الشهادة بالرابط الثابت -->
                                <img src="https://6c5700edc75e6c62f919-3807c2bf84f2548b953876f1e4affb47.ssl.cf2.rackcdn.com/nlpa_b0e52e6ec3ca94a5657719e72384313d.png" alt="{{ $certification->name }}" class="img-fluid mb-3">
                                
                                <p><strong>{{ __('Issued by') }}:</strong> {{ $certification->issuer ?? __('Unknown issuer') }}</p>
                                <p><strong>{{ __('Date Issued') }}:</strong> {{ $certification->date_issued ? $certification->date_issued->format('d M, Y') : __('Date not available') }}</p>
                                <p><strong>{{ __('Description') }}:</strong> {{ $certification->description ?? __('No description available') }}</p>
                                <p><strong>{{ __('Link') }}:</strong> 
                                    @if($certification->link)
                                        <a href="{{ $certification->link }}" target="_blank" class="text-primary">{{ __('View Certificate') }}</a>
                                    @else
                                        <span class="text-muted">{{ __('No link available') }}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $certification->id }}" data-dismiss="modal">{{ __('Edit') }}</button>

                                <form action="{{ route('certifications.destroy', $certification->id) }}" method="POST" style="display:inline;">
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
                <div class="modal fade" id="editModal{{ $certification->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $certification->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $certification->id }}">{{ __('Edit Certification') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('certifications.update', $certification->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $certification->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="issuer">{{ __('Issuer') }}</label>
                                        <input type="text" class="form-control" id="issuer" name="issuer" value="{{ $certification->issuer }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="date_issued">{{ __('Date Issued') }}</label>
                                        <input type="date" class="form-control" id="date_issued" name="date_issued" value="{{ $certification->date_issued }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea class="form-control" id="description" name="description">{{ $certification->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="link">{{ __('Link') }}</label>
                                        <input type="url" class="form-control" id="link" name="link" value="{{ $certification->link }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="photo">{{ __('Photo') }}</label>
                                        <input type="file" class="form-control-file" id="photo" name="photo">
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
