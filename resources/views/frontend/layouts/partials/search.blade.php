<div class="cls-search-topic" id="js-search-form" hidden="">
  <div class="" style="width: 500px;">
    <form action="{{route('search.fields')}}" class="container-search" method="GET">
      <div class="col-md-4 nopadding">
        <select name='fieldname' class="form-control cls-search-field">
          <option value="">{{('Field')}}</option>
          @php
            $fields = getField();
          @endphp
          @foreach($fields as $field)
          <option value="{{$field->id}}" {{request('fieldname') == $field->id ? 'selected' :''}}> {{$field->name}}</option>
          }
          @endforeach
        </select>
      </div>
    <div class="col-md-6 nopadding">
      <input type="text" name="topicname" class="form-control cls-search-key" placeholder="Keyword" value="{{request('topicname')}}">
    </div>
    <div class="col-md-2 nopadding">
      <button type="submit" class="btn btn-primary form-control cls-search-button"><i class="glyphicon glyphicon-search"></i></button>
    </div>
    </form>
  </div>
</div>