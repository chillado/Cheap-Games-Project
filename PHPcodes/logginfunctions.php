<?php

function registration ($user,$email,$pwd,$dbh)
{

//Password gets hashed here before inserting
	$pwd = password_hash($pwd, PASSWORD_DEFAULT);

	$sqliquery ="INSERT INTO `Account` (`user`, `email`, `pwd`) VALUES ('$user','$email','$pwd')";

	mysqli_query($dbh,$sqliquery) or die(mysqli_error());

}
//Logging into the user requires us to compare password hashes. Fun shit yo
function loggin ($user,$pwd,$dbh)
{


}
//Checks if the user has a dupe or not
function Userduplicate($user,$email,$dbh)
{
	$usercheck= "SELECT * FROM `Account` WHERE account ='$user'";
	$emailcheck= "SELECT * FROM `Account` WHERE email = '$email'";
	$emailcount= mysqli_num_rows($emailcheck);
	$usercount= mysqli_num_rows($usercheck);

	if($emailcount>0 or $usercount>0)
	{
		return false;

	}
	return true;
}

?>
