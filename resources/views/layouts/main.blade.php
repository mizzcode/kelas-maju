<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  @include('layouts.head')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      {{-- Navbar --}}
      @include('layouts.navbar')
      {{-- Sidebar --}}
      @include('layouts.sidebar')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            @yield('content-header')
          </div>
          <div class="section-body">
            @yield('content-body')
          </div>
        </section>
      </div>
      {{-- Footer --}}
      @include('layouts.footer')
    </div>
  </div>

  @include('layouts.footer-script')
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
</body>
</html>
