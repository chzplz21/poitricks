
<html>

<head>
    <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel ="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+KuaiLe" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "{{asset('css/custom.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>
   
    <meta name="description" content="Poi Tricks Video Lessons">
    <meta name="keywords" content="poi, tricks, lessons, tutorials, videos">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
        <div class="jumbotron">
          <h1 class="display-4"><b>Poi Tricks RePoisatory</b></h1>
          <p class="lead"><b>A rePoisatory of poi tricks and accompanying Youtube lessons created by rad
            poi artists.</b>
          </p>
        
      </div>

        <nav class="navbar navbar-absolute navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">poi trick lessons</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon">
                      <i class="fa fa-navicon"></i>
                  </span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/about">about <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/contact">contact</a>
                    </li>
                  </ul>
                  
                </div>
              </nav>
    
   

     


       

        <div class="row">
            <div class="col-md-3" id = "sideBar">
                <div class = "trickListContainer" id = "beginnerContainer">
                  <p class = "trickTitle openDown" id = "beginnerTitle">Beginner Tricks </p>
                  <button class=" navbar-toggler trickToggle openDown"  type="button" data-toggle="collapse" >
                      <span class="navbar-toggler-icon">
                          <i class="fa fa-navicon"></i>
                      </span>
                  </button>
                  <ul class = "trickList hide">
                      
                    @foreach ($beginnerTricks as $trick)
                      
                            <li>
                                <a href = "{{$trick["url"]}}">{{$trick["trickName"]}}</a>
                            </li>
                        
                    @endforeach
                 </ul>
               </div>
               <div class = "trickListContainer" id = "advancedContainer">
                  <p class = "trickTitle openDown">Intermediate/Advanced Tricks </p>
                  <button class="navbar-toggler trickToggle openDown" type="button" data-toggle="collapse">
                      <span class="navbar-toggler-icon">
                          <i class="fa fa-navicon"></i>
                      </span>
                  </button>
                  <ul class = "trickList hide">
                    @foreach ($advancedTricks as $trick)
                          <li>
                              <a href = "{{$trick["url"]}}">{{$trick["trickName"]}}</a>
                          </li>
                    
                    @endforeach
                  </ul>
               </div>
            </div>
         
           
            <div class = "col-md-9">
                @yield('content')
            </div>

        </div>
    



</body>

</html>