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
                                                    {{ __('Last change') }}
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
                                                <a href="{{ route('user.edit', $user->id) }}"><span
                                                            class="btn btn-sm btn-primary">{{ __('Edit') }}</span></a>
                                                <a href="{{ route('user.index') }}"><span
                                                            class="btn btn-sm btn-danger">{{ __('Go to List') }}</span></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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