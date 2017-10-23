@extends('backend.layouts.main')

@section('title', __('Levels | Edit levels'))

@section('content')
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <h1 class="title-page text-info text-center">
        {{ __('Edit Level') }}
      </h1>
      @include('flash::message')
      <div class="row">
        <div class="clr-ml-15per clr-width-70per">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title lead">{{ __('Enter information') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('levels.update', $level->id) }}" method="POST">
              {!! csrf_field() !!}
              {{ method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">{{ __('Level name') }}</label>
                  <input type="text" class="form-control{{ $errors->has('name') ? ' has-error' : '' }}" name= "name" id="name" value="{{ $level->name }}">
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
              <div class="box-footer">
                <a href="{{ route('levels.index') }}">
                  <button type="button" class="btn btn-default">{{ __('Back') }}</button>
                </a>
                <button type="reset" class="btn btn-warning">{{ __('Reset') }}</button>
                <button type="submit" class="btn btn-primary mr-10 pull-right">{{ __('Submit') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
