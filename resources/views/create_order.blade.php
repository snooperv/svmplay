@extends('layouts.layout')

@section('title')
    {{ "Записаться" }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создать запись</div>
                    <div class="card-body">
                        <form method="POST" action="/make-order">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Время</label>
                                <div class="col-md-6">
                                    <input id="date" name="date" value="{{ old('date') }}" type="date"
                                           class="form-control"
                                           required autocomplete="date" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time" class="col-md-4 col-form-label text-md-right">Время</label>
                                <div class="col-md-6">
                                    <input id="time" name="time" value="{{ old('time') }}" type="time"
                                           class="form-control" min="10:00" max="19:00"
                                           required autocomplete="time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="masterId" class="col-md-4 col-form-label text-md-right">Мастер</label>
                                <div class="col-md-6">
                                    <select id="masterId" name="masterId" value="{{ old('masterId') }}"
                                            class="form-control" required autocomplete="masterId">
                                        <option value="1">Кирилл</option>
                                        <option value="2">Никита</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="comment" class="col-md-4 col-form-label text-md-right">Комментарий</label>
                                <div class="col-md-6">
                                    <textarea id="comment" name="comment" value="{{ old('comment') }}"
                                              class="form-control" required autocomplete="comment"></textarea>
                                </div>
                            </div>
                            <button type="submit" value="Записаться" class="btn-create-order">Записаться</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
