@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-2">
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
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    آخرین اخبار
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($articles as $article)
                        <a href="{{route('article.view', ['id'=>$article->id])}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$article->title}}</h5>
                                <small>{{ jDate::forge($article->created_at)->format('Y/m/d') }}</small>
                            </div>
                            <p class="mb-1">{{$article->description}}</p>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    آخرین فایل ها
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($files as $file)
                        <a href="{{route('file.view', ['id'=>$file->id])}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$file->title}}</h5>
                                <small>{{ jDate::forge($file->created_at)->format('Y/m/d') }}</small>
                            </div>
                            <p class="mb-1">{{$file->description}}</p>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
