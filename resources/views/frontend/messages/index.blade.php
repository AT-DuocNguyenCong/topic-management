@extends('frontend.layouts..main')
@section('title', __('Messages | '. Auth::user()->full_name))
@section('content')
  <div class=" container content-wrapper">
    <div class="content-wrapper">
      <section class="content">
        @include('flash::message')
        @include('backend.layouts.partials.modal')
        <div class="row">
          @foreach($messages as $message)
            <div class="alert cls-alert-info" style="font-size: 18px">
              <strong>Sender: {{ __($message->reciever->full_name) }}</strong>
              <p><strong>Content:</strong></p>
              <div class="row">
                <div style="margin-left: 1%">
                  <textarea readonly class="col-md-9" style="resize: none">{!! $message->content !!}</textarea>
                </div>
                <div class="col-md-2 pull-right" style="margin-top: 10px">
                  <form method="POST" action="{{ route('handlerequest.destroy', $message->id) }}" class="inline">
                  {!! csrf_field() !!}
                  {{ method_field('DELETE') }}
                  <button type="submit" 
                    class="btn btn-primary pull-right btn-delete-item"
                    data-title="{{ __('Confirm deletion!') }}"
                    data-confirm="{{ __('Are you sure you want to delete?') }}">Remove
                  </button>
                  </form>
                </div>
                
              </div>
            </div>
          @endforeach
          <div class="pull-right cls-mr-13">
            {!! $messages->render() !!}
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection