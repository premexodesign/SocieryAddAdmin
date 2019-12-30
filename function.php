

<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'societyadda');
//$db = mysqli_connect('www.qikchef.com', 'helpingdata', 'Chandan@18', 'qikchef');
	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 

    $_data=$_POST['reg'];
   // echo $_data;
	if($_data=='registartion')
	{
	register();
	}
	else if($_data=='customer')
	{
	customerRegistraion();
	}
	else if($_data=='chefRegistration')
	{
	chefRegistration();
	}
	else if($_data=='verify')
	{
		echo 'verify';
		userVerify();
	}
	else if($_data=='Recipe')
	{
    addRecipe();
	}
	else if($d_data=='orders')
	{
		//echo 'order details';
		addOrders();
	}
	else
	{
	login();
	}
	
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: /login.php");
	}


	

	// REGISTER USER
	function register()
	{
		global $db, $errors;

		// receive all input values from the form
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password']);
		//$password_2  =  e($_POST['cpassword']);
		$usertype  =  e($_POST['usertype']);
		
		
		$contact       =  e($_POST['contact']);
		$address  =  e($_POST['address']);
		//$country  =  e($_POST['country']);
		

		$status='approved';

		date_default_timezone_set("America/New_York");
      	$doj= date("Y-M-D");
		$state  =  e($_POST['state']);
		$image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
		 move_uploaded_file($image_tmp,"images/$image");

		// form validation: ensure that the form is correctly filled
		if (empty($usertype)) 
			{ 
			array_push($errors, "User type is required"); 
			}
		
		if (empty($username)) 
			{ 
			array_push($errors, "Username is required"); 
			}
		if (empty($email)) 
			{ 
			array_push($errors, "Email is required"); 
			}
		if (empty($password_1)) 
			{ 
			array_push($errors, "Password is required"); 
			}
		
		
			$query = "SELECT * FROM users WHERE email='$email' ";
			echo $query;
			$results = mysqli_query($db, $query);
			header('location: index.php');	

			if (mysqli_num_rows($results) == 1) 
				{
			

				}
			else
				{
				

				$query = "INSERT INTO registration (username, email, user_type,contactno,address,password,profile_pics,doj) 
						  VALUES('$username', '$email', '$usertype','$contact','$address','$password_1','$image',NOW())";
				mysqli_query($db, $query);
               // echo $query;
				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);
				$_SESSION['username']=$email;
			/*	$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
				
				$_SESSION['usertype']=$usertype;
			
				
					$_SESSION['code']=$id;
					*/
					//$codequery="insert into chefverification(email,code) values('$email','$id')";
				//	mysqli_query($db, $codequery);
           
					//header('location: welcome.php');	
					
					header('location: dashboard.php');
				}
				/*else
				{
				header('location: dashboardchart.php');	
				}
				*/		
				
			

		
	}

	// return user array from their id
	function getUserById($id)
	{
			global $db;
			$query = "SELECT * FROM users WHERE id=" . $id;
			$result = mysqli_query($db, $query);

			$user = mysqli_fetch_assoc($result);
			return $user;
	}

//verify code

	function userVerify()
		{
			global $db, $errors;
			$usercode    =  $_POST['usercode'];
		
			$cquery = "SELECT * FROM chefverification WHERE code='$usercode' ";
			echo $cquery;
			$cresults = mysqli_query($db, $cquery);
			
				if ($row2=mysqli_fetch_row($cresults) ) 
					{
					header('location: dashboard.php');
				
					}

			
			
		
	}

	// LOGIN USER
function login()
 {
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);
	    $_SESSION['username']=$username;
		
		
		// make sure form is filled properly
		if (empty($username)) 
			{
			array_push($errors, "Username is required");
			}
		if (empty($password)) 
			{
			array_push($errors, "Password is required");
			}

		
		$query = "SELECT * FROM registration WHERE email='$username' AND password='$password' ";
			
			echo $query;
		
	if ($result=mysqli_query($db,$query))
 	 {
  // Fetch one and one row
 		 if ($row=mysqli_fetch_row($result))
  		 {
			
			$_SESSION['username']=$username;
					
		//	$_SESSION['usertype']=$row[7];
			header('location: dashboard.php');
		 }
		else
		{
		header('location: index.php');
		}
			
			
	}
}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) 
		{
			return true;
		}else
		{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' )
		 {
			return true;
		}else
		{
			return false;
		}
	}

	// escape string
	function e($val)
	{
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() 
	{
		global $errors;

		if (count($errors) > 0)
		{
			echo '<div class="error">';
				foreach ($errors as $error)
				{
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
	
	
	function customerRegistraion()
	{
		global $db, $errors;

		// receive all input values from the form
		$username    =  e($_POST['name']);
		$email       =  e($_POST['email']);
		$contactno  =  e($_POST['contactno']);
		
		$address  =  e($_POST['address']);
		$country  =  e($_POST['country']);
		$city  =  e($_POST['city']);
		
	
		// form validation: ensure that the form is correctly filled
		
		if (empty($username)) 
		{ 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) 
		{ 
			array_push($errors, "Email is required"); 
		}
	
		
		$query = "SELECT * FROM customer WHERE email='$email' ";
			echo $query;
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) 
			{
			$_SESSION['status']=1;
			header('location: addCustomer.php');	
			}
			

				$query = "INSERT INTO customer (name, email,contactno,address,country,city) 
						  VALUES('$username', '$email','$contactno','$address','$country','$city')";
				mysqli_query($db, $query);
              
			header('location: viewCustomer.php');	
			
	}


function addRecipe()
	{
		global $db, $errors;

		// receive all input values from the form
		$rname    =  e($_POST['rname']);
		$yoe       =  e($_POST['yoe']);
		
		$category    =  e($_POST['category']);
		$subcategory       =  e($_POST['subcategory']);
		$recipecharge       =  e($_POST['recipecharge']);
      	$doj= date("Y-M-D");
	
		$image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
		 move_uploaded_file($image_tmp,"images/$image");
        $chefname=$_SESSION['username'];
		$query = "INSERT INTO recipe (Recipe_name, y_o_exp, chef_name,r_images,dateofrecipe,category,subcategory,charge) 
						  VALUES('$rname', '$yoe', '$chefname','$image',NOW(),'$category','$subcategory','$recipecharge')";
	   // echo $query;
		mysqli_query($db, $query);
               
		$logged_in_user_id = mysqli_insert_id($db);

	/*	$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
		$_SESSION['success']  = "You are now logged in";
		$_SESSION['username']=$username;
		$_SESSION['usertype']=$usertype;
		*/
			
			header('location: recipedetails.php');		
		
		
	}


	function addOrders()
	{
		global $db, $errors;

		// receive all input values from the form
		$o_number    =  e($_POST['o_number']);
		$c_name       =  e($_POST['c_name']);
		$odate  =  e($_POST['odate']);
		
		$dishes_order  =  e($_POST['dishes_order']);
		$quantity  =  e($_POST['quantity']);
		$o_status  =  e($_POST['o_status']);
		$chefname=$_SESSION['username'];
	
		// form validation: ensure that the form is correctly filled
		
	/*	if (empty($username)) 
		{ 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) 
		{ 
			array_push($errors, "Email is required"); 
		}
	
		
		$query = "SELECT * FROM customer WHERE email='$email' ";
			echo $query;
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) 
			{
			$_SESSION['status']=1;
			header('location: addCustomer.php');	
			}
			*/
			$query="insert into orderdetails(orderid,customername,chefname,orderdate,orderdishes,quantity,orderstatus) values('$o_number','$c_name','$chefname','$odate','$dishes_order','$quantity','$o_status')";

			echo $query;	
			mysqli_query($db, $query);
              
			header('location: orderdetails.php');	
			
	}






?>