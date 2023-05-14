<form action="{{route('process_login')}}" method="post">
    
    @csrf
    Email
    <input type="email" name="email" id="">
    <br>
    Password 
    <input type="password" name="password" id="">
    <br>
    <button>Login</button>
</form>