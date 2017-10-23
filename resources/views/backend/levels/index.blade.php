@extends('backend.layouts.main')

@section('title', __('Levels | List levels'))

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('Levels Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> {{ __('Home Page') }}</a></li>
        <li class="active">{{ __('Levels') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="title-user mb-10">
                <h3 class="box-title title-header">{{ __('List Levels') }}</h3>
              </div>  
              <div class="row">
                <div class="contain-btn">
                  <a class="btn btn-primary  pull-right clr-mr-13" href="{{route('levels.create')}}">
                  <span class="fa fa-plus-circle"></span>
                  {{ __('Add level') }}
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
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Creation Date') }}</th>
                    <th>{{ __('Last Change') }}</th>
                    <th class="text-center">{{ __('Option') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($levels as $level)
                    <tr>
                      <td>{{ $level->id }}</td>
                      <td>{{ $level->name }}</td>
                      <td>{{ $level->created_at }}</td>
                      <td>{{ $level->updated_at }}</td>
                      <td align="center">
                        <div class="btn-option text-center">
                          <a href="{{ route('levels.edit', $level->id) }}"  class="btn btn-default fa fa-pencil-square-o pull-left" >
                          </a>
                          <form method="POST" action="{{ route('levels.destroy', $level->id) }}" class="inline">
                            {!! csrf_field() !!}
                            {{ method_field('DELETE') }}
                            <button type="submit" 
                              class="btn btn-default fa fa-trash-o btn-delete-item"
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
                {!! $levels->render() !!}
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
