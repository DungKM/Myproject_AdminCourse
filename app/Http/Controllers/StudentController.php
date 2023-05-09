<?php

namespace App\Http\Controllers;

use App\Enums\StudentStatusEnum;
use App\Http\Requests\Student\StoreRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
class StudentController extends Controller
{

    private  $model;

    public function __construct()
    {
        $this->model = new Student();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);
        View::share('title', $title);

        $arrStudentStatus = StudentStatusEnum::getArrayView();
        View::share('arrStudentStatus',$arrStudentStatus);
    }
    public function index()
    {
        return view(view: 'student.index');
    }
    public function api()
    {
        return DataTables::of($this->model::query())
            ->editColumn('age', function ($object) {
                return $object->age;
            })
            ->addColumn('edit', function ($object) {
                return route('students.edit', $object);
            })
            ->addColumn('destroy', function ($object) {
                return route('students.destroy', $object);
            })
            ->make(true);
    }
    public function create()
    {
        //
        $courses = Course::get();
        
        
        return view('student.create',[
            'courses' => $courses
        ]);
    }
    public function store(StoreRequest $request)
    {
        $this->model->create($request->validated());
        
        return redirect()->route('students.index')->with('success','Đã thêm thành công');
    }

}