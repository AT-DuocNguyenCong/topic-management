@extends('frontend.layouts.main')

@section('title')

@section('content')
  <div class=" container content-wrapper">
    <div class="content-wrapper">
     <section class="content">
       <h1 class="title-page text-primary text-center">{{__('Topic Information')}}</h1>
       <div class="row margin-center">
         <div class="col-md-12">
           <div class="box">
             <div class="box-body">
               <table class="table table-condensed table-responsive">
                 <tbody>
                   <tr >
                     <td class="col-md-2">
                       <strong>
                         <i class="glyphicon glyphicon-credit-card text-primary"></i>
                         {{ __('Field Name') }}
                       </strong>
                     </td>
                     <td>
                      {{ $topic->field->name }}
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-grain text-primary"></i>
                         {{ __('Topic Name') }}
                       </strong>
                     </td>
                     <td>
                       {{ $topic->name }}
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <strong>
                         <i class="glyphicon glyphicon-user text-primary"></i>
                         {{ __('Own name') }}
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
                         <i class=" glyphicon glyphicon-education text-primary"></i>
                         {{ __('Goal') }}
                       </strong>
                     </td>
                     <td>
                      {{ $topic->goal }}
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
                       asd
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
               
             </div>
           </div>
         </div>
       </div>
     </section>
   </div> 
  </div>

@endsection
