@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{ config('platform.name') }}
                <small class="text-muted">{{ config('platform.slug') }}</small>
            </h1>
            <div class="card card-default">
                <div class="card-header">{{ $page->title }}</div>

                <div class="card-body">
                    {!! $page->text !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
