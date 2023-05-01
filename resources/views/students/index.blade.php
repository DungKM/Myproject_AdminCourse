<h1>
    Danh sách sinh viên
</h1>
<a href="{{route('create')}}">
    Add Student
</a>
<table border="1">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
    </tr>
    @foreach ($students as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->fullName}}</td>
            <td>{{$item->age}}</td>
            <td>{{$item->genderName}}</td>
            
        </tr>
    @endforeach
    
</table>