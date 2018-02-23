@extends('layouts.app')
@section('title', 'ویرایش صفحه ' . $page->title .' - ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('admin.sidebar')
            </div>
            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ config('platform.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">مدیریت سیستم</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">مدیریت صفحه ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.page.edit',['id' => $page->id]) }}">ویرایش صفحه {{ $page->title }}</a></li>
                    </ol>
                </nav>
                <div class="card card-default">
                    <div class="card-header">ویرایش صفحه  {{ $page->title }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.page.update',['id' => $page->id]) }}">
                            @csrf
                            @method('post')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label @lang('platform.input-pull')">نام و نام خانوادگی</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label @lang('platform.input-pull')">آدرس ایمیل</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" dir="ltr" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label @lang('platform.input-pull')">شماره همراه</label>

                                <div class="col-md-7">
                                    <input id="mobile" type="text" dir="ltr" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile', $user->mobile) }}" required>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label @lang('platform.input-pull')">کلمه عبور</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" dir="ltr" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label @lang('platform.input-pull')">تکرار کلمه عبور</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" dir="ltr" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i>
                                        ویرایش کاربر
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')


@endsection
