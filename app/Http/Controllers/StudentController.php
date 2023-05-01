<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view(
            view: 'students.index',
            data: [
                'students' => $students
            ]
        );
    }
    public function create()
    {
        return view(
            view: 'students.create'
        );
    }
    public function store(Request $request){
      $students = new Student();
      $students ->first_name = $request->get(key: 'first_name');
      $students ->last_name = $request->get(key: 'last_name');
      $students ->gender = $request->get(key: 'gender');
      $students ->birthdate = $request->get(key: 'birthdate');
      $students->save();
    }
}
