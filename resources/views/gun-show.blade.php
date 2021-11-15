@extends('layouts.app')
@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="{{ asset('css/gun.css') }}" rel="stylesheet">

<!------ Include the above in your HEAD tag ---------->
<div class="container-fluid">
    <div class="content-wrapper">
        <div class="item-container">
            <div class="container">
                <div class="col-md-12">
                    <div class="product col-md-3 service-image-left">
                            <img id="item-display" src="{{asset(str_replace('public/','storage',$item->image))}}" alt="">
                    </div>


                </div>

                <div class="col-md-7">
                    <div class="product-title">{{$item->name}}</div>
{{--                    <div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>--}}
                    <div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
                    <hr>
                    <div class="product-price">$ {{$item->price}}</div>
                    <div class="product-stock">На складі</div>
                    <hr>
                    <div class="btn-group cart">
                        @if($item->haveGun($item->id,Auth::user()->id))
                            <button class="btn btn-secondary" disabled href="#">У кошику</button>
                        @else
                            <form action="{{route('addInBasket')}}" method="POST">
                                @csrf
                                <input type="text"  name="user_id" hidden value="{{ Auth::user()->id }}">
                                <input type="text" name="gun_id" hidden value="{{$item->id}}">
                                <input type="text" name="count" hidden value="1">
                                <input type="text" name="price" hidden value="{{$item->price}}">
                                <button type="submit" class="btn btn-primary">Додати у кошик →</button>
                            </form>
                        @endif
                    </div>
                    <div class="btn-group wishlist">
                        <button type="button" class="btn btn-danger">
                            Додати у сподобані
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12 product-info">
                        <section class="container product-info">
                        {{$item->description}}
                            <h3>Параметри зброї {{$item->name}}:</h3>
                            <li>Кількість набоїв у магазині: {{$item->bullets}}</li>
                            <li>Калібр зброї: {{$item->caliber}}</li>
                            <li>Дата додавання у магазин: {{$item->created_at}}</li>
                        </section>
{{--                comments--}}
                    <div class="card my-4">
                        <h5 class="card-header">Залиште коментар:</h5>
                        <div class="card-body">
                            <form method="POST" action="{{route('comment.store',$item->id)}}">
                                @csrf
                                <div class="form-group">

                                    <input type="hidden" id="user_id" name="user_id" value="{{auth()->user()->id}}">
                                    <input type="hidden" id="gun_id" name="gun_id" value="{{$item->id}}">
                                    <textarea id="text" name="text" class="form-control" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Підтвердити</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <section class="container">
                        @foreach($item->comments->reverse() as $comments)

                            <div class="media mb-4">
                                <hr>

                                <div class="media-body">
                                    <h5 class="mt-0">
                                        {{$comments->user->name}}
                                    </h5>
                                    {{$comments->text}}
                                </div>
                                @if(auth()->user()->hasRole('admin'))
                                    <form action="{{route('commentRemove.destroy',$comments->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="text" name="gun_id" value="{{$item->id}}" hidden>
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                @endif
                            </div>
                            <hr>
                        @endforeach
                    </section>

                </div>

                <hr>

        </div>
    </div>
</div>
@endsection
