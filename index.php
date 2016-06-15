<!DOCTYPE html>
<html>
	<head>
		<title>HackRU - Worker</title>
		 <meta charset="UTF-8">

		<!-- BOOTSTRAP -->
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS\style.css">

		<!-- ANGULARJS -->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.10/angular.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.10/angular-ui-router.js"></script>
		<script src="app.js"></script>
	</head>

   <body>
      <?php
         if(isset($_POST['add']))
         {
            $dbhost = 'www.db4free.net';
			$dbuser = 'monmon_2007';
			$dbpass = 'marina_zoom';
			$dbname = 'mina';
            $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // Create connection
            if(! $conn )
            {
               die('Could not connect: ' . mysql_error());
            }
            if(! get_magic_quotes_gpc() )
            {
               $emp_name = addslashes ($_POST['emp_name']);
               $emp_address = addslashes ($_POST['emp_address']);
               $emp_address1 = addslashes ($_POST['emp_address1']);
               $emp_address2 = addslashes ($_POST['emp_address2']);
               $emp_address3 = addslashes ($_POST['emp_address3']);
               $emp_address0 = addslashes ($_POST['emp_address0']);
               $expl = addslashes ($_POST['expl']);
               $cause = addslashes ($_POST['cause']);
            }
            else
            {
               $emp_name = $_POST['emp_name'];
               $emp_address = $_POST['emp_address'];
            }
            $sql ="INSERT INTO info (first, last, adress, city, state, zip,issuesel,why)
			VALUES ('$emp_name', '$emp_address', '$emp_address0', '$emp_address1', '$emp_address2', '$emp_address3', '$expl', '$cause')";
            $retval = $conn->query($sql);
            if(! $retval )
            {
               die('Could not enter data: ' . $conn->connect_error);
            }
				header("Location: http://www.google.com");
            //echo "Entered data successfully\n";
            $conn->close();
         }
         else
         {
            ?>

<!-- HTML CODE STARTS HERE -->
            <div class="col-md-6 col-md-offset-3">
		<div class="page-header">
				<h1>Client Form</h1>
		</div>

		<div class="row col-md-offset-0">
			Please enter your information to place your job.
			<br /><br />
		</div>

		<form ng-submit="addOffer()" method = "post" action = "<?php $_PHP_SELF ?>">

		<!-- FIRST AND LAST NAME -->
		<div class="row">
			<div class="col-md-6">
				<input type="text" input name="emp_name" class="form-control" placeholder="First Name" ng-model="first" id = "emp_name"/>
			</div>

			<div class="col-md-6">
				<input type="text" input name="emp_address" class="form-control" placeholder="Last Name" ng-model="last" id = "emp_address" />
			</div>
		</div>

		<!-- ADDRESS -->
			<div class="row">
				<div class="col-md-5">
					<span style="margin-top: 20px; margin-bottom: 10px; display: block;">Address:</span>
					<input type="text" input name="emp_address0" class="form-control" placeholder="Street Address" ng-model="street" id = "emp_address0" />
				</div>

					<div class="col-md-3" style="margin-top:50px;">
					<input type="text" input name="emp_address1" class="form-control" placeholder="City" ng-model="city" id = "emp_address1" />
				</div>

				<div class="col-md-2" style="margin-top:50px;">
					<input type="text" input name="emp_address2" class="form-control" placeholder="State" ng-model="state" id = "emp_address2" />
				</div>

				<div class="col-md-2" style="margin-top:50px;">
					<input type="text"  input name="emp_address3" class="form-control" placeholder="Zip Code" ng-model="zip" id = "emp_address3" />
				</div>
			</div>

			        <div class="row">
			          <div class="col-md-5 " style="margin-top:30px;">
			            <p>Choose one from the following:</p>
			          <select input name="expl" id="expl">

			            <option type="text" class="form-control" placeholder="None" ng-model="none" />Select From the folowing</option>
			            <option type="text" class="form-control" placeholder="HouseWare" ng-model="house" />HouseWare</option>
			            <option type="text" class="form-control" placeholder="Car Problem" ng-model="car" />Car Problem</option>
			            <option type="text" class="form-control" placeholder="Technology" ng-model="tech" />Technology</option>
			            <option type="text" class="form-control" placeholder="Other" ng-model="other" />Other</option>

			          </select>
			        </div>
			        </div>

						<div class="row">
							<div class="col-md-12">
								<span style="margin-top: 20px; margin-bottom: 10px; display: block;">Problem Description:</span>
								<textarea class="form-control" rows="5" id="cause" input name="cause"></textarea>
							</div>
						</div>

			      <div class="row">
			      				<div class="col-md-2" style="margin-top: 20px;">
			      					<button type="submit" name = "add" class="btn btn-primary" id = "add"
                              value = "Submit" ng-click="submit">Submit Offer </button>
			      				</div>
			      				<div class="col-md-3" style="margin-top: 20px;">
			      					<button type="reset" class="btn btn-primary" ng-click="clear">Clear Form</button>
			      				</div>
			      			</div>

							</form>


		</div>

            <?php
         }
      ?>

   </body>
</html>
