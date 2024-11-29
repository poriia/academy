@include('layouts/admin/partials/head')
@include('layouts/admin/partials/nav')
@include('layouts/admin/partials/banner')
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        @yield('body')
    </div>
</main>
@include('layouts/admin/partials/footer')