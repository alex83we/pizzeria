@extends('admin.layout.admin')
@section('title'){{ __('Roles edit') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Roles edit') }}</h3>
            <div class="card-tools">
                <a href="{{ route('admin.role.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-shield-alt"></i> {{ __('See all Roles') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ $role->name }} / {{ __('Permissions') }} bearbeiten</label>
                        <input type="hidden" name="name" placeholder="{{ __('Role Name') }}" class="form-control" value="{{ $role->name }}">
                    </div>
                    @forelse($permissions as $permission)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="permissions[]" id="permissions" value="{{ $permission->name }}" @if(in_array($permission->name, $userPermission)) checked @endif> {{ trans($permission->name) }}
                            </label>
                        </div>
                    @empty
                        <div>{{ __('No Record Found') }}</div>
                    @endforelse
                    <div class="mt-4">
                        <button type="submit" class="btn btn-lg btn-primary btn-sm"><i class="fas fa-save"></i> {{ __('Save Role') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')

@endpush