@extends('admin.layout.admin')
@section('title'){{ __('User show') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-user-edit mr-1"></i>
                {{ __('User') . ' ' . $user->name }}
            </h3>

            <div class="card-tools">
                <a href="{{ route('admin.user.index') }}" class="btn btn-success btn-sm">{{ __('Back') }}</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><b>{{ __('Name').':' }}</b> {{ $user->name }}</p>
                    <p><b>{{ __('Email').':' }}</b> {{ $user->name }}</p>
                    <p><b>{{ __('Phone').':' }}</b> {{ $user->phone }}</p>
                    <p><b>{{ __('Role').':' }}</b>
                    @forelse($user->roles as $role)
                        <span class="badge badge-warning"> {{ $role->name }}</span>
                    @empty
                        <span class="badge badge-danger">keine Rolle</span>
                    @endforelse
                    </p>
                    <p><b>{{ __('Permission').':' }}</b>
                    @forelse($user->permissions as $permission)
                        <span class="badge badge-warning"> {{ $permission->name }}</span>
                    @empty
                        <span class="badge badge-danger">{{ __('no Permission') }}</span>
                    @endforelse
                    </p>
                    <p><b>{{ __('Last Updated').':' }}</b> {{ \Carbon\Carbon::parse($user->updated_at)->format('d.m.Y H:m:s') }}</p>
                    <p><b>{{ __('Date Posted').':' }}</b> {{ \Carbon\Carbon::parse($user->created_at)->format('d.m.Y H:m:s') }}</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center">
                        <img src="{{ Storage::disk('public')->url('images/'.$user->photo) }}" class="img-circle img-thumbnail" style="width: 250px">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush