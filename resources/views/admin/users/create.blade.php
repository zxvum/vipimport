@extends('admin.layouts.app')

@section('title', 'Создание пользователя')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Создание пользователя</h3>
                </div>

                <form action="{{ route('admin.documents.create.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Имя пользователя">
                        </div>
                        <div class="form-group">
                            <label for="surname">Фамилия</label>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Фамилия пользователя">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Почта пользователя">
                        </div>
                        <div class="form-group">
                            <label for="city">Город</label>
                            <input type="text" name="city" id="city" class="form-control" placeholder="Город пользователя">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Номер телефона</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Номер телефона">
                        </div>
                        <div class="form-group">
                            <label for="surname">Пароль</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Пароль пользователя">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
