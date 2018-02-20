@extends('layouts.app')

@section('title', $page->title . "-")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ config('platform.name') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('page',['id' => $page->id]) }}">{{ $page->title }}</a></li>
                    </ol>
                </nav>
                <h1>{{ $page->title }}
                    <small class="text-muted">{{ config('platform.description') }}</small>
                </h1>
                <div class="card card-default">
                    <div class="card-header">{{ $page->title }}
                        @guest

                        @else
                            @if(Auth::user()->level == 'admin')
                                <a href="#dit" class="btn btn-primary pull-left btn-sm"><i class="fa fa-edit"></i> ویرایش صفحه</a>
                            @endif
                        @endguest
                    </div>
                    <div class="card-body">
                        {!! $page->text  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
