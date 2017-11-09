@extends('frontend.layouts.main')

@section('title')

@section('content')
  <div class=" container content-wrapper">
    <div class="content-wrapper">
     <section class="content">
       <h1 class="title-page text-primary text-center">{{__('Topic Information')}}</h1>
       <div class="row margin-center">
        <div class="col-md-12 nopadding-r">
          <div class="col-md-3">
          </div>
          @if (Auth::user())
            <div class="col-md-12 alert cls-alert-info nopadding-r">
            <p>{{ __('Hi, :name', ['name' => Auth::user()->full_name]) }}</p>
            <form id="participant-form" role="form" method="POST" action="{{ route('topic.participates') }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
                  <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}">
                  <input type="text" hidden name="topic_id" value="{{ $topic->id }}">
                  <input type="text" hidden name="status" value="{{ App\UserTopic::STATUS_PENDING }}">
                </form>
            </div>
          @else
            <div class="col-md-12 alert alert-danger nopadding-r">
            <p>{{ __('Please Login to Participate. ') }} <a href="{{ route('login') }}"><strong>{{ __('Click here.') }}</strong></a></p>
            </div>
          @endif
        </div>
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
               {{-- {{dd(Auth::user()->usertopics->count() )}} --}}
                @if (Auth::user() && Auth::user()->usertopics->count() > 3)
                  <button href="" class="pull-right btn btn-primary" disabled data-toggle="tooltip" title="{{ __('You have joined :x topics, You can not register more', ['x' => Auth::user()->usertopics->count()]) }}">
                  </button>
                 {{__('Participate')}}
                  @elseif (Auth::user()->usertopics->where('topic_id', $topic->id)->count() > 0)
                    <button href="" class="pull-right btn btn-primary" disabled data-toggle="tooltip" title="{{ __('You have registered for this topic.') }}">{{__('Participate')}}
                    </button>
                  @elseif ($topic->max_member <= $topic->usertopics->count())
                    <button href="" class="pull-right btn btn-primary" disabled data-toggle="tooltip" title="{{ __('Enough participants, You can not participants') }}">{{__('Participate')}}
                    </button>
                  @else
                    <button onClick="participate()" href="" class="pull-right btn btn-primary" id="js-participate">{{__('Participate')}}
                    </button>
                @endif
                
                <script>
                  function participate() {
                    document.getElementById("participant-form").submit();
                  }
                </script>
             </div>
           </div>
         </div>
       </div>
     </section>
   </div> 
  </div>

@endsection
