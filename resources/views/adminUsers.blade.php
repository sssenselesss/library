@extends('layouts.index')
@section('content')
    <div class="admin">
        <h2 class="h2-title h2-admin">Панель администратора</h2>
        <div class="wrapper">
            <div class="admin-menu">
                <a href="{{route('adminUsers')}}" class="admin-menu__item active">Все пользователи</a>
                <a href="{{route('adminAddBook')}}" class="admin-menu__item">Добавить товар</a>

                <a href="{{route('adminAddCategory')}}" class="admin-menu__item">Добавить/Удалить категорию</a>

            </div>

            <div class="admin-menu__user">
                <table>
                    <tbody>

                    <tr>
                        <th>id</th>
                        <th>ФИО</th>
                        <th>email</th>
                        <th>Статус</th>
                        <th></th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>@if($user['status']==='active') Актвивный
                                @else Заблокирован
                                @endif</td>
                            <td>
                                @if($user['status']==='active')
                                    <a href="{{route('banUser',$user->id)}}">Заблокировать</a>
                                    @else
                                    <a href="{{route('activeUser',$user->id)}}">Разблокировать</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
