@foreach($employees as $employee)

    @if($employee->subordinates->count()>0)
        <tr class="bg-white">
            <td class="text-right"></td>
            <td class="text-left">
                <p class="ml-5"> - {{$employee->name}}</p>
            </td>
            <td class="text-center" >{{$employee->post}}</td>
            <td class="text-center" >{{$employee->date_of_employment}}</td>
            <td class="text-center" >{{$employee->wage}}</td>
            <td class="tex-left" >  <p class="ml-5">  - {{$employee->chiefs->name or "Без начальника"}}</p></td>
       <td></td>
        </tr>
            @include('partials.subordinates',['employees'=>$employee->subordinates])
    @else
        <tr class="bg-white">
            <td class="text-right"></td>
            <td class="text-left" >
                <p class="ml-5"> - {{$employee->name}}</p>
            </td>
            <td class="text-center" >{{$employee->post}}</td>
            <td class="text-center" >{{$employee->date_of_employment}}</td>
            <td class="text-center" >{{$employee->wage}}</td>
            <td class="text-left" > <p class="ml-5">  - {{$employee->chiefs->name or "Без начальника"}}</p></td>
       <td></td>
        </tr>
    @endif

@endforeach
