<div class="cls-search-topic">
  <div class="col-md-12">
    <form action="{{route('search.fields')}}" class="container-search" method="GET">
      <div class="col-md-4">
        <select name='fieldname' class="form-control">
          <option value="">{{('Please choose field you want to search')}}</option>
          @php
            $fields = getField();
          @endphp
          @foreach($fields as $field)
          <option value="{{$field->id}}" {{request('fieldname') == $field->id ? 'selected' :''}}> {{$field->name}}</option>
          }
          @endforeach
        </select>
      </div>
    <div class="col-md-4">
      <input type="text" name="topicname" class="form-control" placeholder="Keyword" value="{{request('topicname')}}">
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary form-control">{{__('Search topic')}}</button>
    </div>
    </form>
  </div>
</div>