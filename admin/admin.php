<!DOCTYPE html >
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
</head>
<body>
    
    <?php 
        require("./authAd.php");
    ?>
        
   
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/index.php">Game Olymp - Admin:</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav mr-auto" >
                <li class="nav-item active">
                    <a class="nav-link" href="/index.php">Matches </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/html/standings.php">Standings</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/html/disciplines.php">Disciplines <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/php/logout.php" method="post">
                <input class="form-control mr-sm-2" type="search" value="user" id="userName" placeholder="User" aria-label="User" readonly>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    
    <div class="card container-fluid" style="margin: 15px 5px 0 5px">
        <form action="startDis.php" method="post">
            <div class="form-group">
                <label for="startDisSelect">Start Discipline</label>
                <select class="form-control" id="startDisSelect" name="id">
                </select>
            </div>
            <div class ="from-group">
                <input type="date" name="date">
            </div>
            <div class ="from-group" style="margin: 15px 0 5px 0">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    
    <div class="card container-fluid" style="margin: 15px 5px 0 5px">
        <form action="nextRound.php" method="post">
            <div class="form-group">
                <label for="nextRoundSelect">Next Round</label>
                <select class="form-control" id="nextRoundSelect" name="id">
                </select>
            </div>
            <div class ="from-group">
                <input type="date" name="date">
            </div>
            <div class ="from-group" style="margin: 15px 0 5px 0">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/js/UserShow.js"></script>
    
    
    <script src="adminCon.js"></script>
    
</body>
</html>