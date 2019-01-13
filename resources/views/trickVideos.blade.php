@extends('layouts.app')

@section('content')

    <h1> {{$trickName}}  </h1>
    <div class = "row">
    @foreach ($trickVideosArray as $video)
       
        <div class="card col-sm-4">
                <img class = "card-img-top" src = "{{$video->youtubeThumbnail}}">
                
                <div class="card-body">       
                        <a href = "{{$video->youtubeURL}}}" target = "blank">
                    
            </div>
            </div>
     

    @endforeach
   </div>

@endsection

