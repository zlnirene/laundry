<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laundry</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://unpkg.com/alpinejs" defer></script>
    

</head>
<body class="font-sans bg-gradient-to-b from-background to-nav h-screen w-full">
  <header class="bg-nav">
    <nav class="flex justify-between items-center w-[90%] bg-nav mx-auto h-[8vh]">
      <div class="flex gap-2 font-medium text-navy w-fit h-[6vh]">
        <img class="w-8" src="{{ url('images/icon.png') }}" alt="...">
        <div class="flex flex-col leading-tight">
          <div class="text-[16px]">Laundry</div>
          <div class="text-[14px]">Admin Page</div>
        </div>
      </div>
      <div class="md:static absolute bg-nav md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
        <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-6 text-nav-text text-[16px] font-medium *:*:hover:text-navy">
          <li class="">
            <a class="" href="#">Dashboard</a>
          </li>
          <li>
            <a class="" href="{{ route('transaction.index') }}">Transaction</a>
          </li>
          <li>
            <a class="" href="{{ route('item.index') }}">Item</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="">

    <div class="">{{ Breadcrumbs::render() }}</div>
  </div>
  
    <div class="">
        @yield('content')
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>