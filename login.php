<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yappari Coffee Bar - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../css/nav.css">
</head>
<style>
  * {
   font-family: 'Inter', sans-serif;
}
</style>

<script>
  /*
  // JavaScript to handle login
  async function handleLogin(event) {
    event.preventDefault(); // Prevent default form submission

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (!username || !password) {
      alert("Please enter both username and password.");
      return;
    }

    try {
      const response = await fetch('/login', { // Replace '/login' with your backend route
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username, password }),
      });

      const result = await response.json();
      if (response.ok) {
        // Redirect to the user's dashboard or homepage
        window.location.href = result.redirectUrl; // Ensure backend sends the appropriate redirect URL
      } else {
        alert(result.message || 'Invalid credentials. Please try again.');
      }
    } catch (error) {
      console.error('Login error:', error);
      alert('An error occurred. Please try again later.');
    }
  }
  */
</script>

<body>

  
<?php
include("./connection/connection.php"); 
error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))  
{
	$username = $_POST['username'];  
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row)) 
								{
                                    	$_SESSION["user_id"] = $row['u_id']; 
                                      header("Location: ./useraccount/homeacc.php"); 

 
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!"; 
                                }
	 }
	
	
}
?>



  <div class="bg-[#1C359A] flex flex-col md:flex-row items-center justify-center min-h-screen">
    <!-- Left Section -->
    <div class="flex flex-col items-center justify-center w-1/3 md:w-1/2 text-white h-screen">
     
      <div class="flex flex-col items-center justify-center bg-blue-900 min-h-screen">
        <!-- First Image: Larger Image -->
        <div class="w-3/4 md:w-2/3">
          <img src="./img/YCB LOGO (CREAM) (1).png" alt="YCB Logo" class="w-full h-auto object-contain">
        </div>
      
        <!-- Second Image: Smaller Image -->
        <div class="w-2/3 md:w-1/2">
          <img src="./img/cafeviennaNobg.png" alt="Coffee and Croissant" class="w-full h-auto object-contain">
        </div>
      </div>
      
      
    </div>

    
    


    <!-- Right Section -->
    <div class="w-2/3 md:w-2/3 bg-white rounded-lg p-8 shadow-lg h-screen ">

      <div class="flex justify-between items-center px-4 py-2 text-gray-600 text-sm mb-6">
        <!-- Left Section: Return Home -->
        <a href="home.html" class="flex items-center hover:text-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
          </svg>
          Return Home
        </a>
      
        <!-- Right Section: Join Now -->
          <div>
          <span>Not a member yet?</span>
          <a href="registration.php" class="text-[#1C359A] font-bold hover:underline">JOIN NOW</a>
        </div>
      </div>
      
      <!--main content-->
      <div class="text-center">
        <h2 class="text-2xl font-bold text-[#1C359A]">WELCOME TO YAPPARI COFFEE BAR!</h2>
        <p class="mt-2 text-gray-600">"Log in now and enjoy fresh coffee delivered to your door!"</p>
      </div>

      <!--
      <form class="mt-6 flex items-center justify-center flex-col">
        <div class="mb-4">
          <label for="username" class="sr-only">Username</label>
          <input type="text" id="username" placeholder="Enter username"
            class="w-96 px-4 py-2 border border-[#1C359A] rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div class="mb-4 relative">
          <label for="password" class="sr-only">Password</label>
          <input type="password" id="password" placeholder="Enter password"
            class="w-96 px-4 py-2 border border-[#1C359A] rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
          <button type="button" class="absolute top-1/2 transform -translate-y-1/2 right-3 text-gray-600">Show</button>
        </div>

        <div class="flex items-center justify-between">
          <button type="submit"
            class="w-96 py-2 px-4 bg-[#1C359A] text-white font-bold rounded-lg hover:bg-blue-700 transition">LOGIN</button>
        </div>
      </form>
      -->

      
      <form method="post" class="mt-6 flex items-center justify-center flex-col" onsubmit="handleLogin(event)">
        <div class="mb-4">
          <label for="username" class="sr-only">Username</label>
          <input 
            type="text" 
            id="username" 
            name="username"
            placeholder="Enter username" 
            class="w-96 px-4 py-2 border border-[#1C359A] rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
    
        <div class="mb-4 relative">
          <label for="password" class="sr-only">Password</label>
          <input 
            type="password" 
            id="password" 
            name="password"
            placeholder="Enter password" 
            class="w-96 px-4 py-2 border border-[#1C359A] rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
          <button 
            type="button" 
            class="absolute top-1/2 transform -translate-y-1/2 right-3 text-gray-600"
            onclick="togglePasswordVisibility()">Show</button>
        </div>
    
        <div class="flex items-center justify-between">
          <button 
            type="submit" name="submit" value="Login" 
            class="w-96 py-2 px-4 bg-[#1C359A] text-white font-bold rounded-lg hover:bg-blue-700 transition">
            LOGIN
          </button>
        </div>
      </form>

      <div class="text-center mt-4">
        <a href="#" class="text-sm text-[#1C359A] hover:underline">Having issues with your password?</a>
      </div>

      <h1 class="text-sm text-gray-500 text-center mt-4">OR</h1>

      <div class="mt-4">
        <div class="flex items-center justify-between">
          <span class="w-1/5 border-b border-gray-300"></span>
          <span class="text-xl text-[#1C359A] font-black">Login with</span>
          <span class="w-1/5 border-b border-gray-300"></span>
        </div>
        <div class="text-center mt-4 flex items-center justify-center flex-col">
          <p class="text-gray-600 mb-2">"Your perfect brew is just a click away!"</p>
          <button type="button"
            class="flex items-center justify-center w-96 py-2 px-4 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
            <img src="https://www.freepik.com/free-photos-vectors/google-logo" alt="Google" class="mr-2"> Login with Google
          </button>
        </div>
      </div>

      <div class="text-center mt-6">
        <p class="text-sm text-gray-600">Not a member yet? <a href="registration.php" class="text-[#1C359A] hover:underline">Join
            Now</a></p>
      </div>
    </div>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script>
    // Toggle password visibility
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const isPasswordVisible = passwordInput.type === 'password';
      passwordInput.type = isPasswordVisible ? 'text' : 'password';
    }
  </script>
</body>

</html>