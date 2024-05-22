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

        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">
            
             <li><a href="nomination.html"><span class="subFont"><strong>Nominations</strong></span></a></li>
            <li><a href="changePassword.php"><span class="subFont"><strong>Change Password</strong></span></a></li>
            <li><a href="users.php"><span class="subFont"><strong>Voters</strong></span></a></li> 
            <li><a href="feedbackReport.php"><span class="subFont"><strong>Feedback Report</strong></span></a></li> 
          
          </ul>
          
          
          <span class="normalFont"><a href="index.html" class="btn btn-danger navbar-right navbar-btn" style="border-radius:0%">Logout</a></span></button>
        </div>

      </div>
    </nav>

    <div class="container" style="padding:100px;">
      <div class="row">
        <div class="col-sm-12" style="border:2px outset gray;">
          
          <div class="page-header text-center">
            <h2 class="specialHead">ADMIN PANEL</h2>
            <p class="normalFont">Displaying all voting results</p>
          </div>
          
          <div class="col-sm-12">
            <?php
              require 'config.php';

              $TJ=0;
              $CB=0;
              $JP=0;
              $ME=0;
              $LP=0;

			  $JM=0;
			  $tj_tolentinovalue=0;
			  $cb_value=0;


              $conn = mysqli_connect($hostname, $username, $password, $database);
              if(!$conn)
              {
                echo "Error While Connecting.";
              }
              else
              {
// TJ TOLENTINO

                $sql ="SELECT * FROM tbl_users WHERE voted_for='TJ'";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                  while($row= mysqli_fetch_assoc($result))
                  {
                    if($row['voted_for'])
                      $tj_tolentinovalue++;
                  }
                  $tj_tolentinovalue= $tj_tolentinovalue*10;

                  echo "<strong>TJ Tolentino</strong><br>";
                  echo "
                  <div class='progress'>
                    <div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow=\"$tj_tolentinovalue\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$tj_tolentinovalue."%'>
                      <span class='sr-only'>TJ</span>
                    </div>
                  </div>
                  ";
                }

// CHRISTIAN BONIEL
                
                $sql ="SELECT * FROM tbl_users WHERE voted_for='CB'";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                  while($row= mysqli_fetch_assoc($result))
                  {
                    if($row['voted_for'])
                      $CB++;
                  }


                  $cb_value= $CB*10;

                  echo "<strong>Christian Boniel</strong><br>";
                  echo "
                  <div class='progress'>
                    <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$cb_value."%'>
                      <span class='sr-only'>CB</span>
                    </div>
                  </div>
                  ";
                }


// MARK ECHAVEZ
           $sql ="SELECT * FROM tbl_users WHERE voted_for='ME'";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                  while($row= mysqli_fetch_assoc($result))
                  {
                    if($row['voted_for'])
                      $ME++;
                  }


                  $me_value= $ME*10;

                  echo "<strong>Mark Echavez</strong><br>";
                  echo "
                  <div class='progress'>
                    <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$me_value."%'>
                      <span class='sr-only'>ME</span>
                    </div>
                  </div>
                  ";
                }

     
                
// JOHN RHOMELL POLLOSO
				
				
                $sql ="SELECT * FROM tbl_users WHERE voted_for='JP'";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                  while($row= mysqli_fetch_assoc($result))
                  {
                    if($row['voted_for'])
                      $JP++;
                  }


                  $jp_value= $JP*10;

                  echo "<strong>John Rhomell Polloso</strong><br>";
                  echo "
                  <div class='progress'>
                    <div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$jp_value."%'>
                      <span class='sr-only'>JP</span>
                    </div>
                  </div>
                  ";
                }

 // LOUIE JAY PRADILLA               
              
                $sql ="SELECT * FROM tbl_users WHERE voted_for='LP'";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                  while($row= mysqli_fetch_assoc($result))
                  {
                    if($row['voted_for'])
                      $LP++;
                  }


                  $lp_value= $LP*10;

                  echo "<strong>Louie Jay Pradilla</strong><br>";
                  echo "
                  <div class='progress'>
                    <div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$lp_value."%'>
                      <span class='sr-only'>LP</span>
                    </div>
                  </div>
                  ";
                }

               echo "<hr>";

                $total=0;

                // Total
                $sql ="SELECT * FROM tbl_users";
                $result= mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                  while($row= mysqli_fetch_assoc($result))
                  {
                    if($row['voted_for'])
                      $total++;
                  }


                  $tptal= $total*10;

                  
                  echo "
                  <div class='text-primary text-center'>
                    <h3 class='normalFont'>TOTAL VOTES : $total </h3>
                  </div>
                  ";
                }

              }
            ?>
          </div>

        </div>
      </div>
    </div>
  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
