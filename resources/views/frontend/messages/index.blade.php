@extends('frontend.layouts..main')
@section('title', __('Messages | '. Auth::user()->full_name))
@section('content')
  <div class=" container content-wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          @foreach($messages as $message)
            <div class="alert cls-alert-info" style="font-size: 18px">
              <strong>Sender: {{ __($message->reciever->full_name) }}</strong>
              <p><strong>Content:</strong></p>
              <div class="row">
                <div style="margin-left: 1%">
                  <textarea readonly class="col-md-9" style="resize: none">{!! $message->content !!}</textarea>
                </div>
                <div class="col-md-2 pull-right" style="margin-top: 10px"><button class="btn btn-danger pull-right">Remove</button></div>
                
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