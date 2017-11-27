@extends('frontend.layouts.main')

@section('title', __('User Academics Rank'))

@section('content')
  <div class=" container content-wrapper">
    <!-- Main content -->
    <div class="col-md-12">
      <div class="alert cls-alert-info">
      <p><strong>{{ __('Hi')}} {{Auth::user()->full_name }}</strong></p>
    </div>
    </div>
    <section class="content col-md-6">
      @include('flash::message')
      @include('backend.layouts.partials.modal')
      <div class="row">
        <div class="clr-ml-15per clr-width-70per">
          <div>
            <div class="user-head text-center">
              <h1>{{__('Your academic rank information')}}</h1>
            </div>
              <table class="table cls-rank-style">
                <thead>
                  <th class="col-md-3">{{ __('Academic Rank')}}</th>
                  <th class="col-md-3">{{ __('Graduation Date')}}</th>
                  <th class="col-md-2">{{ __('Action')}}</th>
                </thead>
                <tbody>
                  @foreach($AcademicsrankUser as $userDegree)
                  {{-- {{dd($userDegree)}} --}}
                  @if ($userDegree->academic_rank_id > 3)
                    <tr>
                      <td><a class="btn btn-primary">{{ __($userDegree->academicsrank->name) }}</a></td>
                      <td class="cls-td"><label>{{$userDegree->graduate}}</label></td>
                      <td align="center">
                        <div class="btn-option text-center">
                          <form method="POST" action="{{ route('academicsrank.delete', $userDegree->id) }}" class="inline">
                            {!! csrf_field() !!}
                            {{ method_field('DELETE') }}
                            <button type="submit"
                              class="btn btn-default fa fa-trash-o btn-delete-item"
                              data-title="{{ __('Confirm deletion!') }}"
                              data-confirm="{{ __('Are you sure you want to delete?') }}">{{__('Delete')}}
                            </button>
                          </form> 
                        </div>
                      </td>
                    </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
              <div></div>
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
                    <label for="expense">{{ __('Academics Rank') }}</label>
                    <select class="form-control" name="academic_rank_id">
                      <option></option>
                      @foreach($academicsrank as $academicrank)
                      @if ($academicrank->id > 3)
                          <option value="{{$academicrank->id}}">{{__($academicrank->name)}}</option>
                      @endif
                      @endforeach
                    </select>
                    <small class="text-danger">{{ $errors->first('academic_rank_id') }}</small>
                  </div>
                  <div class="col-md-6 nopadding-r form-group">
                    <label for="expense">{{ __('Graduation Date') }}</label>
                    <select name="graduate" id="graduate" class="form-control">
                      @for ($i = 2000; $i <= 2017; $i++)  
                        <option value="{{ $i }}">{{ $i }}</option>
                      @endfor
                    </select>
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
         {{ __("Some acronyms in Vietnamese from English. Master's degrees are often abbreviated as M.Sc or M.S. from the word Master of Science. Ph.D. degrees are often abbreviated as Ph.D; PhD; D.Phil or Dr.Phil from the word Doctor of Philosophy. Ph.D. degrees are often abbreviated as Sc.D; D.Sc; S.D. or Dr.Sc from Doctor of Science. The title of medical doctor is often abbreviated M.D. from the word Doctor of Medicine; Medical Doctor or Medicinae Doctor. Associate professors are often abbreviated as Assoc. Prof. from Asscociate Professor; not written as A. Prof. This can be confused with the assistant professor or assistant professor from the Assistant Professor. Assistant professor or assistant professor should be Assist. Prof. Professors are often referred to as prof. from the word Professor.") }}
      </div>
    </section>
  </div>

@endsection
