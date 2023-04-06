@extends('layouts.index')
@section('content')
    <div class="main-banner">
        <div class="wrapper">

            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($book_last as $last)
                        <div class="swiper-slide">
                            <div class="swiper-image">
                                <img src="{{$last->getImageUrlAttribute()}}"
                                     alt="123">
                            </div>
                            <div class="swiper-slide__content">
                                <div class="content-title">{{$last->title}}</div>
                                <div class="content-author">{{$last->author}}</div>
                                <div class="content-disc">{{$last->content}}</div>


                            </div>
                        </div>

                    @endforeach

                    ...
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

            </div>

            <div class="banner-categories">
                @foreach($cat_last as $cat)
                    <a href="{{route('booksCategory',$cat->id)}}" class="category-item">
                        {{$cat->name}}
                    </a>
                @endforeach


            </div>
        </div>
    </div>

    <div class="main-books__new">
        <h2 class="h2-title">Новинки</h2>
        <div class="wrapper">

            @foreach($book_last as $last)
                <a  href="{{route('singleBook',$last->id)}}" class="book-item">
                    <div class="book-image">
                        <img src="{{$last->getImageUrlAttribute()}}"
                             alt="">
                    </div>

                    <div class="book-title">{{$last->title}}</div>
                    <div class="book-author">{{$last->author}}</div>

                    <div class="book-more">Подробнее</div>


                </a>
            @endforeach


        </div>
    </div>

    <div class="main-books__new">
        <h2 class="h2-title">Новинки</h2>
        <div class="wrapper">
            @foreach($book_last as $last)
                <a  href="{{route('singleBook',$last->id)}}" class="book-item">
                    <div class="book-image">
                        <img src="{{$last->getImageUrlAttribute()}}"
                             alt="">
                    </div>

                    <div class="book-title">{{$last->title}}</div>
                    <div class="book-author">{{$last->author}}</div>

                    <div class="book-more">Подробнее</div>


                </a>
            @endforeach
        </div>
    </div>

    <div class="subscription" id="podpis">
        <h2>Будь в курсе новый поступлений</h2>
        <div class="wrapper">
            <h4>Скидки и акции только для подписчиков</h4>
            <form class="subscription-form">
                <input type="text" placeholder="email">
                <button>Подписаться</button>
            </form>
            <span class="oferta">Нажимая на кнопку «Подписаться», вы соглашаетесь
                с офертой и политикой конфиденциальности</span>
        </div>
    </div>
@endsection
