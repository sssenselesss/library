@extends('layouts.index')
@section('content')

    <div class="catalog">
        <div class="wrapper">
            <h2 class="h2-title">Каталог</h2>
            <div class="catalog-container">
                <div class="catalog-categories">
                    <span class="categories-title">Категории</span>

                    <div class="all-categories">

                        <a href="{{route('catalog')}}" class="all-categories__item">Все категории

                        </a>
                        @foreach($categories as $categ)
                            <a href="{{route('booksCategory',$categ->id)}}" class="all-categories__item">{{$categ->name}}

                            </a>
                        @endforeach








                    </div>
                </div>

                <div class="catalog-books">
                    @foreach($books as $book)
                        <a href="{{route('singleBook',$book->id)}}" class="book-item">
                            <div class="book-image">
                                <img src="{{$book->getImageUrlAttribute()}}"
                                     alt="">
                            </div>

                            <div class="book-title">{{$book->title}}</div>
                            <div class="book-author">{{$book->author}}</div>

                            <div class="book-more">Подробнее</div>


                        </a>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
