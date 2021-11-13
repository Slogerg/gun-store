@extends('layouts.app')
@section('content')
    <body>
    <div class="main">
        <div class="container-xxl">
            <div class="add-button">
                <a href="{{route('gun.create')}}">Create</a>
                <a href="{{route('category.index')}}">Category</a>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Назва</th>
                    <th scope="col">Ціна

                    <th scope="col">Категорія</th>

                    <th scope="col">Дії</th>
                    <th scope="col">Видалення</th>

                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->category->name ?? 'underfined'}}</td>
                        <td>
                            <a href="{{route('gun.edit',$item->id)}}">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('gun.destroy',$item->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </body>
@endsection
