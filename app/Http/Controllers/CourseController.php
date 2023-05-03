<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\DestroyRequest;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->get(key:'q');

        $data = Course::query()
        ->where(column:'name', operator:'like', value:'%'.$search.'%')
        ->paginate(2);
        $data->appends(['q'=>$search]);
        return view('course.index', [
            'data' => $data,
            'search'=>$search
        ]);
    }

   
    public function create()
    {
        //
        return view('course.create');
    }

    
    public function store(StoreRequest $request)
    {
        // $object = new Course();
        // $object->fill(attributes: $request->except(keys: '_token')); // thêm toàn bộ thông tin trừ _token
        // $object->save();
        Course::create($request->validated());
        return redirect()->route('courses.index');
    }

   
    public function edit(Course $course)
    {
        return view(view: 'course.edit', data: [
            'each' => $course,
        ]);
    }

    
    public function update(UpdateRequest $request, Course $course)
    {
        // Course::where('id', $course->id)->update(
        //     $request->except(keys:[
        //         '_token',
        //         '_method',
        //     ])
        // );
        $course->update(
            attributes:$request->except(keys:[
                '_token',
                '_method',
            ]),
        );
        return redirect()->route('courses.index');

        //
    }
    public function destroy(DestroyRequest $request, $course)
    {
        // $course->delete();
        Course::destroy($course);
        // Course::where('id',$course->id)->delete();
        return redirect()->route('courses.index');
    }
}
