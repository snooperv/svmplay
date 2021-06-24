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
                        <form method="POST" action="#">
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Время</label>
                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control"
                                           required  autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-md-4 col-form-label text-md-right">Время</label>
                                <div class="col-md-6">
                                    <input id="time" type="time" class="form-control" min="10:00" max="19:00"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Мастер</label>
                                <div class="col-md-6">
                                    <input id="name" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="comment" class="col-md-4 col-form-label text-md-right">Комментарий</label>
                                <div class="col-md-6">
                                    <textarea id="comment" class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
