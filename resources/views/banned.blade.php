@extends('layouts.index')

@section('content')
    <div class="favorite">
        <div class="favorite-empty">
            <div class="favorite-icon__empty">

            </div>
            <span class="favorite-title">К сожалению вы были заблокированы</span>


            <a href="{{route('main')}}" class="favorite-button">На главную</a>

        </div>
    </div>
@endsection
