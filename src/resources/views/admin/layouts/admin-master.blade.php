<!DOCTYPE html>

<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

  <!-- css styles-->
  @include('acl::admin.partials.html-head')
  @yield('styles')
  <!-- ./css styles-->
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-blue sidebar-mini">

      <div class="wrapper">

            <!-- Main Header -->
            @include('acl::admin.partials.header-navbar')

            <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
                  <!-- Left side column. contains the logo and sidebar -->
                  @include('acl::admin.partials.left-sidebar')

                  <!-- Content Header (Page Breadcrumb) -->
				          @include('acl::admin.partials.page-breadcrumb')

                  <section class="content"><!-- Main content -->
                      <!-- Your Page Content Here -->
                      @yield('content')
                  </section><!-- /.content -->

            </div><!-- /.content-wrapper -->

            <!-- Main Footer -->
            @include('acl::admin.partials.footer')

            <!-- Control Sidebar -->
            @include('acl::admin.partials.control-sidebar')
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

      </div><!-- ./wrapper -->

      <!-- scripts -->
      @include('acl::admin.partials.footer-scripts')
      @yield('scripts')
      <!-- ./scripts -->

      <!-- Optionally, you can add Slimscroll and FastClick plugins.
           Both of these plugins are recommended to enhance the
           user experience. Slimscroll is required when using the
           fixed layout. -->

  </body>
</html>
