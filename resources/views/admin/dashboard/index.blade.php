@extends('layouts.app')
@section('title', 'مدیریت سیستم -')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.dashboard') }}">مدیریت سیستم</a></li>
                    </ol>
                </nav>
                <div class="card card-default">
                    <div class="card-header">داشبرد مدیریتی</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        داشبرد مدیریتی
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
