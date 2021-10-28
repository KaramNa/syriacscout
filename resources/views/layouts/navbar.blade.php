<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark" wire:ignore>
    <a href="{{ route('user.change-password', auth()->id() ) }}" class="navbar-brand">{{ auth()->user()->user_name }}</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="pr-0 mt-2 text-center navbar-nav nav-pills mt-lg-0">
            @can('superUser')
                <li class="nav-item">
                    <a class="text-white nav-link active"
                        href="{{ route('user.register') }}">{{ __('navbar.add user') }}</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link"
                        href="{{ route('user.management') }}">{{ __('navbar.manage users') }}</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('user.regiments') }}">{{ __('navbar.regiments') }}</a>
                </li>
            @endcan

            @can('SupeUser-admin')
                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('scout.add') }}">{{ __('navbar.add scout') }}</a>
                </li>
            @endcan

            <li class="nav-item">
                <a class="text-white nav-link" href="{{ route('scout.search') }}">{{ __('navbar.search') }}</a>
            </li>
            <li class="nav-item">
                <a class="text-white nav-link" href="{{ route('user.logout') }}">{{ __('navbar.log out') }}</a>
            </li>
        </ul>
    </div>
</nav>

@section('scripts')
    <script>
        $(document).ready(function() {
            var url = [location.protocol, '//', location.host, location.pathname].join('');
            $('.nav-link.active').removeClass('active');
            ($('.nav-link[href="' + url + '"]').addClass('active'));
        });
    </script>
@endsection
