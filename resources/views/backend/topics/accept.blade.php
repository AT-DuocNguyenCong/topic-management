@extends('backend.layouts.main')

@section('title')

@section('content')
      <div class="content-wrapper">
     <section class="content">
       <h1 class="title-page text-primary text-center">{{__('Topic Information')}}</h1>
       <div class="row margin-center">
         <div class="col-md-12 cls-font-20 n">
           <div class="box">
             <div class="box-body">
               <table class="table table-condensed table-responsive">
                 <tbody>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-grain text-primary"></i>
                         {{ __('Title') }}
                       </strong>
                     </td>
                     <td>
                       {{ $topic->name }}
                     </td>
                   </tr>
                   <tr >
                     <td class="col-md-3">
                       <strong>
                         <i class="glyphicon glyphicon-credit-card text-primary"></i>
                         {{ __('Field') }}
                       </strong>
                     </td>
                     <td>
                      {{ $topic->field->name }}
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-user text-primary"></i>
                         {{ __('Author') }}
                       </strong>
                     </td>
                     <td>
                      {{ $topic->user->username }}
                   </tr>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-globe text-primary"></i>
                         {{ __('Overview') }}
                       </strong>
                     </td>
                     <td>
                     {{ $topic->over_view }}
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-globe text-primary"></i>
                         {{ __('Method') }}
                       </strong>
                     </td>
                     <td>
                     {{ $topic->method }}
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-flash text-primary"></i>
                         {{ __('Urgency') }}
                       </strong>
                     </td>
                     <td>
                     {{ $topic->urgency }} 
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-tint text-primary"></i>
                         {{ __('Expense') }}
                       </strong>
                     </td>
                     <td>
                       {{ $topic->expense }}
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-cloud text-primary"></i>
                         {{ __('Status') }}
                       </strong>
                     </td>
                     <td>
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
                      {{ $status }}
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-calendar text-primary"></i>
                         {{ __('Date begin') }}
                       </strong> 
                     </td>
                     <td>
                      sad
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-calendar text-primary"></i>
                         {{ __('Date end') }}
                       </strong> 
                     </td>
                     <td>
                      sad
                     </td>
                   </tr>
                 </tbody>
               </table>
             </div>
             {{--  --}}
              <div class="col-md-12 text-center">
                <div class="col-md-3"></div>
                <button type="button" class="btn btn-primary btn-lg col-md-6 cls-mt-30" data-toggle="modal" data-target="#myModal">Open Document</button>
              </div>

             <div class="box-footer">
               <div class="col-md-12 cls-mt-30 nopadding">
                 <a href="{{ URL::previous() }}" style="margin-left: -10px" class="pull-left btn btn-default">
                 {{__('Back')}}
               </a>
              <form method="POST" action="
                  {{ route('topics.updateStatus', $topic->id) }}">
                  {!! csrf_field() !!}
                  {{ method_field('PUT') }}
                  <input type="text" name="status" hidden value="{{ App\Topic::STATUS_FINISH }}">
                  <button style="margin-right: 10px" class="pull-right btn btn-success">
                    {{__('Finish')}}
                  </button>
              </form>
              <button type="button" data-toggle="modal" data-target="#myModal2" style="margin-right: 10px" hidden class="pull-right btn btn-danger">{{__('Request change')}}</button>

           {{--    <form method="POST" action="
                  {{ route('topics.updateStatus', $topic->id) }}">
                  {!! csrf_field() !!}
                  {{ method_field('PUT') }}
                  <input type="text" value="">
                  <button style="margin-right: 10px" hidden class="pull-right btn btn-danger">
                    {{__('Request change')}}
                  </button>
                </form> --}}
             </div>
               </div>
           </div>
         </div>
       </div>
     </div>
            <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog cls-dialog-modal">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Document</h4>
                    </div>
                    <div class="modal-body">
                      <iframe src="{{ $topic->document_path != null ? asset($topic->document_path) : '' }}" style="width: 100%; height: 400px;" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>

              <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Content request change</h4>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="
                        {{ route('topics.updateStatus', $topic->id) }}">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <input type="text" name="status" value="{{ App\Topic::STATUS_PENDING_USER }}" hidden>
                        <textarea class="form-control" name="content" type="text"></textarea>
                        <button style="margin-right: 10px" hidden class="pull-right btn btn-danger cls-mt-30">
                          {{__('Request change')}}
                        </button>
                      </form>
                    </div>
                    {{-- <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> --}}
                  </div>
                  
                </div>
              </div>
     </section>

@endsection
