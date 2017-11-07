@extends('frontend.layouts.main')

@section('title', __('404 - Page not found'))

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header text-center">
      <div class="content-error-page-admin">
        <h1 class="title-error">{{__('404 - Page Not found')}}</h1>
        <div class="content-error">{{__('Sorry...You requested the page that is no longer there')}}</div>
      </div>
    </section>
  </div>
@endsection
