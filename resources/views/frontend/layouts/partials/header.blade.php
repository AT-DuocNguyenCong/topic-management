<div style="position: relative;">
  <div class="dropdown" style="height: 40px; position: absolute; right: 0">
    <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ Cookie::get('locale') == 'vi' ? __('Tiếng Việt') : __('English') }}
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li class="cls-link">
        <a href="{{ route('language', ['lang' => 'en']) }}">
          {{ __('English') }}
        </a>
      </li>
      <li class="cls-link">
        <a href="{{ route('language', ['lang' => 'vi']) }}">
          {{ __('VietNamese') }}
        </a>
      </li>
    </ul>
  </div>
{{-- header --}}
<header role="banner" id="fh5co-header">
      <div class="container">
        <nav class="navbar navbar-default">
          <div class="row">
            <div class="col-md-3">
              <div class="fh5co-navbar-brand" style="width: 120% !important">
                <a class="fh5co-logo" href="{{route('home.index')}}"><span style="font-size: 30px; margin-bottom: 10px;">BKDN</span><small style="font-size: 10px">{{ __('Science topics management') }}</small></a>
              </div>
            </div>
            <div class="col-md-9 main-nav">
              <ul class="nav text-right">
                <li class="{{isActiveRoute('home.index')}}"><a href="{{ route('home.index') }}"><span>{{__('Home')}}</span></a></li>
                <li class="{{areActiveRoute(['user.fields.index','search.fields'])}}"><a href="{{ route('user.fields.index') }}">{{ __('Science Topics') }}</a></li>
                <li class="{{isActiveRoute('about.us')}}"><a href="{{ route('about.us') }}">{{ __('About Us') }}</a></li>
                @if (Auth::check())
                  <li>
                    @php($messages = App\Message::getMessages(Auth::user()->id))
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="{{ Auth::user()->path == null ? asset('img/default1.jpg') : asset(Auth::user()->path) }}" class="img-circle user-image" alt="User Image">
                      <span class="hidden-xs">{{ Auth::user()->full_name }}<sup class="badge" style="background-color: red;margin-left: 1px">{{ $messages->count()> 0 ? ' '.$messages->count() : '' }}</sup></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- Menu Footer-->
                      <div>
                        <a href="{{ route('profile.show', Auth::user()->id) }}" class="btn btn-xs pull-left user-dropdown">{{ __('Your Profile') }}</a>
                        @if(Auth::user()->is_admin == App\User::ROLE_ADMIN)
                          <a href="{{ route('admin.index')}}" class="btn btn-xs pull-left user-dropdown">{{ __('Admin Management') }}</a>
                        @endif
                        <a class="btn btn-xs pull-left user-dropdown" href="{{ route('messages.show', Auth::user()->id) }}">{{ __('You have :message message', ['message' => $messages->count()]  ) }}</a>
                        <a class="btn btn-xs pull-left user-dropdown" href="{{ route('usertopics.create') }}">{{ __('Create a new Topic') }}</a>

                        <a href="{{ route('logout') }}" id="logout" class="btn btn-xs pull-left user-dropdown">{{__('Log out')}}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden="">
                          {{ csrf_field() }}
                        </form>
                      </div>
                    </ul>
                  </li>
                @else
                  <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @endif
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <button id="js-btn-search-show" class="cls-button-show-search btn btn-primary form-control cls-height-44px "><i class="glyphicon glyphicon-search"></i></button>
    @include('frontend.layouts.partials.search')
    </div>
    <!-- END: header -->