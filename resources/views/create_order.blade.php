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
                        <form method="POST" action="make-order">
                            @csrf
                            <div class="form-group row">
                                <label for="order_time" class="col-md-4 col-form-label text-md-right">Время</label>
                                <div class="col-md-6">
                                    <input id="order_time" type="date" class="form-control"
                                           required  autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="order_time" class="col-md-4 col-form-label text-md-right">Время</label>
                                <div class="col-md-6">
                                    <input id="order_time" type="time" class="form-control" min="10:00" max="19:00"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="master_id" class="col-md-4 col-form-label text-md-right">Мастер</label>
                                <div class="col-md-6">
                                <select id="master_id" class="form-control">
                                    <option>Kirill</option>
                                    <option>Vadim</option>
                                </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="comment" class="col-md-4 col-form-label text-md-right">Комментарий</label>
                                <div class="col-md-6">
                                    <textarea id="comment" class="form-control"></textarea>
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
