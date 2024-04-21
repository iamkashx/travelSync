<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus";
@$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	?>
	<script type="text/javascript">
		alert("It seems like you aint connected to the database")
	</script>
	<?php
    die("Connection to the database failed: " . mysqli_connect_error());
}
?> 