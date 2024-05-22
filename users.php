<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VS</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <style>
      .headerFont{
        font-family: 'Ubuntu', sans-serif;
        font-size: 24px;
      }

      .subFont{
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        
      }
      
      .specialHead{
        font-family: 'Oswald', sans-serif;
      }

      .normalFont{
        font-family: 'Roboto Condensed', sans-serif;
      }
    </style>

  </head>
  <body>
	
	<div class="container">
  	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse
    " role="navigation">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header">
          <a href="cpanel.php" class="navbar-brand headerFont text-lg">Voting System</a>
        </div>

      </div>
    </nav>

    
    <div class="container" style="padding-top:70px;">
    <h4 class="text-center">Displaying Top 2 Voters</h4>
    <div class="row">
      
      <div class="col-sm-12">
        <table class="table table-bordered table-hover">
          <tr>
            <th><strong>Voter's Full Name</strong></th>
            <th><strong>E-Mail</strong></th>
            <th><strong>Voter ID</strong></th>
          </tr>

          <?php
                      require('config.php');

                      $conn = mysqli_connect($hostname, $username, $password, $database);

                      if (!$conn) {
                       die("Connection failed: " . mysqli_connect_error());
                       }


                        for ($i=1; $i < 30; $i++) { 
                          
                          $sql= "SELECT * FROM votingsystem.tbl_users where id='".$i."'";
                          $query = mysqli_query($conn, $sql);

                          if(mysqli_num_rows($query)>0)
                            {
                              while($row= mysqli_fetch_assoc($query))
                              {
                                $full_name= $row['full_name'];
                                $email= $row['email'];
                                $voter_id= $row['voter_id'];
                                echo "
                                  <tr>
                                      <td>$full_name</td>
                                      <td>$email</td>
                                      <td>$voter_id</td>
                                  </tr>   
                                ";
                              }
                            }
                        }
                          mysqli_close($conn);
          ?>

        </table>
      </div>
    </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>