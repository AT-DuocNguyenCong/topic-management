@extends('backend.layouts.main')

@section('title', __('User | ' . $user->full_name))

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    @if(isset($user))
      <div class="panel-body inf-content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">{{ __('User Information') }}</h3>
                @if ($user->birthday == null | $user->hometown == null | $user->place_of_birth == null | $user->major == null | $user->position == null | $user->company == null)
                <div class="alert custom-alert-danger">
                  <p>{{ __('Alert: This account information is not complete, please update')}}</p>
                </div>
                @else
                  <div class="alert cls-alert-info">
                  <p>{{ __('Alert: This account is full information')}}</p>
                </div>
                @endif
              </div>
              <div class="box-body">
                @include('flash::message')
                <div class="col-md-4 text-center">
                  <img alt="" title="" class="avt-main img-thumbnail isTooltip img-w-h"
                    src="{{ $user->path == null ? asset('img/default1.jpg') : asset($user->path) }}"
                    data-original-title="Usuario">
                </div>
                <div class="col-md-8">
                  <div class="table-responsive">
                    <table class="table table-condensed table-responsive table-user-information has-description">
                      <tbody>
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
                            <span class="glyphicon glyphicon-user  text-primary"></span>
                            {{ __('Full Name') }}
                          </strong>
                        </td>
                        <td class="text-primary">
                          {{ $user->full_name }}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-eye-open text-primary"></span>
                            {{ __('User Type') }}
                          </strong>
                        </td>
                        <td class="text-primary">
                          {{ $user->is_admin == App\User::ROLE_ADMIN ? __('Admin') : __('Normal User') }}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-envelope text-primary"></span>
                            {{ __('Email') }}
                          </strong>
                        </td>
                        <td class="text-primary">
                          {{ $user->email }}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-calendar text-primary"></span>
                            {{ __('Birthday') }}
                          </strong>
                        </td>
                        <td class="{{$user->birthday == null ? 'text-danger' : 'text-primary'}}">
                          {{$user->birthday == null ? '**Please update your birthday' : $user->birthday}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class=" glyphicon glyphicon-tree-deciduous text-primary"></span>
                            {{ __('Place of birth') }}
                          </strong>
                        </td>
                        <td class="{{ $user->place_of_birth == null ? 'text-danger' : 'text-primary'}}">
                          {{ $user->place_of_birth == null ? '**Please update your place of birth' : $user->place_of_birth}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-globe text-primary"></span>
                            {{ __('Hometown') }}
                          </strong>
                        </td>
                        <td class="{{ $user->hometown == null ? 'text-danger' : 'text-primary' }}">
                          {{$user->hometown == null ? '**Please update your hometown' : $user->hometown}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-calendar text-primary"></span>
                            {{ __('Faculty') }}
                          </strong>
                        </td>
                        <td class="{{ $user->faculty == null ? 'text-danger' : 'text-primary'}}">
                          {{$user->faculty == null ? '**Please update your faculty' : $user->faculty}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-calendar text-primary"></span>
                            {{ __('Major') }}
                          </strong>
                        </td>
                        <td class="{{ $user->major == null ? 'text-danger' : 'text-primary'}}">
                          {{$user->major == null ? '**Please update your major' : $user->major}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-calendar text-primary"></span>
                            {{ __('Faculty') }}
                          </strong>
                        </td>
                        <td class="{{ $user->faculty == null ? 'text-danger' : 'text-primary'}}">
                          {{$user->faculty == null ? '**Please update your faculty' : $user->faculty}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-calendar text-primary"></span>
                            {{ __('Company') }}
                          </strong>
                        </td>
                        <td class="{{ $user->company == null ? 'text-danger' : 'text-primary'}}">
                          {{$user->company == null ? '**Please update your company' : $user->company}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-calendar text-primary"></span>
                            {{ __('Position') }}
                          </strong>
                        </td>
                        <td class="{{ $user->position == null ? 'text-danger' : 'text-primary'}}">
                          {{$user->position == null ? '**Please update your position' : $user->position}}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-phone text-primary"></span>
                            {{ __('Phone Number') }}
                          </strong>
                        </td>
                        <td class="text-primary">
                          {{ $user->phone }}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-calendar text-primary"></span>
                            {{__('Date Creation')}}
                          </strong>
                        </td>
                        <td class="text-primary">
                          {{ $user->created_at }}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>
                            <span class="glyphicon glyphicon-calendar text-primary"></span>
                            {{ __('Last Change') }}
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
                            <a href="{{ route('user.edit', $user->id) }}">
                              <span class="btn btn-sm btn-primary">
                                {{ __('Edit') }}
                              </span>
                            </a>
                            <a href="{{ route('user.index') }}">
                              <span class="btn btn-sm btn-danger">
                                {{ __('Go to List') }}
                              </span>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div style="margin-bottom: 5px; margin-top: 5px"></div>
                <h4 class="text-center">{{__('Topics Involved')}}</h4>
                <table class="table table-bordered table-responsive table-striped">
                  <thead>
                    <tr align="center">
                      <th class="col-md-0">{{ __('ID') }}</th>
                      <th class="col-md-4">{{ __('Topic Name') }}</th>
                      <th class="col-md-4">{{ __('Field') }}</th>
                      <th class="col-md-2">{{ __('Status') }}</th> 
                      <th class="col-md-3">{{ __('Date Joined') }}</th> 
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($user->usertopics as $usertopic)
                      <tr>
                        <td>{{$usertopic->id}}</td>
                        <td><a href="{{route('topics.edit', $usertopic->id)}}">{{$usertopic->topic->name}}</a></td>
                        <td>{{$usertopic->topic->field->name}}</td>
                        @switch($usertopic->status)
                          @case(App\Topic::STATUS_FINISH)
                              @php($usertopic->status = 'Finish')
                              @break
                          @case(App\Topic::STATUS_IN_PROGRESS)
                              @php($usertopic->status = 'In Progress')
                              @break
                          @case(App\Topic::STATUS_PENDING_USER)
                              @php($usertopic->status = 'Pending User')
                              @break
                          @default()
                              @php($usertopic->status = 'Pending Admin')
                              @break
                          @endswitch
                        <td>{{$usertopic->status}}</td>
                        <td>{{$usertopic->updated_at}}</td>
                      </tr> 
                    @endforeach
                  </tbody>
                </table>
                <div style="margin-bottom: 5px; margin-top: 5px"></div>
                <h4 class="text-center">{{__('My Topics')}}</h4>
                <table class="table table-bordered table-responsive table-striped">
                  <thead>
                    <tr align="center">
                      <th class="col-md-0">{{ __('ID') }}</th>
                      <th class="col-md-4">{{ __('Topic Name') }}</th>
                      <th class="col-md-4">{{ __('Field') }}</th>
                      <th class="col-md-2">{{ __('Status') }}</th> 
                      <th class="col-md-3">{{ __('Date Creation') }}</th> 
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($user->topics as $topic)
                      <tr>
                        <td>{{$topic->id}}</td>
                        <td><a href="{{route('topics.edit', $topic->id)}}">{{$topic->name}}</a></td>
                        <td>{{$topic->field->name}}</td>
                        @switch($topic->status)
                          @case(App\Topic::STATUS_FINISH)
                              @php($topic->status = 'Finish')
                              @break
                          @case(App\Topic::STATUS_IN_PROGRESS)
                              @php($topic->status = 'In Progress')
                              @break
                          @case(App\Topic::STATUS_PENDING_USER)
                              @php($topic->status = 'Pending User')
                              @break
                          @default()
                              @php($topic->status = 'Pending Admin')
                              @break
                          @endswitch
                        <td>{{$topic->status}}</td>
                        <td>{{$topic->created_at}}</td>
                      </tr> 
                    @endforeach
                  </tbody>
                </table>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @else
      <h1>{{ __('Nothing to show!') }}</h1>
    @endif
  </div>    
@endsection