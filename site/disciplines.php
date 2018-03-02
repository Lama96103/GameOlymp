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
        require("../php/login/auth.php");
    ?>
    
        
    <div>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
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
                <form class="form-inline my-2 my-lg-0" action="/php/login/logout.php" method="post">
                  <input class="form-control mr-sm-2" type="search" value="user" id="userName" placeholder="User" aria-label="User" readonly>
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
        </nav>
    </div>
    
    <div style="margin: 20px 0 0 0; padding: 25px 2px 10px 2px;" class="container-fluid bg-light">
        <div class="container-fluid" style="margin: 40px 0 0 5px">
            <h1 class="display-6">Your Disciplines</h1>
            <ul id="privateDis" class="list-group">
            </ul>
        </div>
        <div class="container-fluid" style="margin: 15px 0 0 0">
            <h1 class="display-6">Available Disciplines</h1>
            <ul id="publicDis" class="list-group">

            </ul>
        </div>
    </div>
    
    
    
    <div>
        <nav class="navbar fixed-buttom navbar-dark" style="background-color: #4A4C52;">
            <a class="navbar-brand" href="/index.php">Game Olymp</a>
            <p class="lead text-light">Here will be a fantastic impressum</p>
        </nav>
    </div>
        

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/js/UserShow.js"></script>
    <script src="/js/disciplines.js"></script>
</body>
</html>