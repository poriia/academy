@include('layouts/admin/partials/head',['bodyLayoutClass'=>'sidebar-mini'])

<!-- Site wrapper -->
<div class="wrapper">
  @include('layouts/admin/partials/nav')
  @include('layouts/admin/partials/sidebar')
  <div class="content-wrapper">
    @yield('body')
  </div>
  @include('layouts/admin/partials/main-footer')
</div>
<!-- ./wrapper -->

@include('layouts/admin/partials/footer')