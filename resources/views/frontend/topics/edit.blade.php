@extends('frontend.layouts.main')

@section('title', __('Edit topic by '. Auth::user()->full_name))

@section('content')
  <div class=" container content-wrapper">
    @if (session('msg'))
      <div id="msg-booking" hidden="">{{ session('msg') }}</div>
      @include('frontend.topics.modal')
    @endif
    <!-- Main content -->
    <div class="alert cls-alert-info">
        <p class="text-primary">{{ __('Hello ') }} <strong>{{ Auth::user()->full_name }}</strong> {{ __('to create a scientific subject you need to fill out the information below fully and accurately.') }}</p>
      </div>
    <section class="content col-md-6">
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
            <form role="form" method="POST" action="{{ route('usertopics.update', $topic->id) }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
              {{ method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">{{ __('Title') }}</label>
                  <input type="text" class="form-control" name= "name" placeholder="{{ __('Enter title') }}" value="{{ $topic->name }}">
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
               {{-- expend --}}
               <div class="form-group">
                <div class="col-md-6 nopadding">
                  <label for="expense">{{ __('Expense (VND)') }}</label>
                  <input type="text" class="form-control" name="expense" id="expense" placeholder="{{ __('Ex: 10 000 000') }}" value="{{ $topic->expense }}">
                  <small class="text-danger">{{ $errors->first('expense') }}</small>
                </div>
                
              </div>
              <div class="form-group">
                  <label class="mt-20" for="over_view">{{ __('Over view') }} <small> (please describe the overview)</small></label>
                  <textarea type="text" class="form-control" name="over_view" placeholder="{{ __('Input overview here') }}">{{ $topic->over_view }}</textarea>
                  <small class="text-danger">{{ $errors->first('over_view') }}</small>
              </div>

              

              <div class="form-group">
                  <div class="col-md-4 nopadding">
                      <label class="" for="urgency">{{ __('Urgency') }} <small></small></label>
                    <select class="form-control" name="urgency" id="">
                      <option value="">{{ __('Please choose urgency') }}</option>
                        <option value="Very Low">{{ __('Very Low') }}</option>
                        <option value="Low">{{ __('Low') }}</option>
                        <option value="Normal">{{ __('Normal') }}</option>
                        <option value="High">{{ __('High') }}</option>
                        <option value="Very High">{{ __('Very High') }}</option>
                    </select>
                    <small class="text-danger">{{ $errors->first('urgency') }}</small>
                  </div>
                  <div class="col-md-4">
                    <label class="" for="date_begin">{{ __('Begin') }} <small></small></label>
                  <input type="date" class="form-control" name="date_begin" value="{{ old('date_begin') }}">
                  <small class="text-danger">{{ $errors->first('date_begin') }}</small>
                  </div>

                  <div class="col-md-4 nopadding">
                    <label class="" for="date_end">{{ __('End') }} <small></small></label>
                  <input type="date" class="form-control" name="date_end" value="{{ old('date_end') }}">
                  <small class="text-danger">{{ $errors->first('date_end') }}</small>
                  </div>
              </div>
               <div class="form-group">
                  <label class="mt-20" for="method">{{ __('Implement method') }} <small></small></label>
                  <textarea type="text" class="form-control" name="method" placeholder="{{ __('Input method here') }}">{{ $topic->method }}</textarea>
                  <small class="text-danger">{{ $errors->first('method') }}</small>
              </div>

               
              <input type="text" name="own_user_id" value="{{ Auth::user()->id }}" hidden>
              <input type="text" name="status" value="{{ App\Topic::STATUS_PENDING_ADMIN }}" hidden>

                
              <!-- /.box-body c-->

              <div class="box-footer">
                <a href="{{ route('user.index') }}">
                  <button type="button" class="btn btn-default mr-10">{{ __('Back') }}</button>
                </a>
                <button type="reset" class="btn btn-warning mr-10">{{ __('Reset') }}</button>
                <button type="submit" class="btn btn-primary mr-10 pull-right">{{ __('Submit') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="col-md-1">
    </section><section class="col-md-5">
      <div class="alert cls-alert-info">
        <div class="text-primary">
          The posible visualizar una hoja de ruta de la siguiente manera:
          <ul>
            <li>
              1. Seleccione el tema
            </li>
            <li>
              2. Haz un plan de implementación
            </li>
            <li>
              4. Recopilación de datos, información de procesamiento
            </li>
            <li>
              5. Escribe el informe de investigación
            </li>
          </ul>
      Estimator el problema, construya la hypotesis
      Esta secuencia también es relativa. Puede haber temas que provienen de nuevas ideas, luego nuevos materiales, implementados. You can find out more details, please contact us for more details, please contact us for more details on related matters.
        </div>
      </div>
    </section>
  </div>

@endsection
