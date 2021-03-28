@extends('admin.layout.admin')
@section('title', 'Passwort ändern')
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users mr-1"></i>
                {{ __('Edit Profil') }}
            </h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.user.postPassword') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">

                        <div class="form-group">
                            <label for="newpassword">{{ __('Enter New Password') }}</label>
                            <input type="password" name="newpassword" id="newpassword" class="form-control" @error('newpassword') is-invalid @enderror value="" required placeholder="{{ __('New Password') }}">
                            @error('newpassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="newpassword_confirmation">{{ __('Confirm New Password') }}</label>
                            <input type="password" name="newpassword_confirmation" id="newpassword_confirmation" class="form-control" @error('newpassword_confirmation') is-invalid @enderror value="" required placeholder="{{ __('Confirm Password') }}">
                            @error('newpassword_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-lock"></i> {{ __('Change Password') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')

@endpush