@extends('backend.layouts.main')

@section('title', __('Topics | List Topics'))

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
                <h3 class="box-title title-header">{{ __('List Topics') }}</h3>
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
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Own User') }}</th>
                    <th>{{ __('Max member')}}</th>
                    <th>{{ __('Member')}}</th>
                    <th>{{ __('Status') }}</th>
                    <th class="">{{ __('Begin') }}</th>
                    <th class="">{{ __('End') }}</th>
                    <th class="">{{ __('Options') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($topics as $topic)
                    <tr>
                      <td>{{ $topic->id }}</td>
                      <td>
                        <a href="{{ route('topics.edit', $topic->id) }}">
                          {{ $topic->name }}
                        </a>
                      </td>
                      <td>{{ $topic->user->username }}</td>
                      <td>{{ $topic->max_member }}</td>
                      <td>{{ $topic->join_member }}</td>
                      @switch($topic->status)
                      @case(App\Topic::STATUS_FINISH)
                          @php($status = 'Finish')
                          @break
                      @case(App\Topic::STATUS_IN_PROGRESS)
                          @php($status = 'In Progress')
                          @break
                      @case(App\Topic::STATUS_PENDING_USER)
                          @php($status = 'Pending User')
                          @break
                      @default()
                          @php($status = 'Pending Admin')
                          @break
                      @endswitch
                      <td>{{ $status }}</td>
                      <td>{{ $topic->date_begin }}</td>
                      <td>{{ $topic->date_end }}</td>
                      <td align="center">
                        <div class="btn-option text-center">
                          <a href="{{ route('topics.edit', $topic->id) }}"  class="btn btn-default fa fa-pencil-square-o pull-left" >
                          </a>
                          <form method="POST" action="{{ route('topics.destroy', $topic->id) }}" class="inline">
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
                {!! $topics->render() !!}
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
