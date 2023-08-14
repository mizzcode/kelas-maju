<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    {{-- ini buat layout landing page --}}
    <div class="container">
        <div class="card">
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>