@extends('admin.layout.admin')
@section('title'){{ __('Users') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users mr-1"></i>
                {{ __('Users') }}
            </h3>

            <div class="card-tools">
                <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> {{ __('Add new') }}</a>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Role') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Date Posted') }}</th>
                    <th style="width: 350px;">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr id="user_{{$user->id}}">
                        <td class="align-middle">{{ $user->id }}</td>
                        <td class="align-middle">
                            <img style="width: 50px; height: 50px;" src="/images/{{ $user->photo == '' ? 'default.png' : 'profile_picture/'.$user->photo }}" alt="{{ $user->name }}" class="img-circle">
                            &nbsp;&nbsp; {{ $user->name }}
                        </td>
                        <td class="align-middle">
                            @if (!empty($user->getRoleNames()))
                                @forelse($user->getRoleNames() as  $v)
                                    <span class="badge badge-pill badge-warning">{{ $v }}</span>
                                @empty
                                    <span class="badge badge-pill badge-danger">keine Rolle</span>
                                @endforelse
                            @endif
                        </td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($user->created_at)->format('d.m.Y H:m:s') }}</td>
                        <td class="align-middle">
                            <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-sm btn-info mb-2 mb-lg-0"><i class="fas fa-eye"></i> {{ __('View') }}</a>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-warning mb-2 mb-lg-0"><i class="fas fa-edit"></i> {{ __('Edit') }}</a>
                            @hasanyrole('Admin|Inhaber')
                            <a class="btn btn-sm btn-danger mb-2 mb-lg-0" onclick="deleteUser({{ $user->id }})">{{ __('Delete') }}</a>
                            @endhasanyrole
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="font-weight-bold text-center">{{ __('No Result Found') }}</td></tr>
                @endforelse
                </tbody>
            </table>
            <div id="user_list"></div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">
    {{--var root_url = <?php echo json_encode(route('admin.user.data')) ?>;--}}
    var store = <?php echo json_encode(route('admin.user.store')) ?>;

    function deleteUser(id) {
        let url = `/admin/management/user/${id}`;
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                _token: _token
            },
            success: function (response) {
                $("#user_"+id).remove();
            }
        });
    }
</script>
@endpush