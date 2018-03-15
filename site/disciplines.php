<!DOCTYPE html >
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/boot/css/bootstrap.css">
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

    <div style="margin: 10px 0 0 0; padding: 10px 2px 10px 2px;" class="container-fluid bg-light">
        <div class="container-fluid" style="margin: 40px 0 0 0">
            <h1 class="display-4">Your Disciplines</h1>
            <ul id="privateDis" class="list-group">
            </ul>
        </div>
        <div class="container-fluid" style="margin: 15px 0 0 0">
            <h1 class="display-4">All Disciplines</h1>
            <ul id="publicDis" class="list-group">

            </ul>
        </div>
    </div>



    <div>
        <nav class="navbar fixed-buttom navbar-dark" style="background-color: #4A4C52;">
            <a class="navbar-brand" href="/index.php">Game Olymp</a>
            <p class="lead text-light" style="font-size: 1rem;"><?php echo $impressum ?></p>
        </nav>
    </div>


    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/boot/popper.js"></script>
    <script src="/boot/js/bootstrap.js"></script>

    <script src="/js/UserShow.js"></script>
    <script src="/js/disciplines.js"></script>
</body>
</html>
