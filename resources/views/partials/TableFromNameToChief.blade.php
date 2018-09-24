
    <td class="text-left">
        <p class=""> {{$employee->name}}</p>
    </td>
    <td class="text-center" >{{$employee->post}}</td>
    <td class="text-center" >{{$employee->date_of_employment}}</td>
    <td class="text-center" >{{$employee->wage}}</td>
    <td class="text-left" >{{$employee->chiefs->name or "Без начальника"}}</td>
