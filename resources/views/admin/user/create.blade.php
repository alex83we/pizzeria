@extends('admin.layout.admin')
@section('title'){{ __('User create') }}@endsection
@section('bodyTag', 'sidebar-mini')

@push('css')

@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-user-edit mr-1"></i>
                {{ __('User create') }}
            </h3>

            <div class="card-tools">
                <a href="{{ route('admin.user.index') }}" class="btn btn-success btn-sm">{{ __('Back') }}</a>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
            @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="name" class="col-sm-12">Name:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="user" name="name" placeholder="Vollständiger Name">
                    <span id="userError" class="alert-message"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-12">E-Mail Adresse:</label>
                <div class="col-sm-12">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail-Adresse">
                    <span id="emailError" class="alert-message"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-12">Telefon:</label>
                <div class="col-sm-12">
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Telefonnummer">
                    <span id="phoneError" class="alert-message"></span>
                </div>
            </div>
            <div class="mb-2 row">
                <div class="col-sm-6">
                @hasanyrole('Admin|Inhaber')
                <label class="col-sm-12">{{ __('Role') }}:</label>
                @foreach($roles as $role)
                    <div class="form-check">
                        <div class="col-sm-12">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="role[]" id="role" value="{{ $role->name }}"> {{ $role->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
                @endhasanyrole
                </div>
                <div class="col-sm-6">
                @hasanyrole('Admin|Inhaber')
                <label class="col-sm-12">{{ __('Permissions') }}:</label>
                @foreach($permissions as $permission)
                    <div class="form-check">
                        <div class="col-sm-12">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="permissions[]" id="permissions" value="{{ $permission->name }}"> {{ trans($permission->name) }}
                            </label>
                        </div>
                    </div>
                @endforeach
                @endhasanyrole
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-12">Passwort:</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Passwort">
                    <span id="passwordError" class="alert-message"></span>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">{{ __('Save') }}</button>
        </div>
        </form>

    </div>

@endsection

@push('js')

@endpush