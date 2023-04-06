@extends('layouts.index')

@section('content')
    <div class="admin">
        <h2 class="h2-title h2-admin">Редактировать книгу</h2>
        <div class="wrapper">


            <div class="admin-menu__addBook mb60">
                <form action="{{route('update.post',$book)}}" class="admin-addBook__form" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="add-input" placeholder="Название" name="title" value="{{$book->title}}">
                    @error('title') <p class="error">{{$message}}</p> @enderror

                    <input type="text" class="add-input" placeholder="Автор" name="author" value="{{$book->author}}">
                    @error('author') <p class="error">{{$message}}</p> @enderror

                    <input type="text" class="add-input" placeholder="year" name="year" value="{{$book->year}}">
                    @error('year') <p class="error">{{$message}}</p> @enderror

                    <textarea name="content" id="content" cols="30" rows="10" class="add-text" placeholder="Описание">{{$book->content}}</textarea>
                    @error('content') <p class="error">{{$message}}</p> @enderror

                    <select name="category_id" id="" class="add-input" placeholder="Категория">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select >
                    @error('category_id') <p class="error">{{$message}}</p> @enderror
                    <input type="text" class="add-input" name="age" placeholder="Возрастное ограничение" value="{{$book->age}}">
                    @error('age') <p class="error">{{$message}}</p> @enderror

                    <input type="text" class="add-input" name="count_list" placeholder="Кол-во страниц" value="{{$book->count_list}}">
                    @error('count_list') <p class="error">{{$message}}</p> @enderror
                    <div class="attach-file">
                        Выберите изображение
                        <input type="file" class="input-file" name="image">
                    </div>
                    @error('image') <p class="error">{{$message}}</p> @enderror
                    <div class="attach-file file-path">
                        Выберите файл
                        <input type="file" class="input-file file-path__input" name="file">
                    </div>
                    @error('file') <p class="error">{{$message}}</p> @enderror

                    <button class="form-btn">Добавить</button>


                </form>
            </div>
        </div>
    </div>

@endsection
