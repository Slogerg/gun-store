@extends('layouts.app')
@section('content')

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
{{--                            @if($item->img)--}}
{{--                                <img class="img-fluid rounded" src="{{$item->img}}" alt="">--}}
{{--                            @else--}}
                                <img class="card-img-top" src="https://via.placeholder.com/750x300" alt="Card image cap" />
{{--                            @endif--}}
                            <div class="card-body">
                                <h6 style="color: gray;">[{{$item->category->name}}]</h6>
                                <h2 class="card-title">{{$item->name}}</h2>
                                <p>Калібр: {{$item->caliber}}</p>
                                <p>Кількість набоїв: {{$item->bullets}}</p>
{{--                                //якщо BASKET user_id == user, gun_id == gun--}}
                                @if($item->haveGun($item->id,Auth::user()->id))
                                <button class="btn btn-secondary" disabled href="#">Додано</button>
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
                            <div class="card-footer text-muted">
                                {{$item->created_at}}

                            </div>
                        </div>
                @endforeach
            </div>

            <div class="col-md-4">
                <!-- Side widget-->
                <div class="card my-4">
                    <h5 class="card-header">Фільтр</h5>
                    <div class="card-body">Тут ви можете отримати доступ до всіх статей блогу</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->


    </html>
@endsection
