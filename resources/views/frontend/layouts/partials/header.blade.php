<header role="banner" id="fh5co-header">
      <div class="container">
        <nav class="navbar navbar-default">
          <div class="row">
            <div class="col-md-3">
              <div class="fh5co-navbar-brand" style="width: 120% !important">
                <a class="fh5co-logo" href="index.html"><span style="font-size: 30px; margin-bottom: 10px;">BKDN</span><small style="font-size: 10px">{{ __('Science topics management') }}</small></a>
              </div>
            </div>
            <div class="col-md-9 main-nav">
              <ul class="nav text-right">
                <li class="active"><a href="/"><span>{{__('Home')}}</span></a></li>
                <li><a href="">{{ __('Science Topics') }}</a></li>
                <li><a href="">{{ __('About US') }}</a></li>
                <li>
                @if (Auth::check())
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ Auth::user()->path == null ? asset('img/default1.jpg') : asset(Auth::user()->path) }}" class="img-circle user-image" alt="User Image">
                    <span class="hidden-xs">{{ Auth::user()->full_name }}<sup class="badge" style="background-color: red;margin-left: 1px">  {{ $messages->count()> 0 ? ' '.$messages->count() : '' }}</sup></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- Menu Footer-->
                    <div>
                      <a href="{{ route('profile.show', Auth::user()->id) }}" class="btn btn-xs pull-left user-dropdown">{{ __('Profile') }}</a>
                      @if(Auth::user()->is_admin == App\User::ROLE_ADMIN)
                        <a href="{{ route('admin.index')}}" class="btn btn-xs pull-left user-dropdown">{{ __('Admin Management') }}</a>
                      @endif
                      <a class="btn btn-xs pull-left user-dropdown" href="">{{ __('You have :message message', ['message' => $messages->count()]  ) }}</a>
                      <a href="{{ route('logout') }}" id="logout" class="btn btn-xs pull-left user-dropdown">{{__('Log out')}}</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden="">
                        {{ csrf_field() }}
                      </form>
                    </div>
                  </ul>
                @else
                  <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                  </li>
                @endif

              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- END: header -->