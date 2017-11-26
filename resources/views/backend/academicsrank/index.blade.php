@extends('backend.layouts.main')

@section('title', __('Academics Rank | List Academics Rank'))

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('Academics Rank Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> {{ __('Home Page') }}</a></li>
        <li class="active">{{ __('Academics Rank') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="title-user mb-10">
                <h3 class="box-title title-header">{{ __('List Academics Rank') }}</h3>
              </div>  
              <div class="row">
                <div class="contain-btn">
                  <a class="btn btn-primary  pull-right clr-mr-13" href="{{route('academicsrank.create')}}">
                  <span class="fa fa-plus-circle"></span>
                  {{ __('Add Academic Rank') }}
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
                    <th class="col-md-0">{{ __('ID') }}</th>
                    <th class="col-md-1">{{ __('Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Type') }}</th>
                    <th class="text-center">{{ __('Option') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($academicsrank as $academicrank)
                    <tr>
                      <td ">{{ $academicrank->id }}</td>
                      <td>{{ $academicrank->name }}</td>
                      <td>{{ contentLimit($academicrank->description) }}</td>
                      <td>{{ $academicrank->type_label}}</td>
                      <td align="center">
                        <div class="btn-option text-center">
                          <a href="{{ route('academicsrank.edit', $academicrank->id) }}"  class="btn btn-default fa fa-pencil-square-o pull-left" >
                          </a>
                          <form method="POST" action="{{ route('academicsrank.destroy', $academicrank->id) }}" class="inline">
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
                {!! $academicsrank->render() !!}
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
