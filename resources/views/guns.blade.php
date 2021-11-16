@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('css/rSlider.min.css')}}">
    <html lang="en">
    <body>
    <!-- Navigation-->


    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-md-8">
                <h1 class="my-4">
                    Всі товари

                </h1>

                @foreach($items as $item)

                        <div class="card mb-4">
{{--                            @dd($item->image)--}}
{{--                            @if($item->img)--}}
{{--                                <img class="img-fluid rounded" src="{{$item->img}}" alt="">--}}
{{--                            @else--}}
                            <a href="{{route('gun.single',$item->id)}}"><img class="card-img-top" src="{{asset(str_replace('public/','storage',$item->image))}}" alt="Card image cap" /></a>
{{--                            @endif--}}
                            <div class="card-body">
                                <h6 style="color: gray;">[{{$item->category->name}}]</h6>
                                <h2 class="card-title">{{$item->name}}</h2>
                                <p>Калібр: {{$item->caliber}}</p>
                                <p>Кількість набоїв: {{$item->bullets}}</p>
{{--                                //якщо BASKET user_id == user, gun_id == gun--}}
                                @if($item->haveGun($item->id,Auth::user()->id,'Basket'))
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
                                <br>
                                @if($item->haveGun($item->id,Auth::user()->id,'Like'))
                                    <button class="btn btn-secondary" disabled href="#">Вибрано</button>
                                @else
                                    <form action="{{route('addInLiked')}}" method="POST">
                                        @csrf
                                        <input type="text"  name="user_id" hidden value="{{ Auth::user()->id }}">
                                        <input type="text" name="gun_id" hidden value="{{$item->id}}">
                                        <button type="submit" class="btn btn-danger">Додати у сподобані →</button>
                                    </form>
                                @endif
                            </div>
                            <div class="card-footer text-muted">
                                {{$item->created_at}}

                            </div>
                        </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {!! $items->links() !!}
                </div>
            </div>

            <div class="col-md-4">
                <!-- Side widget-->
                <div class="card my-4">
                    <h5 class="card-header">Фільтр</h5>
                    <div class="card-body">
                        <form action="{{route('sortByPrice')}}" method="GET">
                            <select name ="select" class="form-select" aria-label="Default select example">
                                <option selected>Ціна</option>
                                <option value="cheaper">Від дешевших до дорожчих</option>
                                <option value="expensive">Від дорожчих до дешевших</option>
                            </select>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <form action="{{route('sortByDate')}} " method="GET">
                            <select name="select" class="form-select" aria-label="Default select example">
                                <option selected>Дата</option>
                                <option value="desc">Нові</option>
                                <option value="sort">Старі</option>
                            </select>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <form action="{{route('searchByName')}}" method="GET">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Пошук по імені">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
    </html>
@endsection
