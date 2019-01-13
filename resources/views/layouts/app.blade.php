
<html>

<head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "{{asset('css/custom.css')}}">


</head>

<body>
  

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
              </nav>
    
    <div class = "container">
        <div class="row">
            <div class="col-sm-3" id = "sideBar">
                <h3>Beginner Tricks </h3>
                @foreach ($beginnerTricks as $trick)
                    <ul>
                        <li>
                            <a href = "{{$trick["url"]}}">{{$trick["trickName"]}}</a>
                        </li>
                    </ul>
                @endforeach
                <h3>Intermediate/Advanced Tricks </h3>
                @foreach ($advancedTricks as $trick)
                    <ul>
                        <li>
                            <a href = "{{$trick["url"]}}">{{$trick["trickName"]}}</a>
                        </li>
                    </ul>
                @endforeach
            </div>
            
            <div class = "col-sm-9">
                @yield('content')
            </div>

        </div>
    </div>



</body>

</html>