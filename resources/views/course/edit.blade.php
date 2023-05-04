
@extends('layout.master')
@section('content')

<div class="container-fluid mx-auto">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <form id="loginFormValidation" action="{{route('courses.update',$each)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header text-center">
                        <h4 class="card-title">
                                Form edit
                        </h4>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label class="control-label">Name <star>   
                                @if ($errors-> has('name'))
                                <span class="error">
                                        {{$errors -> first('name')}}
                                </span>
                              @endif</star></label>
                        <input class="form-control"  type="text" name="name"  value="{{$each->name}}">
                    </div>
                </div>
                <div class="card-footer text-center">
                        <button class="btn btn-info btn-fill btn-wd">Submit Edit</button>
                </div>
            </form>
        </div>
             </div>
         </div>
     </div>
</div>
@endsection