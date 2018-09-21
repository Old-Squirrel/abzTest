@foreach($employees as $employee)

    @if($employee->subordinates->count()>0)
        <tr>
            <td class="text-left" colspan="2">
                <p class="ml-5"> - {{$employee->name}}</p>
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
