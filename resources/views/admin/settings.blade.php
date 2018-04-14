@extends('layouts.admin')

@section('content')
    <h2 class="text-center my-2">
        Настройки
    </h2>
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('admin.settings.password') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="oldpass">Старый пароль</label>
                    <input type="password" class="form-control" name="oldpass" id="oldpass" placeholder="Старый пароль">
                </div>
                <div class="form-group">
                    <label for="newpass">Новый пароль</label>
                    <input type="password" class="form-control" name="newpass" id="newpass" placeholder="Новый пароль">
                </div>
                <div class="form-group">
                    <label for="chkpass">Подтверждение пароля</label>
                    <input type="password" class="form-control" name="chkpass" id="chkpass" placeholder="Подтверждение пароля">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fas-save"></i> Сохранить
                </button>
            </form>
        </div>
    </div>
@endsection
