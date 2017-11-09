@extends('frontend.layouts..main')
@section('title', __('Messages | '. Auth::user()->full_name))
@section('content')
  <div id="fh5co-media-section">
    <div class="container">
      @include('flash::message')
      @include('backend.layouts.partials.modal')
      @foreach($messages as $message)
        <div class="alert cls-alert-info" style="font-size: 18px">
          <strong>From: {{ __($message->reciever->full_name) }}</strong>
          <p><strong>Content:</strong></p>
          {!! $message->content !!}
          
          <form method="POST" action="{{ route('handlerequest.destroy', $message->id) }}" class="inline">
            {!! csrf_field() !!}
            {{ method_field('DELETE') }}
            <button type="submit" 
              class="btn btn-primary pull-right btn-delete-item"
              data-title="{{ __('Confirm deletion!') }}"
              data-confirm="{{ __('Are you sure you want to delete?') }}">Remove
            </button>
        </div>
      @endforeach
      <div class="pull-right cls-mr-13">
        {!! $messages->render() !!}
      </div>
  </div>
@endsection