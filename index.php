<!doctype html> 
<html>
		<head>
				<title>Quality Survey</title>
				<link rel="stylesheet" type="text/css" href="surveyStyle.css">
		</head>
		<body>
			<?php
				$hostname = "localhost";
				$adminuser = "JustAKaydet";
				$adminpassword = 'example_pass';
				$dbname = "quality_eats_surveys";

				//Create Connection
				$conn = new mysqli($hostname, $adminuser, $adminpassword, $dbname);


				// Check Connection
				if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
				}


				//Submit a survey
				if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['surveySubmitButton']))
				{
					submitSurvey();
				}

				//Get information from fields, and submit survey
				function submitSurvey()
				{
					//Get connection from outside the scope
					global $conn;
					//Sets current date account created
					$timeStamp = date('Y-m-d H:i:s', time());

					//Declare Varibles to null
					$quality = $first_name = $last_name = $return_prob = $suggestions = "";
					
					$quality = $_POST["quality"];
					$first_name = test_input($_POST["firstname"]);
					$last_name = test_input($_POST["lastname"]);
					$return_prob = $_POST["rating"];
					$suggestions = test_input($_POST["user_suggestion"]);


					//PHP Prepared statments make it easy exuctuting SQL statements repeatedly with high efficiency
					$stmt = $conn->prepare("INSERT INTO surveys (quality, first_name, last_name, return_probability, suggestions, submitted)
					VALUES (?, ?, ?, ?, ?, ?)");
					$stmt->bind_param("isssss", $quality, $first_name, $last_name, $return_prob, $suggestions, $timeStamp);
					//$stmt stands for statement that could have been calle anything 

					$stmt->execute();
					//Close PHP prepared Statements
					$stmt->close();
					
					//Bring to Coupon page
					header("Location: http://localhost/survey/thank_you.html");
					die();

				}
			function test_input($data){
				//cleans inputs and returns
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			?>
			<h1>Thank you for eating at Quality Eats</h1>
			<form action = "index.php" method="post">
				Quality (between 1 and 5): <input type="number" name="quality" min="1" max="5" required><br><br>
	  		First name:
	  		<input type="text"  name="firstname" pattern="[A-Za-z]+" required><br><br>
			  Last name:
			  <input type="text" name="lastname" pattern="[A-Za-z]+" required>
			  
			  <!----RADIO BUTTONS---->
			  <h2>How likely are you to come back?</h2>
			  <input type="radio" id="notLikely" name="rating" value="Not Likely">
			  <label for="notlikely">Not Likely</label>
			  <br><br>
			  <input type="radio" id="likely" name="rating" value="Likely">
			  <label for="likely">Likely</label>
			  <br><br>
			  <input type="radio" id="verylikely" name="rating" value="Very Likely">
			  <label for="verylikely">Very Likely</label>
 			  <br><br>
			  <!---RADIO BUTTONS---->
			  
			  <!---SUGGESTIONS------>
				<h3>Please leave any suggestions below</h3>
				<textarea rows="4" cols="50" name="user_suggestion">
				
				</textarea>
			  <!---SUGGESTIONS------>
			   <br><br>
			   <input type="submit" value="Submit" name="surveySubmitButton">
			</form>
		</body>
</html>


<!--- https://s.codetasty.com/JustAKaydet/mysandbox/ --->