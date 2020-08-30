@extends('layout')

@section('content')

    <h1>Cve</h1>
    <ul>
        @foreach ($cves as $cve)
            <li>{{$cve->information}}</li>
            <li>{{$cve->link}}</li>
            <li>{{$cve->created_at}}</li>
        @endforeach
    </ul>

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