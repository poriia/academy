@include('admin/partials/head')
@include('admin/partials/nav')
@include('admin/partials/banner')
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        @yield('body')
    </div>
</main>

@include('admin/partials/footer')