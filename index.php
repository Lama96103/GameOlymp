<!DOCTYPE html >
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Game Olymp</title>
</head>
<body>
    
    <?php 
        //require("./php/auth.php");
    ?>
        
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/index.php">Game Olymp</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <ul class="navbar-nav mr-auto" >
                <li class="nav-item active">
                    <a class="nav-link" href="/site/matches.php">Matches <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/site/standings.php">Standings</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/site/disciplines.php">Disciplines</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="/php/logout.php" method="post">
                  <input class="form-control mr-sm-2" type="search" value="user" id="userName" placeholder="User" aria-label="User" readonly>
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
        </nav>
    </div>
    
    <div style="margin: 10px 0 0 0">
        <div class="container-fluid">
          <div class="row">
            <div class="col col-md-2">
                <div class="jumbotron">
                  <div class="container">
                    <h1 class="display-2">Left</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                  </div>
                </div>
            </div>
                <div class="col col-md-8">
                    <div class="jumbotron ">
                        <div class="container" style="padding: 0 0 0 0">
                            <h1 class="display-4">News</h1>
                            <ul class="list-group " >
                                <li class="list-group-item list-group-item-dark">
                                    <p>Hier gibts was Neues</p>
                                </li>
                                <li class="list-group-item list-group-item-dark">
                                     <p>Das ist ja toll</p>
                                </li>
                                <li class="list-group-item list-group-item-dark">
                                     <p>Der gewinnt gegen den</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                  </div>
                <div class="col col-md-2">
                    <div class="container">
                        <div class="row">
                         <div class="jumbotron">
                            <div class="container">
                                <h1 class="display-4">Right UP</h1>
                                <p class="lead">Hier steht viel unötiger Text drin</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="w-100 d-none d-md-block"></div>
              
                
              
            </div>
            <div class="row">
                <div class="col align-self-end">
                        <div class="container">
                                <div class="jumbotron">
                                    <div class="container">
                                        <h1 class="display-4">Right UP</h1>
                                        <p class="lead">Hier steht viel unötiger Text drin</p>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/js/UserShow.js"></script>
    
    <script src=""></script>
    
</body>
</html>