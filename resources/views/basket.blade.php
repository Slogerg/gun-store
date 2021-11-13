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
                    <th>Кількість</th>
                    <th class="text-center">Ціна</th>
                    <th class="text-center">Всього</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                <tr>
                    <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{$item->gun->name}}</a></h4>
                                <h5 class="media-heading"><a href="#">{{$item->gun->category->name}}</a></h5>
                                <span>Статус: </span><span class="text-success"><strong>Є на складі</strong></span>
                            </div>
                        </div></td>
                    <form action=""></form>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                        
                        <input type="email" class="form-control" id="exampleInputEmail1" value='{{$item->count}}'>
                        
                    </td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->gun->price}}$</strong></td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>

                    <td class="col-sm-1 col-md-1">
                        <form action="">
                            <button type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Видалити
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach


                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <a href="{{route('guns')}}" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Продовжити покупки
                        </a></td>
                    <td>
                        <button type="button" class="btn btn-success">
                            Замовити <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
