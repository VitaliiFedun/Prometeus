

<!# todo	egister.php in public >

<?php
 	//configuration
	require("../includes/config.php");
//if user reached page via GET (link clicked or redirect)
	if ($_SERVER["REQUEST_METHOD"]=="GET")
	{
         render("register_form.php",["title"=>"Register"]);  
	}
	else
	  if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
//todo	
	$username=$_POST["username"];
	$email=$_POST["email"];
    
	$pass= $_POST["password"];
	$confirm = $_POST["confirmation"];

       If($email == null) 
	{
        apologize("Your e-mail do not empty!"); 
        }



       If(($pass== null) or ($confirm == null))
	{
        apologize("Password do not empty!"); 
        }

       If ($pass != $confirm)
	{
        apologize("Password do not match!"); 
        }

	$result = query("SELECT * FROM users WHERE username ='?'", $username );
	// if name is original then result=false
//	echo count($result);

	if (!($result === false))
	{
        apologize("Name '".$username. "' already exists"); 
        }

	$result = query("SELECT * FROM users WHERE email ='?'", $email );
	// if email is original then result=false
//	echo count($result);

	if (!($result === false))
	{
        apologize("Email '".$email. "' already exists"); 
        }




	$rez_insert =  query("INSERT INTO users (username, hash, email, cash) VALUES (?,?,?,?)", $username, crypt($pass),$email, 10000.00);

	if ($rez_insert === false)
	{
       	 apologize("Process register is failed!"); 
        }
	
	//	echo 'Suscess!';
	
	$result = query("SELECT LAST_INSERT_ID() AS id");
	if (count($result) == 1)
	{
        $id = $result[0]["id"]; 
	$_SESSION["id"] = $id;
	redirect("/");
        }
}
?>


