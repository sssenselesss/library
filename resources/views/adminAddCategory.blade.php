@extends('layouts.index')
@section('content')
    <div class="admin">
        <h2 class="h2-title h2-admin">Панель администратора</h2>
        <div class="wrapper">
            <div class="admin-menu">
                <a href="{{route('adminUsers')}}" class="admin-menu__item ">Все пользователи</a>
                <a href="{{route('adminAddBook')}}" class="admin-menu__item ">Добавить товар</a>

                <a href="{{route('adminAddCategory')}}" class="admin-menu__item active">Добавить/Удалить категорию</a>

            </div>

            <div class="admin-menu__addCat mt30">
                <form action="{{route('addCategory.post')}}" class="admin-addBook__form add-cat__form mt60" method="post">
                    @csrf
                    <h3 class="h3-title" >Добавить категорию</h3>
                    <input type="text" class="add-input" placeholder="Название" name="name">
                    @error('name') <p class="error">{{$message}}</p> @enderror

                    <button class="form-btn mt60">Добавить</button>

                </form>

                <form action="{{route('category.delete')}}" class="admin-addBook__form add-cat__form mt90" method="post">
                    @csrf
                    <h3 class="h3-title" >Удалить категорию</h3>
                    <select name="id" id="" class="add-input" placeholder="Категория">
                        <option value="">Выберите категорию</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select >
                    @error('id') <p class="error">{{$message}}</p> @enderror

                    <button class="form-btn mt60">Удалить</button>

                </form>


            </div>
        </div>
    </div>

@endsection
