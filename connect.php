<?php
if(isset($_POST['submit'])){
$email=$_POST['email'];
if (!empty($email)) {
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="store_mail";

	//create connection
	$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if (mysqli_connect_error()) {
		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	}else{
		$SELECT="SELECT email FROM tb_mail WHERE email=? Limit 1";
		$INSERT="INSERT into tb_mail(email) values(?)";
		$CLEAR ="SET @num:=0; UPDATE tb_mail SET id=@num:=(@num+1); ALTER TABLE tb_mail AUTO_INCREMENT=1";
		//Prepare statement
		$stmt=$conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum=$stmt->num_rows;

		if ($rnum==0) {
			$stmt->close();
			$stmt=$conn->prepare($INSERT);
			$stmt->bind_param("s",$email);
			$stmt->execute();
			echo'<script>alert("Your data saved.")</script>';
		}else{
			echo'<script>alert("Someone already used.")</script>';
		}
	}
}else{
	echo'<script>alert("All field are required.")</script>';
	die();
}
}
?>

<script src="sweetalert.min.js"></script>