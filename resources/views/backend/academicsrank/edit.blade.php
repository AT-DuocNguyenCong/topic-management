@extends('backend.layouts.main')

@section('title', __('Academics Rank | Update Academics Rank'))

@section('content')
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <h1 class="title-page text-info text-center">
        {{ __('Update Academic Rank') }}
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
            <form role="form" method="POST" action="{{ route('academicsrank.update', $academicrank->id) }}">
              {!! csrf_field() !!}
              {{ method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">{{ __('Academic Rank name') }}</label>
                  <input type="text" class="form-control{{ $errors->has('name') ? ' has-error' : '' }}" name= "name" id="name"  value="{{ $academicrank->name }}">
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                  <label for="name">{{ __('Description') }}</label>
                  <textarea class="form-control {{ $errors->has('description') ? ' has-error' : '' }}" name= "description" id="description">{{ $academicrank->description }}</textarea>
                  <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
              <div class="box-footer">
                <a href="{{ route('academicsrank.index') }}">
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
