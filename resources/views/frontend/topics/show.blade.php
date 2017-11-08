@extends('frontend.layouts.main')

@section('title')

@section('content')
  <div class=" container content-wrapper">
    <div class="content-wrapper">
     <section class="content">
       <h1 class="title-page text-primary text-center">{{__('Topic Information')}}</h1>
       <div class="row margin-center">
        <div class="col-md-6">
          <iframe src="{{ $topic->document_path != null ? asset($topic->document_path) : '' }}" style="width: 90%; height: 500px;" frameborder="0"></iframe>
        </div>
         <div class="col-md-6 cls-font-20 nopadding-r">
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
                      {{ $topic->user->full_name }}
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
             <div class="box-footer">
               <a href="{{ URL::previous() }}" class="pull-left btn btn-default">
                 {{__('Back')}}
               </a>
               <a href="{{ URL::previous() }}" class="pull-right btn btn-primary">
                 {{__('Participate')}}
               </a>
               
             </div>
           </div>
         </div>
       </div>
     </section>
   </div> 
  </div>

@endsection
