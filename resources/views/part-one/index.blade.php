@extends('layouts.app')
@section('content')

    <table class="table">
        <thead class="thead-dark">
        <th colspan="2" class="border border-dark text-center">Имя</th>
        <th class="border border-dark text-center">Должность</th>
        <th class="border border-dark text-center">Принят</th>
        <th class="border border-dark text-center">ЗП, $</th>
        <th colspan="2" class="border border-dark text-center">Начальник</th>

        </thead>
        <tbody>
        @foreach($employees as $employee)

            @if($employee->subordinates->count()>0)
                <tr>
                    <td></td>
               @include('partials.TableFromNameToChief',['$employees'=>$employee])
                <td></td>
                </tr>

                @include('partials.subordinates',['employees'=>$employee->subordinates])

            @else
                <tr>
                <td></td>
                @include('partials.TableFromNameToChief',['$employees'=>$employee])
                <td></td>
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
