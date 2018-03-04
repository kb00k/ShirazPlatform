@extends('layouts.app')
@section('title', 'سبد خرید - ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ config('platform.name') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('cart') }}">سبد خرید</a></li>
                    </ol>
                </nav>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <a href="{{ route('file')  }}" class="btn btn-primary pull-left"><i class="fa fa-shopping-basket"></i> ادامه خرید</a>
                    </div>
                </div>

                <div class="list-group">
                    @foreach(Cart::content() as $item)
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{$item->name}}</h5>
                            <small><a href="{{ route('file.remove-cart',['id'=>$item->rowId]) }}" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> حذف</a></small>
                        </div>
                        <p class="mb-1">قیمت: {{number_format($item->price)}}تومان</p>
                        <small>{{$item->options->description}}</small>

                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
