@extends('admin.layout.admin')
@section('title'){{ __('Roles') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Roles Table') }}</h3>
            <div class="card-tools">
                <a href="{{ route('admin.role.create') }} " class="btn btn-primary btn-sm"><i class="fas fa-shield-alt"></i> {{ __('Add new Role') }}</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('Role') }}</th>
                    <th>{{ __('Permission') }}</th>
                    <th>{{ __('Date Posted') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($roles as $role )
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions as $permission )
                                <button class="btn btn-warning btn-sm" role="button"><i class="fas fa-shield-alt"></i> {{ trans($permission->name) }}</button>
                            @endforeach
                        </td>
                        <td><span class="tag tag-success">{{ $role->created_at }}</span></td>
                        {{--  <td>
                            <a href="{{ route('role.show', $role->id ) }}" class="btn btn-info">Change Permission</a>
                            <a href="{{ route('role.destroy',$role->id ) }}" class="btn btn-danger">Delete</a>
                        </td>  --}}
                    </tr>
                @empty
                    <tr>
                        <td><i class="fas fa-folder-open"></i> {{ __('No Record found') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')

@endpush