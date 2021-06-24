@extends('layouts.layout')

@section('title')
    {{ "Главная" }}
@endsection

@section('content')
    <div class="description">
        <h2>Добро пожаловать на nails.com!</h2>
        <p>Здесь вы можете записаться к нашим мастерам и выбрать интересующую
            Вас услугу</p>
    </div>
    <div class="buttons">
        <a href="#" class="btn-main">Записаться</a>
        <a href="/orders" class="btn-main">Мои записи</a>
    </div>
    <!--<img src="resources/Images/nails.png" alt="ногти">-->

@endsection
