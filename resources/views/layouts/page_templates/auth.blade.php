<div class="wrapper ">
    @include('layouts.navbars.sidebar')
    <div class="main-panel">
        @include('layouts.navbars.navs.auth')
        <div class="content">
            <div class="container-fluid">
                @include('composent.alert_message')
                @yield('content')
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
</div>
