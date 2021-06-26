@extends('layouts.layout')

@section('title')
    {{ "Личный кабинет" }}
@endsection

@section('content')
    <div class="description">
        <h2>Мои данные</h2>
        <p>Имя:      {{ Auth::user()->name }}</p>
        <p>Почта:   {{ Auth::user()->email }}</p>
        <p>Изменить пароль:</p>
        <div class="card-body">
            <form method="post" action="account">
                @csrf
                @method('PATCH')

                <div class="form-group row">
                    <label  for="password" class="col-md-4 col-form-label text-md-right">{{ __('Новый пароль') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Повторите пароль') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-save">
                            {{ __('Сохранить') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <button class="btn-delete">Удалить запись</button>
    </div>

@endsection
