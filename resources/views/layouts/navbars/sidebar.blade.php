<div class="sidebar" data-color="orange" data-background-color="white"
     data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="https://creative-tim.com/" class="simple-text logo-normal">
            {{ __('Cabinet') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Accueil') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'patient' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('patient.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Patients') }}</p>
                </a>

            </li>
            <li class="nav-item{{ $activePage == 'consultation' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('consultation.index') }}">
                    <i class="material-icons">library_books</i>
                    <p>{{ __('Fiches de consultation') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'rendezvous' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('rendezvous.index') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>{{ __('Rendez-Vous') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'certificat' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('certificat.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Certificat') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'antecedent' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('antecedent.index')}}">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Antecedent') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'diagnostic' ? ' active' : '' }}">
                <a class="nav-link" href="{{route('diagnostic.index')}}">
                    <i class="material-icons">language</i>
                    <p>{{ __('Diagnostic') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'analyse' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('analyse.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Analyses') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'ordonnance' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('ordonnance.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Ordonnances') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
