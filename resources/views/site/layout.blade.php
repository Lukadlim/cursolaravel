<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    
    @foreach ($categoriesMenu as $categoryM)
      <li><a href="{{ route('site.category', $categoryM->id) }}"> {{ $categoryM->name }} </a></li>
    @endforeach
    
  </ul>

  <!-- Dropdown Structure -->
  <ul id='dropdown2' class='dropdown-content'>
    
    <li><a href="{{ route('admin.dashboard') }}"> Dashboard </a></li>
    <li><a href=" {{route('login.logout')}} ">Logout</a></li>
    
  </ul>

  <nav class="red">
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo center">CursoLaravel</a>
      <ul id="nav-mobile" class="left">

        <li><a href=" {{ route('site.index') }} ">Home</a></li>
        <li><a class='dropdown-trigger' href='' data-target='dropdown1'>Categories <i class="material-icons right">expand_more</i></a></li>
        <li><a href=" {{route('site.cart')}} ">Shopping cart  <span class="new badge light-blue darken-4" data-badge-caption=""> {{\Cart::getContent()->count()}} </span> </a></li>

      </ul>

      <ul id="nav-mobile" class="right">

        @auth
            
        <li><a class='dropdown-trigger' href='#' data-target='dropdown2'>Hello {{auth()->user()->firstname}} <i class="material-icons right">expand_more</i></a></li>
        @else
        <li><a href=" {{route('login.form')}} " >Login<i class="material-icons right">lock</i></a></li>

        @endauth
        
      </ul>

    </div>
  </nav>
      
  @yield('content')

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  {{-- Dropdown --}}
  <script>
    var elemDrop = document.querySelectorAll('.dropdown-trigger');
    var instanceDrop = M.Dropdown.init(elemDrop, {
      coverTrigger: false,
      constrainWidth: false
    });
  </script>
</body>
</html>