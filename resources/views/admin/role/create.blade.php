@extends('admin.layout.admin')
@section('title'){{ __('Roles') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Add new Role') }}</h3>
            <div class="card-tools">
                <a href="{{ route('admin.role.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-shield-alt"></i> {{ __('See all Roles') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.role.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="{{ __('Role Name') }}" class="form-control">
                    </div>
                    @forelse($permissions as $permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}">
                        <label class="form-check-label" for="permission-{{ $permission->id }}">{{ trans($permission->name) }}</label>
                    </div>
                    @empty
                        <div>{{ __('No Record Found') }}</div>
                    @endforelse
                    <div class="mt-4">
                        <button type="submit" class="btn btn-lg btn-primary btn-sm"><i class="fas fa-save"></i>{{ __('Save Role') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')

@endpush