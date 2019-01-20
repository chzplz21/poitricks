@extends('layouts.app')

@section('content')

    <h1 class = "trickH1"> {{$trickName}}  </h1>
    <div class = "row">
    @foreach ($trickVideosArray as $video)
       
          <div class="card col-sm-4">
            <a href = "{{$video->youtubeURL}}" target = "blank">
                <img class = "card-img-top" src = "{{$video->youtubeThumbnail}}">         
                <div class="card-body">   
                  <p>Creator: {{$video->creator}}</p>
                  <p>{{$video->description}}</p>  
                  <p class = "read-more"></p>              
                </div>
           </a>
          </div>
      
        

    @endforeach
   </div>

@endsection

