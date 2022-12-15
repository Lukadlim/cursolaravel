@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

<form action=" {{route('users.store')}} " method="post">
    @csrf

    <label for="firstname">First name: </label> <br>
    <input type="text" name="firstname" id="firstname"> <br>

    <label for="lastname">Last name: </label> <br>
    <input type="text" name="lastname" id="lastname"> <br>

    <label for="email">Email: </label> <br>
    <input type="email" name="email" id="email"> <br>

    <label for="password">Password: </label> <br>
    <input type="password" name="password" id="password"> <br>

    <button type="submit">Register</button>
</form>