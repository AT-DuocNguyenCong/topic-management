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
                <li><a href="{{ route('user.fields.index') }}">{{ __('Science Topics') }}</a></li>
                <li><a href="">{{ __('About US') }}</a></li>
                <li><a href="">{{ __('Contact') }}</a></li>
                <li>
                  @if (Auth::check())
                    <div class="dropdown">
                      <a class="cls-button-link  dropdown-toggle " type="button" data-toggle="dropdown"> {{ Auth::user()->full_name }}</a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="{{ route('profile.show', Auth::user()->id) }}">{{ __('Profile') }}</a>
                        </li>
                        @if(Auth::user()->is_admin == App\User::ROLE_ADMIN)
                          <li><a href="/admin">{{ __('Admin Management') }}</a></li>
                        <li><a href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
                        @endif
                      </ul>
                    </div>
                    @else
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                  @endif
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- END: header -->