
@include('admin.layouts.header')

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

@include('admin.layouts.sidebar')
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
  
@include('admin.layouts.main-menu')


          <!-- Content wrapper -->
          <div class="content-wrapper">


@yield('main-section')
@include('admin.layouts.footer')


</div>
<!-- Content wrapper -->

</div>

          <!-- / Layout page -->
        </div>
  
    </div>
    <!-- / Layout wrapper -->

@include('admin.layouts.footerJS')

