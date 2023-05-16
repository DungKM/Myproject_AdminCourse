<form action="{{ route('process_register') }}" method="post">
    @csrf

    name
    <input type="name" name="name" id="">
    <br>
    Email
    <input type="email" name="email" id="">
    <br>
    Password
    <input type="password" name="password" id="">
    <br>
    <button>register</button>
    <a href="{{ route('login') }}">
        Login
    </a>
</form>
