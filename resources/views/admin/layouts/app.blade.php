<x-app-layout></x-app-layout>

<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.admin-css')
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.navbar')
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            @yield('content')

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © ashRestaurent 2023</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Design & Develop by <a href="https://www.ayshatech.com" target="_blank">AyshaTech</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->

    </div>

    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('admin.layouts.admin-js')
  </body>
</html>
