<!DOCTYPE html>
<html lang="en">
  <!-- .css styles-->
  @include('acl::admin.partials.html-head')
  @yield('styles')
  <!-- ./css styles-->
  @if(Request::is('login'))
    <body class="hold-transition register-page">
  @else
    <body class="hold-transition login-page">
  @endif

    @yield('content')

    <!-- .scripts -->
    @include('acl::admin.partials.footer-scripts')
    @yield('scripts')
    <!-- /.scripts -->
</body>
</html>
