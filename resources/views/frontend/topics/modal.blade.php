<div class="modal fade cls-modal-booking" id="booking-modal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-md-5">
          <img class="img-circle img-responsive" src="{{ asset('img/success.jpg') }}" alt="">
        </div>
        <p class="cls-modal-booking-text text-center">{{ __('Create success!') }}</p>
        <p class="text-center" style="margin-bottom: -2%; margin-top: -3%;">{{ __('Thank you! Please waiting for Admin approve!') }}</p>
      </div>
      <div class="modal-footer cls-modal-booking-footer">
        <a href="{{ route('home.index') }}" class="btn btn-primary">{{ __('Yes, I known') }}</a>
      </div>
    </div>
    
  </div>
</div>