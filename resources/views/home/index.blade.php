@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{ config('platform.name') }}
                <small class="text-muted">{{ $page->description }}</small>
            </h1>
            <div class="card card-default">
                <div class="card-header">{{ $page->title }}
                    @if(Auth::check())
                        @if(Auth::user()->level == 'admin')
                            <a href="{{ route('admin.page.edit',['id' => $page->id])  }}" class="btn btn-primary pull-left btn-sm"><i class="fa fa-edit"></i> ویرایش صفحه</a>
                        @endif
                    @endif
                </div>

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
