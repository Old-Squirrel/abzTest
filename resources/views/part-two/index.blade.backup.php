@extends('layouts.app')
@section('content')
    <div class="col-sm-12 ">
        <div class="row mb-4">
            <hr class="col-sm-9 border-dark ">
            <a href="{{route('part.two.employee.create')}}" class="btn btn-outline-primary" title="Добавить сотрудника">Добавить
                сотрудника</a>
        </div>

        <div class="row mb-4">
            <hr class="col-sm-5 mr-1  border-dark ">
            <div class="col-sm-6 ml-4">
                <form action="" method="get">
                    <div class="">
                        <input class="col-sm-10 mr-3" type="search" name="searchRequest" placeholder="Поиск...">
                        <button id="searchSubmit" class="btn btn-outline-primary " type="submit">Найти</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped ">
            <thead>
            <th colspan="2" class="border border-dark text-center">Фото</th>
            <th colspan="2" class="border border-dark text-center">Имя</th>
            <th colspan="2" class="border border-dark text-center">Должность</th>
            <th colspan="2" class="border border-dark text-center">Дата приёма на работу,г-м-д</th>
            <th colspan="2" class="border border-dark text-center">Зароботная плата, $</th>
            <th colspan="2" class="border border-dark text-center">Начальник</th>
            <th colspan="2" class="border border-dark text-center">Действие</th>
            </thead>
            <tbody>
            <tr>
                <td colspan="2" class="border border-dark"></td>
                @foreach($fields as $field)
                    <td class="border border-dark text-center">
                        <form method="get">
                            <button id="ascSubmit" class="btn" title="сортировать по возрастанию">/\</button>
                            <input id="column" type="hidden" name="column" value="{{$field}}">
                            <input id="asc" type="hidden" name="sort" value="asc">
                        </form>
                    </td>
                    <td class="border border-dark text-center">
                        <form method="get" action="">
                            <button id="descSubmit" class="btn" title="сортировать по убыванию">\/</button>
                            <input id="column" type="hidden" name="column" value="{{$field}}">
                            <input id="desc" type="hidden" name="sort" value="desc">
                        </form>
                    </td>
                @endforeach
                <td colspan="2" class="border border-dark"></td>
            </tr>


            @foreach($employees as $employee)
                <tr>
                    <td colspan="2" class="">
                        <div class="">
                            @isset($employee->photo)
                                <img src="{{asset('/storage/'.$employee->photo)}}" width="120px" height="100px">
                            @else
                                <div class="empty-image-div-index border border-dark d-flex align-items-center ">
                                    <div class="col-sm-12 text-center"> Фотография отсутствует</div>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td class="" colspan="2">{{$employee->name}}</td>
                    <td class="text-center" colspan="2">{{$employee->post}}</td>
                    <td class="text-center" colspan="2">{{$employee->date_of_employment}}</td>
                    <td class="text-center" colspan="2">{{$employee->wage}}</td>
                    <td colspan="2">@if($employee->chief_id == 0)
                            Без начальника
                        @else
                            id - {{$employee->chief_id}}
                        @endif
                    </td>

                    <td>

                        <a href="{{route('part.two.employee.edit', $employee)}}" class="btn btn-outline-primary"
                           title="перейти к редактированию">Ред.</a>

                    </td>
                    <td>

                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                              action="{{route('part.two.employee.destroy',$employee)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-dark" title="удалить">Del.</button>
                        </form>

                    </td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
                <td colspan="12">
                    <ul class="pagination  justify-content-center">
                        {{$employees->appends(['column'=>$column, 'sort'=>$sort, 'searchRequest' =>$searchRequest ])-> links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
