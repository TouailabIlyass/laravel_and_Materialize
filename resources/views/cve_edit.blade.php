@extends('layout')

@section('content')

    <h1>Cve</h1>

    <div class="row">
        @foreach ($cves as $cve)
            
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">{{$cve->information}}</span>
          <p>{{$cve->link}}</p>
          <p>cree en: {{$cve->created_at}}</p>
        </div>
        <div class="card-action">
          <a href="#">Update</a>
          <form action="{{ url('cve/'.$cve->id) }}" method='POST'>
          @csrf
          {{ method_field('DELETE') }}
          <button class="btn waves-effect waves-light red" type="submit">Delete</button>
          </form>
        </div>
      </div>
    </div>
 
        @endforeach
    </div>

    <div class="row">
    <form class="col s12" method='POST' action='cves'>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="input_information" type="text" name= "information" class="validate">
          <label for="input_information">Information</label>
         <div> {{ $errors->first('information')}} </div>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="input_link" type="text" name="link" class="validate">
          <label for="input_link">Link</label>
         <div> {{ $errors->first('link')}} </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
    @csrf
  </button>
      </div>
    </form>
  </div>
@endsection