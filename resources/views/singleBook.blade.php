@extends('layouts.index')

@section('content')

    <div class="singleBook">
        <div class="wrapper">

            <div class="singleBook-mainInfo">
                <div class="single-image">
                    <img src="{{$book->getImageUrlAttribute()}}" alt="">
                </div>

                <div class="single-info">
                    <span class="single-title">{{$book->title}}</span>
                    <span class="single-author">{{$book->author}}</span>

                    <div class="single-book__info">
                        <span class="single-id">ID книги: {{$book->id}}</span>
                        <span class="single-year">Год издания: {{$book->year}}</span>
                        <span class="single-count">Кол-во страниц
                            : {{$book->count_list}}</span>
                        <span class="single-age">Возрастные ограничения: {{$book->age}}</span>
                        <span class="single-category">Жанры: {{$category->name}}</span>

                    </div>

                    @auth()
                        <div class="single-buttons">

                            <a href="{{$book->getIFileUrlAttribute()}}" download="" class="button">Скачать</a>

                            @if( count($favBook)===0)



                                <a href="{{route('addFavorite',$book->id)}}" class="save">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                </a>
                            @else
                                <a href="{{route('deleteFavorite',$book->id)}}" class="save unsave">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                </a>

                            @endif
                        </div>
                    @endauth

                    @auth()
                        @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
                            <div class="single-buttons admin-btns">
                                <a href="{{route('update',$book)}}" class="button">Редактировать</a>
                                <a href="{{route('book.delete',$book)}}" class="save delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        @endif
                    @endauth


                </div>
            </div>

            <div class="singleBook-discription">{{$book->content}}

            </div>

            <div class="similar-books">
                <h2 class="h2-title">Похожие</h2>
                <div class="wrapper">

                    @foreach($sameBook as $same)
                        <a href="{{route('singleBook',$same->id)}}" class="book-item">
                            <div class="book-image">
                                <img src="{{$same->getImageUrlAttribute()}}"
                                     alt="">
                            </div>

                            <div class="book-title">{{$same->title}}</div>
                            <div class="book-author">{{$same->author}}</div>

                            <div class="book-more">Подробнее</div>


                        </a>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
