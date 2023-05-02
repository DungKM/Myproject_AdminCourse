<table border="1" width="100%">
    <h1>Courses</h1>
    <a href="{{route('courses.create')}}">Add Courses</a>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>
    @foreach ($data as $each)
        <tr>
            <td>{{$each->id}}</td>
            <td>{{$each->name}}</td>
            <td>{{ $each->year_created_at }}</td>
            <td>
                <form action="{{route('courses.destroy',$each)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>
            <td>
                <a href="{{route('courses.edit',$each)}}">Edit</a>
            </td>
        </tr>
    @endforeach
</table>