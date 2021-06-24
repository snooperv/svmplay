@extends('layouts.layout')

@section('title')
    {{ "Успешное удаление записи" }}
@endsection

@section('content')
<div class="orders">
    <h1>Удаление записи произошло успешно!</h1>
    <a href="/orders" class="floating-button">Вернуться назад</a>
</div>
@endsection
