<html>
<title>List of suspects</title>
<body onload="print()">
						<p style="width:100%;text-align:left;">
						<center><u style="font-size:1.5em;text-transform:uppercase;cursor:hand;"><a style="color:black;text-decoration:bold;" href="viewsuspect.php">Suspect Report</a></u></center>
						<?php
						include"connection.php";
						$query=mysqli_query($con,"select * from details");
						$num=mysqli_num_rows($query);
						if($num>0)
						{
							echo"<table style='width:100%;text-align:left;' border='0'>
							<tr>
								<th>Full Name</th>
								<th>Phonenumber</th>
								<th>Nationality</th>
								<th>Identifier</th>
								<th>Identifier Number</th>
							</tr>
							";
							while($data=mysqli_fetch_array($query))
							{
								$identi=$data['id'];
								echo"
								<tr>
									<td>".$data['fullname']."</td>
									<td>".$data['phonenumber']."</td>
									<td>".$data['nationality']."</td>
									<td>".$data['identifier']."</td>
									<td>".$data['identifiernumber']."</td>
								</tr>
								";
							}
							echo"</table>";
						}
						else
						{
							echo"there are no records in the database for now";
						}
						?>
						<p>
</body>
</html>