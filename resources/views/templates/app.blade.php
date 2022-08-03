<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>To-Do</title>
  @vite('resources/js/app.js')
</head>
<body class="bg-gray-600">
  <nav class="p-6 bg-white flex justify-between">
    <ul class='flex items-center'>
      <li>
        <a href='' class='p-3'> Home </a>
      </li>
      <li>
        <a href='' class='p-3'> Dashboard </a>
      </li>
      <li>
        <a href='' class='p-3'> Post </a>
      </li>
    </ul>
    <ul class='flex items-center'>
      @auth
        <li>
          <a href='' class='p-3'>David</a>
        </li>
        <li>
          <a href='{{ route('logout') }}' class='p-3'>Logout</a>
        </li>
      @endauth

      @guest
        <li>
          <a href='{{ route('login') }}' class='p-3'> Login </a>
        </li>
        <li>
          <a href='{{ route('register') }}' class='p-3'> Register </a>
        </li>
      @endguest


    </ul>
  </nav>
  @yield('content')
</body>
</html>
