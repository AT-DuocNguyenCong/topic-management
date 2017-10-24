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
        <div class="row">
          @if($topics[0] != null)
            <div class="col-md-7 animate-box">
              <div class="fh5co-cover" style="background-image: url({{ asset('frontend/images/work-1.jpg') }});">
                <div class="desc">
                  <p>{{ $topics[0]->name }}</p>
                  <span>Web Design</span>
                </div>
              </div>
            </div>
          @endif

          <div class="col-md-5">
            <div class="fh5co-cover">
              @foreach($topics as $topic)
              @if ($topic == $topics[0])
                @continue
              @endif
              <div class="fh5co-cover-hero animate-box">
                <a href=""><div class="fh5co-cover-thumb" style="background-image: url({{ asset('frontend/images/work-3.jpg') }}"></div></a>
                <div class="desc-thumb">
                  <p>{{ $topic->name }}</p>
                  <span>Web Design</span>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <p class="pull-right" style="font-size: 30px"><a href="">{{ __('See more') }}</a></p>
      </div>
    </div>
    <!-- END fh5co-intro-section -->
    <div id="fh5co-product-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
            <h3>Gallery</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>
        <div class="owl-carousel owl-carousel2">
          <div class="item animate-box"><a href="images/product-1.jpg" class="image-popup"><img src="{{ asset('frontend/images/product-1.jpg') }}" alt="image"></a></div>
          <div class="item animate-box"><a href="images/product-2.jpg" class="image-popup"><img src="{{ asset('frontend/images/product-2.jpg') }}" alt="image"></a></div>
          <div class="item animate-box"><a href="images/product-3.jpg" class="image-popup"><img src="{{ asset('frontend/images/product-3.jpg') }}" alt="image"></a></div>
          <div class="item animate-box"><a href="images/product-4.jpg" class="image-popup"><img src="{{ asset('frontend/images/product-4.jpg') }}" alt="image"></a></div>
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
                <h3>About Us</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 animate-box">
            <div class="fh5co-inner">
              <i class="icon-strategy"></i>
              <div class="holder-section">
                <h3>What We Doe</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 animate-box">
            <div class="fh5co-inner">
              <i class="icon-bike"></i>
              <div class="holder-section">
                <h3>Why We Choose Us</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection
  <!-- END: box-wrap -->


