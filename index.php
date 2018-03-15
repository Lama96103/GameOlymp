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
        require("./php/login/auth.php");
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
                <form class="form-inline my-2 my-lg-0" action="../php/login/logout.php" method="post">
                  <input class="form-control mr-sm-2" type="search" value="user" id="userName" placeholder="User" aria-label="User" readonly>
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
        </nav>
    </div>

    <div style="margin: 40px 0 0 0; padding: 25px 2px 0 2px;" class="container-fluid bg-light">
        <div class="container-fluid" >
            <div class="row">
                <!-- Left -->
                <div class="col col-md-3" style="padding: 0 10px 0 10px; margin-bottom: 15px">
                    <div class="jumbotron bg-dark" style="padding: 25px 25px 25px 25px; width: 100%; margin-bottom: 0px;">
                        <div class="container">
                            <h1 class="h4 text-light">About us</h1>
                            <!-- AddInfo -->
                            <p class="lead text-light" style="font-size: 1.1rem;">At the beginning of 2018 we had the idea of creating our own website, where friends but also strangers compete in many different video games. Everyone can join us and our goal is a friendly and pleasant gaming-enviroment. Good luck and have fun!
                            </br>Leon, Lars and Tom</p>
                        </div>
                    </div>
                </div>
                <!-- Middle -->
                <div id="breaker"></div>
                <div class="col col-md-6" id="Middle" style="padding: 0 10px 15px 10px;">
                    <?php
                        include './php/index/loadNews.php';
                    ?>
                </div>
                <div id="breaker2"></div>
                <!-- Right -->
                <div class="col col-md-3" style="padding: 0 10px 0 10px;">
                    <div class="container-fluid" >
                        <div class="row">
                            <div class="jumbotron bg-dark" style="padding: 25px 25px 25px 25px; width: 100%;">
                                <div class="container">
                                    <h1 class="h4 text-white">Matches</h1>
                                        <!-- Add Info -->
                                        <ul class="list-group" id="privateMatch" style="width: 100%;">
                                        </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -20px;">
                             <div class="jumbotron bg-dark" style="padding: 25px 25px 25px 25px; width: 100%">
                                <div class="container">
                                    <h1 class="h4 text-white">Welcome</h1>
                                        <!-- ADD INFO -->
                                    <p class="lead text-light" style="font-size: 1.1rem;">You made it! You can join a Tournament with the Discipline Tab.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <nav class="navbar fixed-buttom navbar-dark" style="background-color: #4A4C52;">
          <a class="navbar-brand" href="/index.php">Game Olymp</a>
            <p class="lead text-light" style="font-size: 1rem;"><?php echo $impressum ?></p>
        </nav>
    </div>

        <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input Result</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/php/index/finishMatch.php" method="post">
                <div class="form-group">
                    <label for="name" id="homeLabelModal">Your Points?</label>
                    <input type="number" class="form-control" name="home" id="editModalHome" placeholder="Points" aria-describedby="nameHelp" required="[0-9]{1}" min="0" max="3"><br>
                </div>
                <div class="form-group">
                    <label for="name" id="guestLabelModal">Your Opponents Points?</label>
                    <input type="number" class="form-control" name="guest" id="editModalGuest" placeholder="Points" aria-describedby="nameHelp" required="[0-9]{1}" min="0" max="3"><br>
                </div>
                <input type="hidden" value="" name="matchId" id="toEditModal">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success"  type="submit" >Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/boot/popper.js"></script>
    <script src="/boot/js/bootstrap.js"></script>

    <script src="/js/UserShow.js"></script>
    <script src="/js/index.js"></script>
</body>
</html>
