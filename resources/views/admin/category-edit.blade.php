@extends('layouts.app')
@section('content')
    <body>
    <main>
        <div class="container-xxl">
            <form action="{{route('category.update',$item->id)}}" method = "POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Назва</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name = "name"
                        placeholder="Введіть назву"
                        value="{{$item->name}}"
                    />
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </main>
    </body>
@endsection
