@extends('layouts.app')
@section('title', 'داشبرد - ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('sidebar')
            </div>
            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ config('platform.name') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard') }}">داشبرد</a></li>
                    </ol>
                </nav>
                <div class="card card-default">
                    <div class="card-header">داشبرد شما</div>

                    <div class="card-body">
                        داشبرد شما
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
