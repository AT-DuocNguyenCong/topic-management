@extends('frontend.layouts..main')
@section('title', __('Messages | '. Auth::user()->full_name))
@section('content')
  <div id="fh5co-media-section">
    <div class="container">
      @foreach($messages as $message)
        <div class="alert cls-alert-info" style="font-size: 18px">
          <strong>Sender: {{ __($message->reciever->full_name) }}</strong>
          <p><strong>Content:</strong></p>
          {!! $message->content !!}
          <button class="btn btn-primary pull-right">Remove</button>
        </div>
      @endforeach
      <div class="pull-right cls-mr-13">
        {!! $messages->render() !!}
      </div>
  </div>
@endsection