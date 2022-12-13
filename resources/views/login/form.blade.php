@if ($message = Session::get('error'))
    {{ $message }}    
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
    
@endif

<form action=" {{route('login.auth')}} " method="post">
    @csrf

    <label for="email">Email: </label> <br>
    <input type="email" name="email" id="email"> <br>

    <label for="password">Password: </label> <br>
    <input type="password" name="password" id="password"> <br>

    <button type="submit">Login</button>
</form>