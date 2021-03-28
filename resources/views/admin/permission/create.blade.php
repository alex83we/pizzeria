@extends('admin.layout.admin')
@section('title'){{ __('Create Permission') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Add new Permission') }}</h3>

            <div class="card-tools">
                <a href="{{ route('admin.permission.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-shield-alt"></i> {{ __('See all Permission') }}</a>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.permission.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">{{ __('Permission Name') }}</label>
                    <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="{{ __('Permission Name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> {{ __('Create Permission') }}</button>
            </div>
        </form>

    </div>
@endsection

@push('js')

@endpush