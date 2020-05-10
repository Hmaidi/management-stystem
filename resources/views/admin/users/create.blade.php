@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div style="margin:auto; dispplay:table; margin-bottom: 30px;">
                    <img width="100" height="100" class="img-rounded mt-3" src="{{ url('storage/users/defaultsUsers.png' ) }}"></div>
                <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputFile">Company Logo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input" id="exampleInputFile" required>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>



                        </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                            @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.name_helper') }}
                            </p>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                            @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.email_helper') }}
                            </p>
                        </div>
                </div>
           </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="name">{{ trans('cruds.user.fields.phone') }}*</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($user) ? $user->phone : '') }}" required>
                        @if($errors->has('phone'))
                            <em class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <label for="name">{{ trans('cruds.user.fields.mobile') }}*</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" value="{{ old('mobile', isset($user) ? $user->mobile : '') }}" required>
                        @if($errors->has('mobile'))
                            <em class="invalid-feedback">
                                {{ $errors->first('mobile') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="name">{{ trans('cruds.user.fields.address') }}*</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($user) ? $user->address : '') }}" required>
                        @if($errors->has('address'))
                            <em class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                        <label for="name">{{ trans('cruds.user.fields.city') }}*</label>
                        <input type="text" id="city" name="city" class="form-control" value="{{ old('city', isset($user) ? $user->city : '') }}" required>
                        @if($errors->has('city'))
                            <em class="invalid-feedback">
                                {{ $errors->first('city') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                        <label for="name">{{ trans('cruds.user.fields.country') }}*</label>
                        <input type="text" id="country" name="country" class="form-control" value="{{ old('country', isset($user) ? $user->country : '') }}" required>
                        @if($errors->has('country'))
                            <em class="invalid-feedback">
                                {{ $errors->first('country') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('zip_code') ? 'has-error' : '' }}">
                        <label for="name">{{ trans('cruds.user.fields.zip_code') }}*</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ old('zip_code', isset($user) ? $user->zip_code : '') }}" required>
                        @if($errors->has('zip_code'))
                            <em class="invalid-feedback">
                                {{ $errors->first('zip_code') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        @if($errors->has('password'))
                            <em class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.password_helper') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.roles_helper') }}
                            </p>
                        </div>
                </div>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
        </section>
    </div>
@endsection