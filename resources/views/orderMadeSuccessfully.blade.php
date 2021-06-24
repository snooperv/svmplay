@extends('layouts.layout')

@section('title')
    {{ "Успешное добавление записи" }}
@endsection

@section('content')
    <div class="orders">
        <h1>Добавление записи произошло успешно!</h1>
        <a href="/orders" class="floating-button">Перейти к записям</a>
    </div>
@endsection
