@extends('backend.layouts.main')

@section('title', __('Users | List users'))

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('Users Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> {{ __('Home Page') }}</a></li>
        <li class="active">{{ __('Users') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="title-user mb-10">
                <h3 class="box-title title-header">{{ __('List Users') }}</h3>
              </div>  
              <div class="row">
                <div class="contain-btn">
                  <a class="btn btn-primary  pull-right clr-mr-13" href="{{ route('user.create')}}" id="btn-add-user">
                  <span class="fa fa-plus-circle"></span>
                  {{ __('Add user') }}
                  </a>
                </div>
              </div>
            </div>
             <!-- /.box-header -->
            <div class="box-body">
              @include('flash::message')
              @include('backend.layouts.partials.modal')
              <table id="table-contain" class="table table-bordered table-responsive table-striped">
                <thead>
                  <tr align="center">
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Username') }}</th>
                    <th>{{ __('Full Name') }}</th>
                    <th>{{ __('Email')}}</th>
                    <th>{{ __('Phone') }}</th>
                    <th class="">{{ __('Role') }}</th>
                    <th class="text-center">{{ __('Option') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>
                        <a href="{{ route('user.show', $user->id) }}">
                          {{ $user->username }}
                        </a>
                      </td>
                      <td>{{ $user->full_name }}
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}
                      <td class="text-center">
                        <form method="POST" action="
                          {{ route('user.updateRole', $user->id) }}">
                          {!! csrf_field() !!}
                          {{ method_field('PUT') }}
                          @if ($user->is_admin == App\User::ROLE_ADMIN)
                            <button type="submit" class="btn btn-primary cls-buton" {{ Auth::user()->id == $user->id ? 'disabled' : '' }}>{{ __('Admin') }}</button>
                          @else
                            <button type="submit" class="btn btn-default cls-buton"> {{ __('User') }} </button>
                          @endif
                        </form>
                      </td>
                      <td align="center">
                        <div class="btn-option text-center">
                          <a href="{{ route('user.edit', $user->id) }}"  class="btn btn-default fa fa-pencil-square-o pull-left" >
                          </a>
                          <form method="POST" action="{{ route('user.destroy', $user->id) }}" class="inline">
                            {!! csrf_field() !!}
                            {{ method_field('DELETE') }}
                            <button type="submit" 
                              class="btn btn-default btn-delete-item fa fa-trash-o"
                              data-title="{{ __('Confirm deletion!') }}"
                              data-confirm="{{ __('Are you sure you want to delete?') }}">
                            </button>
                          </form> 
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="cls-search-not-found text-center" hidden="">
                {{__('Data Not Found')}}
              </div>
              <div class="pull-right cls-mr-13">
                {!! $users->render() !!}
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
