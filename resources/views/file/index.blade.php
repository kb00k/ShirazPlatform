@extends('layouts.app')

@section('title', "محصولات - ")

@section('css')
    <style>
    .card {
        margin-bottom:10px;
    }
    </style>
@endsection

@section('content')

    <div class="container">

    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ config('platform.name') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('file') }}">محصولات</a></li>
                    </ol>
                </nav>
                <h1>محصولات
                    @if(Auth::check())
                        @if(Auth::user()->level == 'admin')
                            <a href="{{ route('file.create')  }}" class="btn btn-primary pull-left"><i class="fa fa-plus"></i>افزودن فایل</a>
                        @endif
                    @endif
                </h1>
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        @include('file.sidebar',['categories'=>$categories])
                    </div>
                    <div class="col-md-9">
                        <div class="row">

                            @foreach($files as $file)
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{ Storage::url($file->source) }}" alt="image" style="width:100%">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="{{ route('file.view',['id'=>$file->id]) }}">{{$file->title}}</a></h4>
                                        <p class="card-text">
                                            @if($file->type == 'paid')
                                            قیمت:
                                          <strong>{{number_format($file->price)}}</strong> تومان
                                            @else
                                                <strong>رایگان</strong>
                                           @endif
                                            <br />
                                            {{$file->description}}</p>
                                        <div class="row">
                                            <div class="col"><a href="{{ route('file.view',['id'=>$file->id]) }}" class="btn btn-danger btn-block btn-sm"><i class="fa fa-eye"></i> مشاهده</a></div>
                                            @if($file->type == 'paid')
                                            <div class="col"><a href="{{ route('file.add-cart',['id'=>$file->id]) }}" class="btn btn-primary btn-block btn-sm"><i class="fa fa-cart-plus"></i> خرید فایل</a></div>
                                            @else
                                                <div class="col"><a href="{{ route('file.download',['id'=>$file->id]) }}" class="btn btn-primary btn-block btn-sm"><i class="fa fa-download"></i> دریافت فایل</a></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $files->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
