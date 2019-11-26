<?php
session_start();
if(!isset($_SESSION['ologin']))
{
	header("location:portal.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>security solutions</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="text-transform:uppercase;" class="navbar-brand" href="../index.php">Security solutions</a>
            </div>
            <!-- Top Menu Items -->
			<!-- start processing php -->
			<!-- End processing php -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>ADMIN HOME<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="changecredentials.php"><i class="fa fa-fw fa-envelope"></i>Edit Profile</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="officerhome.php"><i class="glyphicon glyphicon-thumbs-up"></i> Admin Home</a>
                    </li>
					
					<li>
                        <a href="addsuspect.php"><i class="glyphicon glyphicon-thumbs-up"></i> Add Suspect</a>
                    </li>
					<li>
                        <a href="viewsuspect.php"><i class="glyphicon glyphicon-thumbs-up"></i> View Suspect(s)</a>
                    </li>
					
					<li>
                        <a href="viewoffences.php"><i class="glyphicon glyphicon-thumbs-down"></i> View Offence(s)</a>
                    </li>
					<li>
                        <a href="logout.php"><i class="glyphicon glyphicon-bullhorn"></i> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
						<p style="width:100%">
						<center>
						<fieldset>
						<legend><h1>admin modify login credentials results</h1></legend>
						<?php
						include"connection.php";
						$currentpassword=$_POST['currentpassword'];
						$currentusername=$_POST['currentusername'];
						$desiredpassword=$_POST['desiredpassword'];
						$desiredusername=$_POST['desiredusername'];
						if($currentpassword && $currentusername && $desiredpassword && $desiredusername)
						{
							$query=mysqli_query($con,"select * from login where username='$currentusername' && password='$currentpassword'");
							$ngapi=mysqli_num_rows($query);
							if($ngapi>0)
							{
								$update=mysqli_query($con,"update login set username='$desiredusername',password='$desiredpassword' where id='1'");
								if($update)
								{
									echo"<b style='color:green;'>Congratulations! you have successfully updated your username and password.Your new credentials are as follows:<br/>
									Username: <u>$desiredusername</u><br/>
									Password: <u>$desiredpassword</u><br/><br/>
									You can choose to:<br/>
									a. <a href='logout.php'>Logout from your portal</a><br/>
									b. <a href='officerhome.php'>Go to admin home page</a><br/>
									</b>
									";
								}
								else{
									echo"<b style='color:red;'>There was a technical error while updating your credentials<br/><a href='changecredentials.php'>Please Try Again</a></b>";
								}
							}
							else{
								echo"<b style='color:red;'>you have entered wrong current credentials<br/><a href='changecredentials.php'>Please Try Again</a></b>";
							}
						}
						else
						{
							header("location:changecredentials.php");
						}
						?>
						</fieldset>
						</center>
						<p>
                    </div>
                </div>
                <!-- /.row -->

            </div>
			<footer style="text-align:left;background-color:#000000;color:#FFFFFF;" class="navbar navbar-default navbar-fixed-bottom">
					<div style="text-align:center;" class="container-fluid">&copy; <?php echo date("Y");?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Design by <a href="" target="_blank">enosoft software solutions</a>.</div>
					</footer>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="jquery.js"></script>
	<script>
	
	</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
</body>

</html>
