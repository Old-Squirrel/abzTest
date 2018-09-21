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

        <table id="employees-table" class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Фото</th>
                <th scope="col" class="employee-sort" data-column-name="name">Имя</th>
                <th scope="col" class="employee-sort" data-column-name="post">Должность</th>
                <th scope="col" class="employee-sort" data-column-name="date_of_employment">Принят</th>
                <th scope="col" class="employee-sort" data-column-name="wage">ЗП $</th>
                <th scope="col" class="employee-sort" data-column-name="chief_id">Начальник</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td  class="border border-dark"></td>
                @foreach($fields as $field)

                    <td class="border border-dark text-center">
                      <div class="btn-group" role="group">
                        <form method="get">
                            <button id="ascSubmit" class="btn btn-outline-dark" title="сортировать по возрастанию">/\</button>
                            <input id="column" type="hidden" name="column" value="{{$field}}">
                            <input id="asc" type="hidden" name="sort" value="asc">
                        </form>

                        <form method="get" action="">
                            <button id="descSubmit" class="btn btn-outline-dark" title="сортировать по убыванию">\/</button>
                            <input id="column" type="hidden" name="column" value="{{$field}}">
                            <input id="desc" type="hidden" name="sort" value="desc">
                        </form>
                      </div>
                    </td>

                @endforeach
                <td  class="border border-dark"></td>
            </tr>

            @foreach($employees as $employee)
                <tr>
                    <td  class="">
                            @isset($employee->photo)
                                <img src="{{asset('/storage/'.$employee->photo)}}" width="120px" height="100px">
                            @else
                                <div class="empty-image-div-index border border-dark d-flex align-items-center ">
                                    <div class="col-sm-12 text-center"> Фотография отсутствует</div>
                                </div>
                            @endif
                    </td>
                    <td class="" >{{$employee->name}}</td>
                    <td class="text-center" >{{$employee->post}}</td>
                    <td class="text-center" >{{$employee->date_of_employment}}</td>
                    <td class="text-center" >{{$employee->wage}}</td>
                    <td >@if($employee->chief_id == 0)
                            Без начальника
                        @else
                            id - {{$employee->chief_id}}
                        @endif
                    </td>

                    <td>
                    <div class="btn-group" role="group">
                        <a href="{{route('part.two.employee.edit', $employee)}}" class="btn btn-outline-primary"
                           title="перейти к редактированию">Upd.</a>


                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                              action="{{route('part.two.employee.destroy',$employee)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-dark" title="удалить">Del.</button>
                        </form>
                    </div>
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
