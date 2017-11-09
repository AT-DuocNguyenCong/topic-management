@extends('backend.layouts.main')

@section('title', __('Request to join | List request'))

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('Topics Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> {{ __('Home Page') }}</a></li>
        <li class="active">{{ __('Topics') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="title-user mb-10">
                <h3 class="box-title title-header">{{ __('List request') }}</h3>
              </div>  
              <div class="row">
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
                    <th>{{ __('User') }}</th>
                    <th>{{ __('Topic') }}</th>
                    <th>{{ __('Max member')}}</th>
                    <th>{{ __('Current Member')}}</th>
                    <th>{{ __('Status') }}</th>
                    <th class="">{{ __('Options') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($userTopics as $userTopic)
                    <tr>
                      <td>{{ $userTopic->id }}</td>
                      <td>
                        <a href="{{ route('user.show', $userTopic->user->id) }}">
                          {{ $userTopic->user->full_name }}
                        </a>
                      </td>
                      <td><a href="{{ route('topics.edit', $userTopic->topic->id) }}">{{ $userTopic->topic->name }}</a></td>
                      <td>{{ $userTopic->topic->max_member }}</td>
                      <td><strong>{{ __(':member member', ['member' => $userTopic->topic->usertopicsProgress->count()]) }}</strong>
                        <ol>
                          @foreach($userTopic->topic->usertopicsProgress as $key)
                            <li><a href="{{ route('user.show', $key->user->id) }}">{{ $key->user->full_name }}</a></li>
                          @endforeach
                        </ol>
                      </td>
                      @switch($userTopic->status)
                      @case(App\UserTopic::STATUS_PROGRESS)
                          @php($status = 'PROGRESS')
                          @break
                      @default()
                          @php($status = 'Pending')
                          @break
                      @endswitch
                      <td>{{ $status }}</td>
                      <td>
                        <ul style="list-style-type: none;">
                          <li>
                            <a href="{{ route('request.approve', $userTopic->id) }}"  class="btn btn-success cls-btn" >{{ 'Approve' }}</a>
                          </li>
                          <li>
                            <a href="{{ route('request.unapprove', $userTopic->id) }}"  class="btn btn-danger cls-btn" >{{ 'Unapprove' }}</a>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="cls-search-not-found text-center" hidden="">
                {{__('Data Not Found')}}
              </div>
              <div class="pull-right cls-mr-13">
                {!! $userTopics->render() !!}
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
