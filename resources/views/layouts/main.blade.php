@include('layouts.header')

<!-- NavBar -->
@include('layouts.navbar')
<!-- Navbar -->

<main class="container-fluid px-4 flex-grow-1" style="padding-top: 70px;">

    <!-- Container Fluid-->
    @yield('content')
    <!---Container Fluid-->

</main>
@include('layouts.footer')




