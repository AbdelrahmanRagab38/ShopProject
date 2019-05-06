<?php

	/*
	================================================
	== Manage Users Page
	== You Can Add | Delete Members From Here
	================================================
	*/

	    ob_start(); // Output Buffering Start

	    session_start();

	    $pageTitle = 'orders';

		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

		// Start Manage Page

		if ($do == 'Manage') { // Manage Members Page

			//$query = '';

			// Select All Users 

			$stmt = $con->prepare("SELECT * FROM orders ORDER BY id ASC");

			// Execute The Statement

			$stmt->execute();

			// Assign To Variable

			$rows = $stmt->fetchAll();

			if (! empty($rows)) {

			?>
      

			<h1 class="text-center">Manage Orders</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table manage-order text-center table table-bordered">
						<tr>
				            <td>#ID</td>
							<td>Products Code</td>
							<td>Products Name</td>
							<td>Products Descreption</td>
							<td>Price</td>
							<td>Units</td>
                            <td>Total Price</td>
							<td>Date</td>
                            <td>Username</td>
                            <td>Control</td>
						</tr>
						<?php
								foreach($rows as $row) {
								echo "<tr>";
									echo "<td>" . $row['id'] . "</td>";
									echo "<td>" . $row['product_code'] . "</td>";
									echo "<td>" . $row['product_name'] . "</td>";
								    echo "<td>" . $row['product_desc'] ."</td>";
									echo "<td>" . $row['price'] . "</td>";
									echo "<td>" . $row['units'] . "</td>";
								    echo "<td>" . $row['total'] ."</td>";
                                    echo "<td>" . $row['date'] ."</td>";
                                    echo "<td>" . $row['email'] ."</td>";
									echo "<td>
										<a href='order.php?do=Delete&id=" . $row['id'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>";
									echo "</td>";
								echo "</tr>";
							}
						?>
						<tr>
					</table>
				</div>
                  <a href='pdfreport.php' class='btn btn-success'><i class='fa fa-edit'></i> Report </a>
			</div>

			<?php } else {

				echo '<div class="container">';
					echo '<div class="nice-message">There\'s No Users To Show</div>';
					echo '<a href="order.php?do=send" class="btn btn-primary">
							<i class="fa fa-plus"></i> New User
						</a>';
				echo '</div>';

			} ?>

		<?php

		} elseif ($do == 'send') { // send message page ?>
 
             <div class="contanier">
        <h1 class="text-center">Orders Confirmation Mails</h1>
        <?php 
        if(isset($_POST['sendmail'])){
            
           if(mail($_POST['email'],$_POST['subject'],$_POST['message']))
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
                    <input type="email" class="form-control" id="email" name="email" maxlength="50">
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

		<?php

		} elseif ($do == 'Delete') { // Delete order Page

			echo "<h1 class='text-center'>Delete Order</h1>";
			echo "<div class='container'>";

				// Check If Get Request userid Is Numeric & Get The Integer Value Of It

				$userid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('id', 'orders', $userid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("DELETE FROM orders WHERE id = :zuser");

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
