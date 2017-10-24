@extends('frontend.layouts.main')

@section('title', __('User Academics Rank'))

@section('content')
  <div class=" container content-wrapper">
    <!-- Main content -->
    <div class="alert cls-alert-info">

      </div>
    <section class="content col-md-6">
      @include('flash::message')
      <div class="row">
        <div class="clr-ml-15per clr-width-70per">
          <div>
            <div class="user-head text-center">
              <h1>{{__('Your Academic Rank')}}</h1>
            </div>
              <table class="table cls-rank-style">
                <thead>
                  <th>{{ __('Academic Rank Name')}}</th>
                  <th>{{ __('Date Creation')}}</th>
                </thead>
                <tbody>
                  @foreach($AcademicsrankUser as $value)
                  <tr>
                    <td>{{$value->academicsrank->name}}</td>
                    <td>{{$value->academicsrank->created_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>              
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title lead">{{ __('Enter information') }}</h3>
            </div>
            <form role="form" method="POST" action="{{ route('profile.academicsrank.store', Auth::user()->id) }}">
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <div class="col-md-6 nopadding">
                    <label for="expense">{{ __('Academic Rank') }}</label>
                    <select class="form-control" name="academic_rank_id">
                      <option></option>
                      @foreach($academicsrank as  $academicrank)
                        <option value="{{$academicrank->id}}">{{$academicrank->name}}</option> 
                      @endforeach
                    </select>
                    <small class="text-danger">{{ $errors->first('academic_rank_id') }}</small>
                  </div>
                  <div class="col-md-6 nopadding-r">
                    <label for="expense">{{ __('Date Gradution') }}</label>
                    <input type="date" class="form-control" name="graduate" id="graduate">
                    <small class="text-danger">{{ $errors->first('graduate') }}</small>
                  </div>
                </div>
              </div>
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
