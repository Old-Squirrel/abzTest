@extends('layouts.app')
@section('content')

    <table class="table table-striped ">
        <thead>
        <th colspan="2" class="border border-dark text-center">Имя</th>
        <th colspan="2" class="border border-dark text-center">Должность</th>
        <th colspan="2" class="border border-dark text-center">Дата приёма на работу</th>
        <th colspan="2" class="border border-dark text-center">Зароботная плата, $</th>

        </thead>
        <tbody>
        @foreach($employees as $employee)

                @if($employee->subordinates->count()>0)
                    <td class="text-left" colspan="2">
                       {{$employee->name}}
                    </td>
                <td class="text-center" colspan="2">{{$employee->post}}</td>
                <td class="text-center" colspan="2">{{$employee->date_of_employment}}</td>
                <td class="text-center" colspan="2">{{$employee->wage}}</td>
                    </tr>

                        @include('partials.subordinates',['employees'=>$employee->subordinates])

                @else
<tr class="">
    <td class="text-left" colspan="2">
        <p class="ml-5"> - {{$employee->name}}</p>
    </td>
                        <td class="text-center" colspan="2">{{$employee->post}}</td>
                        <td class="text-center" colspan="2">{{$employee->date_of_employment}}</td>
                        <td class="text-center" colspan="2">{{$employee->wage}}</td>
                    </tr>
                    @endif

                    @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="12">
                <ul class="pagination  justify-content-center">
                    {{$employees-> links()}}
                </ul>
            </td>
        </tr>
        </tfoot>
 </table>
      @endsection
