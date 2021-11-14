@extends('layouts.app')
@section('content')
    <body>
    <main>
        <div class="container-xxl">
            <form action="{{route('gun.update',$item->id)}}" method = "POST">
                @method('PUT')
                @csrf
                {{--                <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">--}}
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
                <div class="form-group">
                    <label for="caliber">Калібр</label>
                    <input
                        type="text"
                        class="form-control"
                        id="caliber"
                        name = "caliber"
                        placeholder="Введіть калібр"
                        value="{{$item->caliber}}"

                    />
                </div>
                <div class="form-group">
                    <label for="bullets">К-сть набоїв</label>
                    <input
                        type="number"
                        class="form-control"
                        id="bullets"
                        name = "bullets"
                        placeholder="Введіть К-сть набоїв"
                        value="{{$item->bullets}}"
                    />
                </div>
                <div class="form-group">
                    <label for="price">Ціна</label>
                    <input
                        type="number"
                        class="form-control"
                        id="price"
                        name = "price"
                        placeholder="Введіть ціну"
                        value="{{$item->price}}"
                    />
                </div>
                <div class="form-group">
                    <label for="description"
                    >Опис зброї</label
                    >
                    <textarea
                        name = "description"
                        class="form-control"
                        id="description"
                        rows="3"
                    >{{$item->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Шлях до фото</label>
                    <input
                        type="file"
                        value="{{$item->image}}"
                        class="form-control"
                        id="image"
                        name="image"
                        placeholder="Шлях до фото"
                    />
                </div>

                <div class="form-group">
                    <label for="category_id">Категорія</label>
                    <select name="category_id" id="category_id"
                            class="form-control"
                            placeholder="Виберіть категорію"
                            required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if($category->id == $item->category_id) selected @endif>
                            {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </main>
    </body>
@endsection
