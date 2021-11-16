@extends('layouts.app')
@section('content')
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Зброя</th>


                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="{{route('gun.single',$item->gun->id)}}"> <img class="media-object" src="{{asset(str_replace('public/','storage',$item->gun->image))}}" style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="{{route('gun.single',$item->gun->id)}}">{{$item->gun->name}}</a></h4>
                                        <h5 class="media-heading">{{$item->gun->category->name}}</h5>
                                        <span>Статус: </span><span class="text-success"><strong>Є на складі</strong></span>
                                    </div>
                                </div></td>

                            <td class="col-sm-1 col-md-1">
                                <form action="{{route('likedItemRemove.destroy',$item->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span> Видалити
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
