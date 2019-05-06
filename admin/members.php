<?php

	/*
	================================================
	== Manage Users Page
	== You Can Add | Delete Members From Here
	================================================
	*/

	    ob_start(); // Output Buffering Start

	    session_start();

	    $pageTitle = 'Users';

		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

		// Start Manage Page

		if ($do == 'Manage') { // Manage Members Page

			//$query = '';

			// Select All Users 

			$stmt = $con->prepare("SELECT * FROM users ORDER BY id ASC");

			// Execute The Statement

			$stmt->execute();

			// Assign To Variable

			$rows = $stmt->fetchAll();

			if (! empty($rows)) {

			?>

			<h1 class="text-center">Manage Users</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table manage-members text-center table table-bordered">
						<tr>
							<td>#ID</td>
							<td>Name</td>
							<td>Address</td>
							<td>Phone Number</td>
							<td>E-mail</td>
							<td>Password</td>
                            <td>Type</td>
							<td>Control</td>
						</tr>
						<?php
                            
							foreach($rows as $row) {
								echo "<tr>";
									echo "<td>" . $row['id'] . "</td>";
									echo "<td>" . $row['fname'] . "</td>";
									echo "<td>" . $row['address'] . "</td>";
								    echo "<td>" . $row['phonenum'] ."</td>";
									echo "<td><a href='members.php?do=send&email=" . $row['email'] . "' class='btn btn-lg btn-success btn-block'><i class='fa fa-edit'></i>" . $row['email'] . "</a></td>";
									echo "<td>" . $row['password'] . "</td>";
										echo "<td>" . $row['type'] ."</td>";
									echo "<td>
										<a href='members.php?do=Delete&id=" . $row['id'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>";

									echo "</td>";
								echo "</tr>";
							}
						?>
						<tr>
					</table>
				</div>
				<a href="members.php?do=Add" class="btn btn-primary" >
					<i class="fa fa-plus"></i> New User
				</a>
			</div>

			<?php } else {

				echo '<div class="container">';
					echo '<div class="nice-message">There\'s No Users To Show</div>';
					echo '<a href="members.php?do=Add" class="btn btn-primary">
							<i class="fa fa-plus"></i> New User
						</a>';
				echo '</div>';

			} ?>

		<?php

		} elseif ($do == 'Add') { // Add Page ?>

			<h1 class="text-center">Add New User</h1>
			<div class="container">
				<form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">
					<!-- Start Username Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label"> Name</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="firstname" class="form-control" autocomplete="off" required="required" placeholder="First Name To Login Into Shop" />
						</div>
					</div>
					<!-- End Username Field -->
					<!-- Start address Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Address</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="address" class="form-control" required="required" placeholder="Email Must Be Valid" />
						</div>
					</div>
					<!-- End address Field -->
					<!-- Start phonenum Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Phone Number</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="phonenum" class="password form-control" required="required" autocomplete="new-password" placeholder="Password Must Be Hard & Complex" />
							<i class="show-pass fa fa-eye fa-2x"></i>
						</div>
					</div>
                    <!-- Start phonenum Field -->
                    <!-- Start email Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">E-mail</label>
						<div class="col-sm-10 col-md-6">
							<input type="email" name="email" class="form-control" autocomplete="off" required="required" placeholder="Address To Login Into Shop" />
						</div>
					</div>
                    <!-- Start phonenum Field -->
                    <!-- Start password Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10 col-md-6">
							<input type="password" name="password" class="form-control" autocomplete="off" required="required" placeholder="City To Login Into Shop" />
						</div>
					</div>
                    <!-- Start password Field -->
                    <!-- Start type Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">User Type</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="type" class="form-control" autocomplete="off" required="required" placeholder="User Type To Login Into Shop" />
						</div>
					</div>
					<!-- End type Field -->
					<!-- Start Submit Field -->
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" value="Add User" class="btn btn-primary btn-lg" />
						</div>
					</div>
					<!-- End Submit Field -->
				</form>
			</div>

		<?php

		} elseif ($do == 'Insert') {

			// Insert Member Page

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				echo "<h1 class='text-center'>Insert User</h1>";
				echo "<div class='container'>";

				// Get Variables From The Form

				$fname 	= $_POST['firstname'];
				$address= $_POST['address'];
				$phonenum = $_POST['phonenum'];
				$email= $_POST['email'];
				$pass= md5($_POST['password']);
				$type 	= $_POST['type'];

				// Validate The Form

				$formErrors = array();

				if (empty($fname)) {
					$formErrors[] = 'Username Cant Be <strong>Empty</strong>';
				}

				if (empty($address)) {
					$formErrors[] = 'Address Cant Be <strong>Empty</strong>';
				}

				if (empty($phonenum)) {
					$formErrors[] = 'Phone Number Cant Be <strong>Empty</strong>';
				}

				if (empty($email)) {
					$formErrors[] = 'Email Cant Be <strong>Empty</strong>';
				}
                if (empty($pass)) {
					$formErrors[] = 'Password Cant Be <strong>Empty</strong>';
				}
                if (empty($type)) {
					$formErrors[] = 'Type Cant Be <strong>Empty</strong>';
				}
				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					// Check If User Exist in Database

					$check = checkItem("fname", "users", $user);

					if ($check == 1) {

						$theMsg = '<div class="alert alert-danger">Sorry This User Is Exist</div>';

						redirectHome($theMsg, 'back');

					} else {

						// Insert Userinfo In Database

						$stmt = $con->prepare("INSERT INTO
													users(fname, address, phonenum, email,password,type)
												VALUES(:zfname,:zaddress, :zphonenum, :zemail, :zpassword,:ztype) ");
						$stmt->execute(array(

							'zfname' 	=> $fname,
							'zaddress' 	=> $address,
							'zphonenum' => $phonenum,
							'zemail' 	=> $email,
							'zpassword'	=> $pass,
							'ztype'	=> $type

						));

						// Echo Success Message

						$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted</div>';

						redirectHome($theMsg, 'back');

					}

				}


			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

				echo "</div>";

			}

			echo "</div>";


		} 
         elseif ($do == 'send') { // send message page ?>
 
            <div class="contanier">
        <h1 class="text-center">Send Mails To Users</h1>
        <?php 
        if(isset($_POST['sendmail'])){
            
           if(mail($_POST['to'],$_POST['subject'],$_POST['message']))
            {
               echo "<center><strong>Mail Send Succsesfully</strong></center><br>";
            }
            else 
            {
                echo "<center><strong>Faild </strong></center><br>";
            }
        }
        
        ?>
 <center>
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="container">
        <div class="small-8">

          <div class="container">
            <div class="small-4 columns">
                    <label for="email">To Email:</label>
            </div>
            <div class="small-8 columns">
                   <input type="to" class="form-control" id="to" name="to" maxlength="50" value="<?PHP echo $_REQUEST['email'];?>">
              </div>
          </div>
            <div class="container">
            <div class="small-4 columns">
                    <label for="subject">Subject:</label>
            </div>
            <div class="small-8 columns">
                    <input type="txt" class="form-control" id="subject" name="subject" maxlength="50">
            </div>
          </div>
          <div class="container">
            <div class="small-4 columns">
                    <label for="name">Message:</label>
            </div>
            <div class="small-8 columns">
                   <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Your message here" maxlength="6000" rows="5"></textarea>
            </div>
          </div><br>
             <div class="container">
             <div class="small-8 columns">
                   <button type="submit" name="sendmail" class="btn btn-lg btn-success btn-block">Send E-mail</button>
            </div></div>
          </div>
        </div>
        </form></center>
           
<?php  }
    elseif ($do == 'Delete') { // Delete Member Page

			echo "<h1 class='text-center'>Delete User</h1>";
			echo "<div class='container'>";

				// Check If Get Request userid Is Numeric & Get The Integer Value Of It

				$userid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('id', 'users', $userid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("DELETE FROM users WHERE id = :zuser");

					$stmt->bindParam(":zuser", $userid);

					$stmt->execute();

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';

					redirectHome($theMsg, 'back');

				} else {

					$theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';

					redirectHome($theMsg);

				}

			echo '</div>';

		}

	ob_end_flush(); // Release The Output

?>
