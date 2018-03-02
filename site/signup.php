<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
</head>
<body>
    
    <div class="jumbotron">
        <h1 class="display-4">Game Olymp</h1>
        <p class="lead">Welcome to the Game Olymp. If you have a Key, then go for it. If not contact me.</p>
    </div>
    
    <div class="container-fluid" style="background-color: white; margin-top: 10px">
        <form action="/php/login/addPlayer.php" method="post" >
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                    </div>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                    <div class="invalid-tooltip">
                      Please choose a unique and valid username.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" aria-describedby="validationTooltipUsernamePrepend" required>
                    <div class="invalid-tooltip">
                      Please choose a unique and valid password.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="key" name="key" placeholder="Key" aria-describedby="validationTooltipUsernamePrepend" required>
                    <div class="invalid-tooltip">
                      Please choose a unique and valid key.
                    </div>
                </div>
            </div>
            <!--
            <div class="from-group" style="margin-bottom: 15px">
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
            </div>
            <div class="from-group" style="margin-bottom: 15px">
                <input type="password" class="form-control" name="key" id="key" placeholder="Key">
            </div>-->
            <div class="container form-group">
                <button type="submit" class="btn btn-primary col align-self-center" >Make Account</button>
            </div>
            <div class="container from-group">
                <?php 
                if (isset($_GET["error"])){
                    echo $_GET["error"]; 
                }
                ?>
            </div>
        </form>
    </div>


    
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>