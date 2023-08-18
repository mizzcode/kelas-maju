    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield("title")</title>
    @include('layouts.head')
    </head>

    <body>
    <div id="app">
        <section class="section">
        <div class="container">
            @yield("content")
            @include('layouts.footer')
        </div>
        </section>
    </div>

    @include('layouts.footer-script')

    {{-- SweetAlert2 --}}
    @include('sweetalert::alert')
    </body>
    </html>