@extends('admin.layout.admin')
@section('title'){{ __('Permission') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Permission Table') }}</h3>

        <div class="card-tools">
            <a href="{{ route('admin.permission.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> {{ __('Create new permission') }}</a>
        </div>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Date Posted') }}</th>
{{--                <th style="width: 250px;">{{ __('Action') }}</th>--}}
            </tr>
            </thead>
            <tbody>
            @forelse($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ trans($permission->name) }}</td>
                <td>{{ $permission->created_at }}</td>
                {{--<td>
                    <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-sm btn-warning btn-sm">{{ __('Edit Permission') }}</a>
                </td>--}}
            </tr>
            @empty
                <tr><td colspan="4" class="font-weight-bold text-center">{{ __('No Result Found') }}</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')

@endpush