@extends('frontend.layouts.main')

@section('title', __('Profile | ' . $user->full_name))

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    @if(isset($user))
        <div class="container inf-content cls-font-20">
            @include('flash::message')
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                           
                        </div>
                        <form class="box-body" role="form" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            {{ method_field('PUT') }}
                            <input type="hidden" value="{{ $user->id }}" name="id">
                            <div class="col-md-4 text-center">
                                <img alt="" title="" class="avt-main img-circle isToolt  ip img-w-h"
                                     src="{{ $user->path == null ? asset('img/default1.jpg') : asset($user->path) }}"
                                     data-original-title="Usuario">
                                <input class="cls-ml-46 cls-mt-30 form-control cls-input-image" type="file" name="image">
                            </div>
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-responsive table-user-information has-description">
                                        <tbody>
                                        <tr>
                                          <td colspan="2">
                                            <div class="alert cls-alert-info">
                                              <strong>{{ __('Login information
') }}</strong>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    {{ __('Identification') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->id }}
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    {{ __('Username') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->username }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk  text-primary"></span>
                                                    {{ __('Password') }}
                                                </strong>
                                            </td>
                                            <td class="">
                                                <input class="form-control" type="password" name="password" value="" placeholder="********">
                                                <p class="text-danger"><small>{{ $errors->first('password') }}</small></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk  text-primary"></span>
                                                    {{ __('Password') }}
                                                </strong>
                                            </td>
                                            <td class="">
                                                <input class="form-control" type="password" name="password_confirmation" value="" placeholder="********" >
                                                <p class="text-danger"><small>{{ $errors->first('password_confirmation') }}</small></p>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td colspan="2">
                                            <div class="alert cls-alert-info">
                                              <strong>{{ __('User information
') }}</strong>
                                            </div>
                                          </td>
                                        </tr>
                                        {{-- full_name --}}
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-user  text-primary"></span>
                                                    {{ __('Full Name') }}
                                                </strong>
                                            </td>
                                            <td class="">
                                                <input class="form-control" type="text" name="full_name" value="{{ $user->full_name }}">
                                                <p class="text-danger"><small>{{ $errors->first('full_name') }}</small></p>
                                            </td>
                                        </tr>
                                    {{-- email --}}
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                                                    {{ __('Email') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                                                <p class="text-danger"><small>{{ $errors->first('email') }}</small></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-phone text-primary"></span>
                                                    {{ __('Phone Number') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="phone" value="{{ $user->phone }}">
                                                <p class="text-danger"><small>{{ $errors->first('phone') }}</small></p>
                                            </td>
                                        </tr>
                                        {{-- birthday --}}
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                    {{ __('Birthday') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <input class="form-control" class="cls-date-pick" type="date" name="birthday" value="{{ $user->birthday }}">
                                                <p class="text-danger"><small>{{ $errors->first('birthday') }}</small></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-globe text-primary"></span>
                                                    {{ __('Hometown') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="hometown" value="{{ $user->hometown }}">
                                                <p class="text-danger"><small>{{ $errors->first('hometown') }}</small></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class=" glyphicon glyphicon-tree-deciduous text-primary"></span>
                                                    {{ __('Place of birth') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="place_of_birth" value="{{ $user->place_of_birth }}">
                                                <p class="text-danger"><small>{{ $errors->first('place_of_birth') }}</small></p>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td colspan="2">
                                            <div class="alert cls-alert-info">
                                              <strong>{{ __('Education information') }}</strong>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    {{ __('Faculty') }}
                                                </strong>
                                            </td>
                                            <td>
                                            <select class="form-control" name="faculty">
                                              <option value="">{{__('Please choose')}}</option>
                                              <option value="Information Technology">{{__('Information Technology')}}</option>
                                              <option value="Electronics and Telecommunication">{{__('Electronics and Telecommunication')}}</option>
                                              <option value="Physics">{{__('Physics')}}</option>
                                              <option value="Chemistry">{{__('Chemistry')}}</option>
                                              <option value="Electronic">{{__('Electronic')}}</option>
                                              <option value="Mechanical">{{__('Mechanical')}}</option>
                                              <option value="Other">{{__('Other')}}</option>
                                            </select>
                                                <p class="text-danger"><small>{{ $errors->first('faculty') }}</small></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    {{ __('Major') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="major" value="{{ $user->major }}">
                                                <p class="text-danger"><small>{{ $errors->first('major') }}</small></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    {{ __('Company') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="company" value="{{ $user->company }}">
                                                <p class="text-danger"><small>{{ $errors->first('company') }}</small></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    {{ __('Position') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="position" value="{{ $user->position }}">
                                                <p class="text-danger"><small>{{ $errors->first('position') }}</small></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    {{ __('Academics Rank') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach($user->userAcademicsrank as $value)
                                                        <li>{{$value->academicsrank->name}}</li>
                                                    @endforeach
                                                    <li><a class="btn btn-primary" href="{{ route('profile.academicsrank.create', $user->id)}}">{{ __('Update Academic Rank') }}</a></li>   
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td colspan="2">
                                            <div class="alert cls-alert-info">
                                              <strong>{{ __('Orther information') }}</strong>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    created
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->created_at }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                    {{ __('Updated At') }}
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{ $user->updated_at }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="text-primary"></span>
                                                    {{ __('Action') }}
                                                </strong>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </section>
    </div>
    @else
        <h1>{{ __('Nothing to show!') }}</h1>
    @endif
@endsection