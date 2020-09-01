@extends('layout')

@section('content')

    <h1>Cve</h1>
        <a href="{{ url('cves/'.($limit+2)) }}" >Next</a>
        @if($limit > 0)
        <a href="{{ url('cves/'.($limit-2)) }}" >Prec</a>
        @endif
    <div class="row">
    <div> {{$date}}</div>
    <table class="striped">
        <thead>
          <tr>
              <th>Name</th>
              <th>Item Name</th>
              <th>Item Price</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($cves as $dt)
          <tr>
            <td>{{ $dt['id'] }}</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td>
          <form action="" method='POST'>
          <a href="">Update</a>
          @csrf
          {{ method_field('DELETE') }}
          <button class="btn waves-effect waves-light red" type="submit">Delete</button>
          </form>
              </td>
          </tr>
        @endforeach
       
       
        </tbody>
      </table>
    </div>

  @if (!session()->has('cveEdit'))
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

  @endif
  @if (session()->has('cveEdit'))
   
   {{session('cveEdit')->information}}
   <div class="row">
    <form class="col s12" method='POST' action="cve/{{session('cveEdit')->id}}">
    <input type='hidden' name='_method' value="PUT"/>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="input_information" type="text" name= "information"  value="{{session('cveEdit')->information}}" class="validate">
          <label for="input_information">Information</label>
         <div> {{ $errors->first('information')}} </div>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="input_link" type="text" name="link" class="validate" value="{{session('cveEdit')->link}}">
          <label for="input_link">Link</label>
         <div> {{ $errors->first('link')}} </div>
        </div>
        <button class="btn waves-effect waves-light red" type="submit" name="action">Submit
    <i class="material-icons right">Update</i>
    @csrf
  </button>
      </div>
    </form>
  </div>
session()->forget('cveEdit');
session()->flush();
@endif
@endsection