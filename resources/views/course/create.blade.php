<form action="{{route('courses.store')}}" method="post">
        @csrf
        Name
        <input type="text" name="name">
        <br>
        <button>Add</button>
</form>