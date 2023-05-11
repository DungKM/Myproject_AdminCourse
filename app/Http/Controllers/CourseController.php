<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\DestroyRequest;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Course();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);
        View::share('title', $title);
    }
    public function index()
    {
        return view('course.index');
    }
    public function api()
    {
        return DataTables::of($this->model->withCount('students'))
            ->editColumn('created_at', fn ($obj) => $obj->year_created_at)
            ->addColumn('edit', fn ($obj) => route('courses.edit', $obj))
            ->addColumn('destroy', fn ($obj) => route('courses.destroy', $obj))
            ->make(true);
    }
    public function apiName(Request $request)
    {
        return $this->model
            ->where(column: 'name', operator: 'like', value: '%' .  $request->get(key: 'q') . '%')
            ->get([
                'id',
                'name'
            ]);
    }


    public function create()
    {
        //
        return view('course.create');
    }


    public function store(StoreRequest $request)
    {
        $this->model::create($request->validated());
        return redirect()->route('courses.index');
    }


    public function edit(Course $course)
    {
        return view(view: 'course.edit', data: [
            'each' => $course,
        ]);
    }
    public function update(UpdateRequest $request,  $courseId)
    {
        $object = $this->model->find($courseId);
        $object->fill($request->validated());
        $object->save();
        return redirect()->route('courses.index');
    }
    public function destroy(DestroyRequest $request, $courseId)
    {
        $this->model->where('id', $courseId)->delete();
        $arr['status'] = true;
        $arr['message'] = '';
        return response($arr, 200);
    }
}
