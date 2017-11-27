@extends('frontend.layouts.main')

@section('title', __('Profile | :name',['name'=>$user->full_name]))

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
              <form class="box-body" role="form" method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PUT') }}
                <input type="hidden" value="{{ $user->id }}" name="id">
                <div class="col-md-4 text-center">
                  <img alt="" title="" class="avt-main img-circle isToolt  ip img-w-h"
                  src="{{ $user->path == null ? asset('img/default1.jpg') : asset($user->path) }}"
                  data-original-title="Usuario">
                  @if ($user->id == Auth::user()->id)
                    <input class="cls-ml-46 cls-mt-30 form-control cls-input-image" type="file" name="image">
                  @endif
                </div>
                <div class="col-md-8">
                  <div class="table-responsive">
                    <table class="table table-condensed table-responsive table-user-information has-description">
                      <tbody>
                        @if ($user->id == Auth::user()->id)
                          <tr>
                          <td colspan="2">
                            <div class="alert cls-alert-info">
                            <strong>{{ __('Login information') }}
                            </strong>
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
                        @endif
                        <tr>
                          <td colspan="2">
                            <div class="alert cls-alert-info">
                              <strong>{{ __('User information') }}</strong>
                            </div>
                          </td>
                        </tr>
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
                          <p>{{$user->hometown}}</p>
                          <select name='tinhthanh' id="tinhthanh" class="form-control">
                            <option value="">{{ __('Choose city')}}</option>
                            @foreach($cities as $city)
                            <option value="{{$city->matp}}">{{$city->name}}</option>
                            @endforeach
                          </select>
                          <p class="text-danger"><small>{{ $errors->first('tinhthanh') }}</small></p>
                          <select name='quanhuyen' id="quanhuyen"" class="form-control">
                            <option value="" {}>{{__('Choose district')}}</option>
                          </select>
                          <p class="text-danger"><small>{{ $errors->first('quanhuyen') }}</small></p>
                          <select name='xaphuong' id="xaphuong" class="form-control">
                            <option value="">{{__('Choose town')}}</option>
                          </select>
                          <p class="text-danger"><small>{{ $errors->first('xaphuong') }}</small></p>
          
                          {{-- <input class="form-control" type="text" name="hometown" value="{{ $user->hometown }}">
                          <p class="text-danger"><small>{{ $errors->first('hometown') }}</small></p> --}}
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
                            @php
                              $facultyName = [
                                "Information Technology" => __("Information Technology"),
                                "Electronics and Telecommunication" => __("Electronics and Telecommunication"),
                                "Physics" => __("Physics"),
                                "Chemistry" => __("Chemistry"),
                                "Electronic" => __("Electronic"),
                                "Mechanical" => __("Mechanical"),
                                "Other" => __("Other")
                              ];
                            @endphp
                            <select class="form-control" name="faculty">
                                <option value="">{{__('Choose your faculty')}}</option>
                                @foreach($facultyName as $key => $value)
                                  <option value="{{$key}}" {{$user->faculty == $key ? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
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
                            {{ __('Degree') }}
                            </strong>
                          </td>
                          <td>
                            <ul>
                              @foreach($user->userAcademicsrank as $userDegree)
                                @if($userDegree->academicsrank->id <= 3)
                                  <li style="margin-left: -9%;">{{ '- ' }} {{ __($userDegree->academicsrank->name) }}</li>
                                @endif
                              @endforeach
                            @if ($user->id == Auth::user()->id)
                              <li><a style="margin-top: 10px" class="btn btn-primary btn-xs" href="{{ route('profile.academicsrank.create', $user->id)}}">{{ __('Update Degree') }}</a></li>
                            @endif 
                            </ul>
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
                                @if($value->academicsrank->id > 3)
                                  <li style="margin-left: -9%;">{{ '- ' }} {{ __($value->academicsrank->name) }}</li>
                                @endif
                              @endforeach
                              @if ($user->id == Auth::user()->id)
                                <li><a style="margin-top: 10px" class="btn btn-primary btn-xs" href="{{ route('hv.create', $user->id)}}">{{ __('Update Academic Rank') }}</a></li>
                              @endif  
                            </ul>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <div class="alert cls-alert-info">
                            <strong>{{ __('My Topic') }}</strong>
                            </div>
                          </td>
                        </tr>
                      <tr>
                        <table class="table table-responsive">
                          <thead>
                            <th class="col-md-1">{{__('Id')}}</th>
                            <th class="col-md-3">{{__('Topic Name')}}</th>
                            <th class="col-md-3">{{__("Own")}}</th>
                            <th class="col-md-3">{{__("Member")}}</th>
                            <th class="col-md-3">{{__("Status")}}</th>
                            <th></th>
                          </thead>
                          <tbody>
                            @php($index = 1)
                            @foreach($user->topics as $topic)
                            <tr>
                              <td>{{ $index }}</td>
                              @php($index++)
                              <td>
                                <a href="{{route('user.topics.show', $topic)}}">{{ $topic->name }}</a>
                              </td>
                              <td>{{$user->full_name}}</td>
                              <td><strong>{{ __(':member member', ['member' => $topic->usertopicsProgress->count()]) }}</strong>
                                <ol>
                                  @foreach($topic->usertopicsProgress as $key)
                                    <li><a href="{{ route('user.show', $key->user->id) }}">{{ $key->user->full_name }}</a></li>
                                  @endforeach
                                </ol>
                              </td>
                              <td>{{$topic->status_label}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <div class="alert cls-alert-info">
                          <strong>{{ __('Involved') }}</strong>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <table class="table table-responsive">
                          <thead>
                          <th class="col-md-1">{{__('Id')}}</th>
                          <th class="col-md-3">{{__('Topic Name')}}</th>
                          <th class="col-md-3">{{__("Own")}}</th>
                          <th class="col-md-3">{{__("Member")}}</th>
                          <th class="col-md-3">{{__("Status")}}</th>
                          <th></th>
                          </thead>
                          <tbody>
                            @php($index = 1)
                          @foreach($user->usertopics as $value)
                            <tr>
                              <td>{{ $index }}</td>
                              @php($index++)
                              <td>
                              <a href="{{route('user.topics.show', $value)}}">{{ $value->topic->name }}</a>
                              </td>
                              <td>{{$user->full_name}}</td>
                              <td><strong>{{ __(':member member', ['member' => $value->topic->usertopicsProgress->count()]) }}</strong>
                                <ol>
                                  @foreach($value->topic->usertopicsProgress as $key)
                                    <li>{{ $value->user->full_name }}</li>
                                  @endforeach
                                </ol>
                              </td>
                              <td>{{$value->topic->status_label}}</td>
                            </tr>
                          @endforeach
                          </tbody>
                        </table>
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
                            {{ __('Date Creation')}}
                          </strong>
                        </td>
                        <td class="text-primary">
                          {{ $user->created_at }}
                        </td>
                      </tr>
                      <br>
                      <tr>
                        <td>
                          <strong>
                          <span class="glyphicon glyphicon-asterisk text-primary"></span>
                          {{ __('Last Change') }}
                          </strong>
                        </td>
                        <td class="text-primary">
                          {{ $user->updated_at }}
                        </td>
                      </tr>
                      <br>
                      @if ($user->id == Auth::user()->id)
                      <tr>
                        <td>
                          <button type="submit" class="btn btn-primary pull-right">{{ __('Submit') }}</button>
                        </td>
                      </tr>
                      @endif
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
    @else
    <h1>{{ __('Nothing to show!') }}</h1>
    @endif
@endsection