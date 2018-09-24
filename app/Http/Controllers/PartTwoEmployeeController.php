<?php

namespace App\Http\Controllers;


use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartTwoEmployeeController extends Controller
{

    public function index(Request $request)
    {

        $fields = ['name', 'post', 'date_of_employment', 'wage', 'chief_id'];


        //данные о сортировке
        $column = $request->input('column', 'id');
        $sort = $request->input('sort', 'asc');
        $searchRequest = $request->input('searchRequest');

        $searchResult = $this->getSearchResult($request);

        $employees = $searchRequest != NULL
            ? $searchResult->with('subordinates')
                ->orderBy($column, $sort)
                ->paginate(100)
            : Employee::with('subordinates')
                ->with('chiefs')
                ->orderBy($column, $sort)
                ->paginate(100);

        return view('part-two.index', [
            'fields' => $fields,
            'employees' => $employees,
            'column' => $column,
            'sort' => $sort,
            'searchRequest' => $searchRequest,
        ]);

    }

//    public function list(Request $request)
//    {
//        return response()->json(
//            Employee::with('subordinates')
//                ->with('chiefs')
//                ->orderBy($request->post("column", "id"), $request->post("order", "asc"))
//                ->limit(100)
//                ->get());
//    }



public function getSearchResult(Request $request){

    $searchRequest = $request->input('searchRequest');


    // являются ли данные из посика датой
    if (strtotime($searchRequest) != Null):
        $searchResult = Employee::where('date_of_employment', '=', $searchRequest);
    else:
        $searchResult = Employee::Where('name', 'LIKE', "%$searchRequest%")
            ->orWhere('post', 'LIKE', "%$searchRequest%")
            ->orWhere('wage', 'LIKE', "%$searchRequest%")
           ;
    endif;


     return $searchResult;
}



    public function create()
    {

        return view('part-two.create', [
            'employee' => []
        ]);
    }


    public function store(Request $request)
    {
        $pathToPhoto = $request->file('photo')->store('uploads', 'public');
        Employee::create([
            'name' => $request->name,
            'post' => $request->post,
            'date_of_employment' => $request->date_of_employment,
            'wage' => $request->wage,
            'chief_id' => $request->chief_id,
            'photo' => $pathToPhoto
        ]);
        return redirect()->route('part.two.employee.index');
    }


    public function edit(Employee $employee)
    {
        return view('part-two.edit', [
            'employee' => $employee
        ]);
    }


    public function update(Request $request, Employee $employee)
    {
        //если фото изменилось, удалить старое, добавить новое
        if ($request->has('photo')):
            Storage::disk('public')->delete('/' . $employee->photo);
            $pathToPhoto = $request->file('photo')->store('uploads', 'public');
        else:
            $pathToPhoto = $employee->photo;
        endif;

        $employee->update([
            'name' => $request->name,
            'post' => $request->post,
            'date_of_employment' => $request->date_of_employment,
            'wage' => $request->wage,
            'chief_id' => $request->chief_id,
            'photo' => $pathToPhoto
        ]);
        return redirect()->route('part.two.employee.index');
    }


    public function destroy(Employee $employee)
    {
        
        if($employee->subordinates()->count()>0):
            $employee->subordinates()->update(['chief_id' => $employee->chief_id]);
        endif;

        if ($employee->photo != NULL):
            Storage::disk('public')->delete('/' . $employee->photo);
        endif;
        $employee->delete();
        return redirect()->route('part.two.employee.index');

    }
}
