@extends('layouts.app')
@section('content')
<div class="col-sm-12 ">

    <form class="" action="{{route('part.two.employee.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-sm-3 mb-2">
            <label  for="">Фото сотрудника</label>
            <input class="" type="file" name="photo" required>
        </div>
        <label  for="">Имя сотрудника </label>
        <input class="form-control" type="text" name="name"  placeholder="Фамилия Имя Отчество" required>
        <br>
        <label for="">Должность</label>
        <input class="form-control" type="text" name="post"  placeholder="Введите должность сотрудника" required>
        <br>
        <label  for="">Дата поступления на должность</label>
        <input class="form-control" type="text" name="date_of_employment"  placeholder="Год-месяц-число" required>
        <br>
        <label for="">Зароботная плата</label>
        <input class="form-control" type="number" name="wage"  placeholder="ЗП в числовом представлении" required>
        <br>
        <label for="">id начальника</label>
        <input class="form-control" type="number" name="chief_id"  placeholder="id начальника" required>
        <br>
        <input class="btn btn-outline-success" type="submit" value="Сохранить">
    </form>
</div>
@endsection