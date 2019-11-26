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
					<li class="active">
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
						<p style="width:100%;">
						<?php
						$suspectid=$_POST['suspectid'];
						if(!isset($suspectid))
						{
							header("location:viewsuspect.php");
						}
						include"connection.php";
						$suspectquery=mysqli_query($con,"select * from details where id='$suspectid'");
						$ngapi=mysqli_num_rows($suspectquery);
						if($ngapi<1)
						{
							header("location:viewsuspect.php");
						}
						else
						{
							$data=mysqli_fetch_array($suspectquery);
						}
						?>
						<center>
						<form action="editsuspectconfirm.php" method="post">
						<fieldset style="width:80%;">
						<legend><h1>Edit Suspect Details for <?php echo $data['fullname'];?></h1></legend>
						<p>
						<legend>Basic Suspect Details</legend>
						<form action="addsuspectconfirm.php" method="post">
						<input type="hidden" value="<?php echo $suspectid; ?>" name="suspectid"/>
						enter your full name<br/>
						<input style="width:60%;text-align:center;" type="text" name="fullname" value="<?php echo $data['fullname'];?>" placeholder="current value: <?php echo $data['fullname'];?>" required/><br/>
						enter your phone number<br/>
						<input style="width:60%;text-align:center;" type="text" name="phonenumber" value="<?php echo $data['phonenumber'];?>" placeholder="current value: <?php echo $data['phonenumber'];?>" required/><br/>
						enter your nationality goes here<br/>
						<input style="width:60%;text-align:center;" type="text" name="nationality" value="<?php echo $data['nationality'];?>" placeholder="current value: <?php echo $data['nationality'];?>" required/><br/>
						Select suspect identifier<br/>
						<select id="identifier" style="width:60%;text-align:center;"  name="suspectidentifier" required>
						<?php
						$identifier=$data['identifier'];
						if($identifier=="Kenyan National Id")
						{
							echo"<option>Kenyan National Id</option>";
							echo"<option>International Passport</option>";
						}
						else
						{
							echo"<option>International Passport</option>";
							echo"<option>Kenyan National Id</option>";
						}
						?>
						</select><br/>
						Enter your identifier number<br>
						<input style="width:60%;text-align:center;" type="text" name="identifierno" value="<?php echo $data['identifiernumber'];?>" placeholder="current value: <?php echo $data['identifiernumber'];?>" required/><br/><br/>
						<input style="width:30%;text-align:center;background-color:green;color:white;" type="submit" value="Update Suspect"/>&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:20%;text-align:center;background-color:grey;color:white;" type="button" value="Reset"/>
						</form>
						</fieldset>
						</p>
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
