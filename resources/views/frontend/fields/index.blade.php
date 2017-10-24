@extends('frontend.layouts..main')
@section('title', __('Home page'))
@section('content')
  <div id="fh5co-media-section">
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center heading-section">
          <h3>{{ __('Welcome to website') }}</h3>
          <p>The University of Danang, founded in 1994, is one of three regional universities in Vietnam, based in Da Nang City. Da Nang University is currently a multi-disciplinary university, one of 18 major national universities in Vietnam.</p>
        </div>
      </div>
      @foreach($fields as $field)
        <hr/>
        <p>{{ $fields[0]->name }}</p>  
        <div class="row">
          @if($fields[0] != null)
            <div class="col-md-7 animate-box">
              <div class="fh5co-cover" style="background-image: url({{ asset('frontend/images/work-1.jpg') }});">
                <div class="desc">
                  <p>{{ $fields[0]->name }}</p>
                  <span>Web Design</span>
                </div>
              </div>
            </div>
          @endif

          <div class="col-md-5">
            <div class="fh5co-cover">
              @foreach($field->topicLimit as $topic)
                @if ($field == $fields[0])
                  @continue
                @endif
                <div class="fh5co-cover-hero animate-box">
                  <a href="{{ route('user.topics.show', $topic->id ) }}">
                    <div class="fh5co-cover-thumb" style="background-image: url({{ asset('frontend/images/work-3.jpg') }}"></div></a>
                  <div class="desc-thumb">
                    <p>{{ $topic->name }}</p>
                    <span>Web Design</span>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
    <div class="text-center">{{ $fields->render() }}</div>

      <p class="pull-right" style="font-size: 30px"><a href="">{{ __('See more') }}</a></p>
    </div>
  </div>
@endsection