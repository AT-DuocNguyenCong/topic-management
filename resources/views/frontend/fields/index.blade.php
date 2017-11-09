@extends('frontend.layouts..main')
@section('title', __('Home page'))
@section('content')
  <div id="fh5co-media-section">
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center heading-section">
          <h3>{{ __('SCIENCE TOPICS') }}</h3>
        </div>
      </div>
      @include('frontend.layouts.partials.search')
      @foreach($fields as $field)
        <hr/>
        <p>{{ $field->name }}</p>  
        <div class="row">
            <div class="col-md-7 animate-box">
              <div class="fh5co-cover" style="background-image: url({{ asset('images/topic/topic_default.jpg') }});">
                <div class="desc">
                  <p>{{ $field->name }}</p>
                  {{-- <span>{{ $fields[0]->user->username }}</span> --}}
                </div>
              </div>
            </div>
          {{-- @endif --}}

          <div class="col-md-5">
            <div class="fh5co-cover">
              @if(isset($field->topics))
                @foreach($field->topics as $topic)
                <div class="fh5co-cover-hero animate-box">
                    <a href="{{ route('user.topics.show', $topic->id ) }}">
                      <div class="fh5co-cover-thumb" style="background-image: url({{ $topic->img != null ? asset($topic->img) : asset('frontend/images/work-1.jpg') }}"></div></a>
                    <div class="desc-thumb">
                      <p>{{ $topic->name }}</p>
                      <span> {{ $topic->user->full_name }}</span>
                    </div>
                  </div>
                @endforeach
              @else
                @foreach($field->topicLimit as $topic)
                  <div class="fh5co-cover-hero animate-box">
                    <a href="{{ route('user.topics.show', $topic->id ) }}">
                      <div class="fh5co-cover-thumb" style="background-image: url({{ $topic->img != null ? asset($topic->img) : asset('frontend/images/work-1.jpg') }}"></div></a>
                    <div class="desc-thumb">
                      <p>{{ $topic->name }}</p>
                      <span> {{ $topic->user->full_name }}</span>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      @endforeach
    <div class="text-center">{{ $fields->links() }}</div>

      <p class="pull-right" style="font-size: 30px"><a href="">{{ __('See more') }}</a></p>
    </div>
  </div>
@endsection