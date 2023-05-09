



@extends('layout.master')
@section('content')

<div class="container-fluid mx-auto">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <form id="loginFormValidation" action="{{route('students.store')}}" method="post">
                @csrf
                <div class="card-header text-center">
                        <h4 class="card-title">
                            Form create
                        </h4>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label class="control-label">Name </label>
                        <input class="form-control"  type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Gender </label>
                        <input type="radio" class="form-control"  name="gender" value="0"  checked>Nam
                        <input type="radio" class="form-control"  name="gender" value="1" >Nữ
                    </div>
                    <div class="form-group">
                        <label class="control-label">Birthdate </label>
                        <input type="date" class="form-control"  name="birthdate">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status </label>
                        @foreach ($arrStudentStatus as $option => $value)
                        <input type="radio" class="form-control"  name="status" value="{{$value}}"
                        @if ($loop->first)
                            checked
                        @endif
                        > {{$option}}
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label class="control-label">Courses</label>
                        <select name="course_id" id="">
                        @foreach ($courses as $course)
                            <option value="{{$course->id}}">
                            {{$course->name}}
                        </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="card-footer text-center">
                        <button class="btn btn-info btn-fill btn-wd">Submit Add</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
</div>
@endsection