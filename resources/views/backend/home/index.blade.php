@extends('backend.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{ __('Home Page') }}
          </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>{{ $fields }}</h3>

                      <p>{{ __('Fields') }}</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-email-unread"></i>
                    </div>
                    <a href="{{ route('fields.index') }}" class="small-box-footer">{{ __('More info') }} <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>{{ $levels }}</sup></h3>
                      <p>{{ __('Levels') }}</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-android-map"></i>
                    </div>
                    <a href="{{ route('levels.index') }}" class="small-box-footer">{{ __('More info') }} <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>{{ $topics }}</h3>

                      <p>{{ __('Topics') }}</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('topics.index') }}" class="small-box-footer">{{ __('More info') }} <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3>{{ $users }}</h3>
                      <p>{{ __('Users') }}</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('user.index') }}" class="small-box-footer">{{ __('More info') }} <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
            </div>
        </section>
    </div>
@endsection
