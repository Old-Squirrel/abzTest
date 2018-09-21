@extends('layouts.app')

@section('content')


    <div class="col-sm-12 ">

        <form class="" action="{{route('part.two.employee.update', $employee)}}" method="POST"
              enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            {{csrf_field()}}
            <div class="col-sm-3 mb-5 ">
                @isset($employee->photo)
                    <img src="{{asset('/storage/'.$employee->photo)}}">
                @else
                    <div class="empty-image-div-edit border border-dark d-flex align-items-center ">
                        <div class="col-sm-12 text-center"> Фотография отсутствует</div>
                    </div>
                @endif
                <input class="mt-2" type="file" name="photo">
            </div>
            <label for="">Имя сотрудника </label>
            <input class="form-control" type="text" name="name"
                   value="{{$employee->name}}" required>
            <br>
            <label for="">Должность</label>
            <input class="form-control" type="text" name="post"
                   value="{{$employee->post}}" required>
            <br>
            <label for="">Дата поступления на должность</label>
            <input class="form-control" type="text" name="date_of_employment"
                   value="{{$employee->date_of_employment}}" required>
            <br>
            <label for="">Зароботная плата</label>
            <input class="form-control" type="number" name="wage"
                   value="{{$employee->wage}}" required>
            <br>
            <label for="">id начальника</label>
            <input class="form-control" type="number" name="chief_id" value="{{$employee->chief_id}}" required>
            <br>
            <input class="btn btn-outline-success" type="submit" value="Редактировать">
        </form>
    </div>
@endsection