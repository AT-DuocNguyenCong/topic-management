<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ Auth::user()->path == null ? asset('img/default1.jpg') : asset(Auth::user()->path) }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->full_name }}</p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"> {{ __('Management tools') }} </li>
      <li class="treeview {{ areActiveRoute(['user.edit', 'user.show']) }}">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>{{__('My profile')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ isActiveRoute('user.edit')}} "><a href="{{ route('user.edit', Auth::user()->id ) }}"><i class="fa fa-circle-o"></i> {{ __('Update profile') }} </a></li>
          <li class="{{ isActiveRoute('user.show')}} "><a href="{{ route('user.show', Auth::user()->id ) }}"><i class="fa fa-circle-o"></i> {{ __('Show profile') }} </a></li>
        </ul>
      </li>
      {{-- end my profile --}}
      {{-- user mn --}}
      <li class="{{isActiveRoute('user.index')}}">
        <a href="{{ route('user.index') }}">
          <i class="fa fa-male"></i> <span>{{__('Users Management')}}</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green"></small>
          </span>
        </a>
      </li>
      {{-- end user mn --}}
      <li class="treeview {{ areActiveRoute(['topics.index', 'topics.pending']) }}">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>{{__('Topics Management')}}</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">2</span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ isActiveRoute('topics.index') }}"><a href="{{ route('topics.index') }}"><i class="fa fa-circle-o"></i>{{ __('List topics') }}</a></li>
          <li class="{{ isActiveRoute('topics.pending') }}"><a href="{{ route('topics.pending') }}"><i class="fa fa-circle-o"></i>{{ __('Pending topics') }}</a></li>
        </ul>
      </li>

      <li class="treeview {{ areActiveRoute(['levels.index', 'fields.index', 'academicsrank.index']) }}">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>{{ __('Orther') }}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ isActiveRoute('levels.index') }}">
            <a href="{{ route('levels.index') }}"><i class="fa fa-circle-o"></i>{{__('Level')}}</a>
          </li>
          <li class="{{ isActiveRoute('fields.index') }}">
            <a href="{{ route('fields.index') }}"><i class="fa fa-circle-o"></i>{{__('Field')}}</a>
          </li>
          <li class="{{ isActiveRoute('academicsrank.index') }}">
            <a href="{{ route('academicsrank.index') }}"><i class="fa fa-circle-o"></i>{{__('Academic Rank')}}</a>
          </li>
        </ul>
      </li>
      
      <li class="header">{{ __('LABELS') }}</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>{{__('Languages')}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ isActiveRoute('language', ['lang' => 'en']) }}"><a href="{{ route('language', ['lang' => 'en']) }}"><i class="fa fa-circle-o text-red"></i>{{__('English')}}</a></li>
          <li class="{{ isActiveRoute('language', ['lang' => 'vi']) }}"><a href="{{ route('language', ['lang' => 'vi']) }}"><i class="fa fa-circle-o text-aqua"></i>{{__('VietNamese')}}</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>