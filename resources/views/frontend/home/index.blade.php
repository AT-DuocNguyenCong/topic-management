@extends('frontend.layouts..main')
@section('title', __('Home page'))
@section('content')
    <div id="fh5co-media-section">
      <div class="container">
        @include('flash::message')
        <div class="row animate-box">
          <div class="col-md-8 col-md-offset-2 text-center heading-section">
            <h3>{{ __('Welcome to SCIENCE TOPICS MANAGEMENT') }}</h3>
            <p>{{ __('The University of Danang, founded in 1994, is one of three regional universities in Vietnam, based in Da Nang City. Da Nang University is currently a multi-disciplinary university, one of 18 major national universities in Vietnam.') }}</p>
          </div>
        </div>
        <div class="row">
          @if($topics[0] != null)
            <div class="col-md-7 animate-box">
              <a href="{{ route('user.topics.show', $topics[0]->id) }}" >
              <div class="fh5co-cover cls-effect-2" style="background-image: url({{ $topics[0]->img != null ? asset($topics[0]->img) : asset('frontend/images/work-1.jpg') }});">
                <div class="desc">
                  <p>{{ $topics[0]->name }}</p>
                  <span>{{ $topics[0]->user->full_name }}</span>
                </div>
              </div>
              </a>
            </div>
          @endif

          <div class="col-md-5">
            <div class="fh5co-cover">
              @foreach($topics as $topic)
              @if ($topic == $topics[0])
                @continue
              @endif
              <div class="fh5co-cover-hero animate-box cls-effect">
              <a href="{{ route('user.topics.show', $topic->id) }}">
                  <div class="fh5co-cover-thumb" style="background-image: url({{ $topic->img != null ? asset($topic->img) : asset('frontend/images/work-1.jpg') }}); height: 120px"></div></a>
                  <div class="desc-thumb">
                  <p>{{ $topic->name }}</p>
                  <span>{{ $topic->user->full_name }}</span>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <p class="pull-right cls-hover-link" style="font-size: 30px"><a href="{{ route('user.fields.index') }}">{{ __('See more') }}</a></p>
      </div>
    </div>
    <!-- END fh5co-intro-section -->
    <div id="fh5co-product-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
            <h3>{{ __('Gallery') }}</h3>
            <p>{{ __('Danang University of Technology - University of Danang, which is one of the Technical Universities partners, has joined Higher Engineering Education Alliance Program (HEEAP) Cadence Makes Multimillion Dollar In-Kind Donation to HEEAP to Help Prepare Engineering Students in Vietnam') }}</p>
          </div>
        </div>
        <div class="owl-carousel owl-carousel2">
          <div class="item animate-box"><a href="images/product-1.jpg" class="image-popup"><img src="{{ asset('images/topic/topic_default3.jpg') }}" alt="image"></a></div>
          <div class="item animate-box"><a href="images/product-2.jpg" class="image-popup"><img src="{{ asset('images/topic/topic_default4.jpg') }}" alt="image"></a></div>
          <div class="item animate-box"><a href="images/product-3.jpg" class="image-popup"><img src="{{ asset('images/topic/topic_default3.jpg') }}" alt="image"></a></div>
          <div class="item animate-box"><a href="images/product-4.jpg" class="image-popup"><img src="{{ asset('images/topic/topic_default4.jpg') }}" alt="image"></a></div>
        </div>
      </div>
    </div>
    <!-- END fh5co-product-section -->
    <div id="fh5co-section" class="fh5co-grey-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 animate-box">
            <div class="fh5co-inner">
              <i class="icon-shield"></i>
              <div class="holder-section">
                <h3>{{ __('About Us') }}</h3>
                <p>{{ __('Danang University of Technology - University of Danang, which is one of the Technical Universities partners') }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 animate-box">
            <div class="fh5co-inner">
              <i class="icon-phone"></i>
              <div class="holder-section">
                <h3>{{ __('Contact') }}</h3>
                <p>Email: dev.team@gmail.com Phone: 0987655442</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 animate-box">
            <div class="fh5co-inner">
              <i class="icon-shield"></i>
              <div class="holder-section">
                <h3>{{ __('About Danang University') }}</h3>
                <p>{{ __('Danang University of Technology - University of Danang, which is one of the Technical Universities partners') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection
  <!-- END: box-wrap -->


