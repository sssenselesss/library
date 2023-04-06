
@extends('layouts.index')
@section('content')
    <div class="favoriteNoEmpty">
        <h2 class="h2-title">
            Избранное

        </h2>
        <div class="wrapper">
            @if(count($favs) === 0)

                    <div class="favorite-empty">
                        <div class="favorite-icon__empty">
                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                        </div>
                        <span class="favorite-title">У вас нет сохраненных книг</span>
                        <span class="favorite-subtitle">Вы еще ничего не сохраниляли </span>

                        <a href="{{route('main')}}" class="favorite-button">На главную</a>

                    </div>

                    @else
                @foreach($favs as $fav)

                    <a href="{{route('singleBook',$fav->id)}}" class="book-item">
                        <div class="book-image">

                            <img src="{{asset('storage/'.substr($fav->image,7))}}" alt="">
                        </div>

                        <div class="book-title">{{$fav->title}}</div>
                        <div class="book-author">{{$fav->author}}</div>

                        <div class="book-more">Подробнее</div>


                    </a>
                @endforeach
                @endif





        </div>
    </div>

@endsection
