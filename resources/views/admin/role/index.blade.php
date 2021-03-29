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
                    @role('Admin')
                    <th>{{ __('Action') }}</th>
                    @endrole
                </tr>
                </thead>
                <tbody>
                @forelse ($roles as $role )
                    <tr>
                        <td class="align-middle">{{ $role->id }}</td>
                        <td class="align-middle">{{ $role->name }}</td>
                        <td class="align-middle">
                            @foreach ($role->permissions as $permission )
                                <span class="badge badge-warning p-1"><i class="fas fa-shield-alt"></i> {{ trans($permission->name) }}</span>
                            @endforeach
                        </td>
                        <td class="align-middle"><span class="tag tag-success">{{ Carbon\Carbon::parse($role->created_at)->format('d.m.Y H:m:s') }}</span></td>
                        @role('Admin')
                        <td class="align-middle">
                            <a href="{{ route('admin.role.edit', $role->id ) }}" class="btn btn-info btn-sm">Change Permission</a>
{{--                            <a href="{{ route('admin.role.destroy',$role->id ) }}" class="btn btn-danger">Delete</a>--}}
                        </td>
                        @endrole
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