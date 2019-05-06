<?php

	/*
	================================================
	== Items Page
	================================================
	*/

	ob_start(); // Output Buffering Start

	session_start();

	$pageTitle = 'Products';

		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

		if ($do == 'Manage') {


			$stmt = $con->prepare("SELECT * FROM products");

			// Execute The Statement

			$stmt->execute();

			// Assign To Variable

			$items = $stmt->fetchAll();

			if (! empty($items)) {

			?>

			<h1 class="text-center">Manage Products</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table text-center table table-bordered">
						<tr>
							<td>#ID</td>
							<td>Product Name</td>
							<td>code</td>
							<td>Quantity</td>
							<td>Price</td>
                            <td>Image Path</td>
							<td>Control</td>
						</tr>
						<?php
							foreach($items as $item) {
								echo "<tr>";
									echo "<td>" . $item['id'] . "</td>";
									echo "<td>" . $item['product_name'] . "</td>";
									echo "<td>" . $item['product_code'] . "</td>";
									echo "<td>" . $item['qty'] . "</td>";
									echo "<td>" . $item['price'] . "</td>";
                                    echo "<td>" . $item['product_img_name'] . "</td>";
									echo "<td>
										<a href='items.php?do=Edit&id=" . $item['id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
										<a href='items.php?do=Delete&id=" . $item['id'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>";
									echo "</td>";
								echo "</tr>";
							}
						?>
						<tr>
					</table>
				</div>
				<a href="items.php?do=Add" class="btn btn-sm btn-primary">
					<i class="fa fa-plus"></i> New Product
				</a>
			</div>

			<?php } else {

				echo '<div class="container">';
					echo '<div class="nice-message">There\'s No Items To Show</div>';
					echo '<a href="items.php?do=Add" class="btn btn-sm btn-primary">
							<i class="fa fa-plus"></i> New Item
						</a>';
				echo '</div>';

			} ?>

		<?php

		} elseif ($do == 'Add') { ?>

			<h1 class="text-center">Add New Product</h1>
			<div class="container">
				<form class="form-horizontal" action="?do=Insert" method="POST">
					<!-- Start Name Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="name"
								class="form-control"
								required="required"
								placeholder="Name of The Item" />
						</div>
					</div>
					<!-- End Name Field -->
					<!-- Start Name Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">code</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="code"
								class="form-control"
								required="required"
								placeholder="code of The Item" />
						</div>
					</div>
					<!-- End Name Field -->
					<!-- Start Description Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="description"
								class="form-control"
								required="required"
								placeholder="Description of The Item" />
						</div>
					</div>
					<!-- End Description Field -->
					<!-- Start Price Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="price"
								class="form-control"
								required="required"
								placeholder="Price of The Product" />
						</div>
					</div>
						<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Quantity</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="number"
								name="quantity"
								class="form-control"
								required="required"
								placeholder="Quantity of The Product" />
						</div>
					</div>
					<!-- End Price Field -->
                         <div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Image Path</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="image"
								class="form-control"
								required="required"
								placeholder="Image of The Product" />
						</div>
					</div>

					<!-- Start Submit Field -->
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" value="Add Product" class="btn btn-primary btn-sm" />
						</div>
					</div>
					<!-- End Submit Field -->
				</form>
			</div>

			<?php

		} elseif ($do == 'Insert') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				echo "<h1 class='text-center'>Insert Product</h1>";
				echo "<div class='container'>";

				// Get Variables From The Form

				$name		= $_POST['name'];
				$code		= $_POST['code'];
				$desc 		= $_POST['description'];
				$price 		= $_POST['price'];
				$quantity 	= $_POST['quantity'];
                $image	= $_POST['image'];

				// Validate The Form

				$formErrors = array();

				if (empty($name)) {
					$formErrors[] = 'Name Can\'t be <strong>Empty</strong>';
				}

				if (empty($desc)) {
					$formErrors[] = 'Description Can\'t be <strong>Empty</strong>';
				}

				if (empty($price)) {
					$formErrors[] = 'Price Can\'t be <strong>Empty</strong>';
				}

				if (empty($quantity)) {
					$formErrors[] = 'Quantity Can\'t be <strong>Empty</strong>';
				}
                if (empty($image)) {
					$formErrors[] = 'Image Path Can\'t be <strong>Empty</strong>';
				}

				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					// Insert Userinfo In Database

					$stmt = $con->prepare("INSERT INTO

						products(product_name, product_code, product_desc, price, qty,product_img_name)

						VALUES(:zname, :zcode, :zdesc, :zprice, :zquantity,:zimage)");

					$stmt->execute(array(

						'zname' 	=> $name,
						'zcode'		=> $code,
						'zdesc' 	=> $desc,
						'zprice' 	=> $price,
						'zquantity' 	=> $quantity,
                        'zimage'       =>$image

					));

					// Echo Success Message

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted</div>';

					redirectHome($theMsg, 'back');

				}

			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

				echo "</div>";

			}

			echo "</div>";

		} elseif ($do == 'Edit') {

			// Check If Get Request item Is Numeric & Get Its Integer Value

			$itemid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

			// Select All Data Depend On This ID

			$stmt = $con->prepare("SELECT * FROM products WHERE id = ?");

			// Execute Query

			$stmt->execute(array($itemid));

			// Fetch The Data

			$item = $stmt->fetch();

			// The Row Count

			$count = $stmt->rowCount();

			// If There's Such ID Show The Form

			if ($count > 0) { ?>

				<h1 class="text-center">Edit Product</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST">
						<input type="hidden" name="itemid" value="<?php echo $itemid ?>" />
						<!-- Start Name Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="text"
									name="name"
									class="form-control"
									required="required"
									placeholder="Name of The Item"
									value="<?php echo $item['product_name'] ?>" />
							</div>
						</div>
						<!-- End Name Field -->
						<!-- Start Description Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Description</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="text"
									name="description"
									class="form-control"
									required="required"
									placeholder="Description of The Item"
									value="<?php echo $item['product_desc'] ?>" />
							</div>
						</div>
						<!-- End Description Field -->
						<!-- Start Price Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="text"
									name="price"
									class="form-control"
									required="required"
									placeholder="Price of The Item"
									value="<?php echo $item['price'] ?>" />
							</div>
						</div>
						<!-- End Price Field -->
                          <div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Image Path</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="text"
									name="image"
									class="form-control"
									required="required"
									placeholder="Image Path of The Item"
									value="<?php echo $item['product_img_name'] ?>" />
							</div>
						</div>
						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" value="Save Item" class="btn btn-primary btn-sm" />
							</div>
						</div>
						<!-- End Submit Field -->
					</form>



				</div>

			<?php

			// If There's No Such ID Show Error Message

			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Theres No Such ID</div>';

				redirectHome($theMsg);

				echo "</div>";

			}

		} elseif ($do == 'Update') {

			echo "<h1 class='text-center'>Update Item</h1>";
			echo "<div class='container'>";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				// Get Variables From The Form

				$id 		= $_POST['itemid'];
				$name 		= $_POST['name'];
				$desc 		= $_POST['description'];
				$price 		= $_POST['price'];
                $image 		= $_POST['image'];
				// Validate The Form

				$formErrors = array();

				if (empty($name)) {
					$formErrors[] = 'Name Can\'t be <strong>Empty</strong>';
				}

				if (empty($desc)) {
					$formErrors[] = 'Description Can\'t be <strong>Empty</strong>';
				}

				if (empty($price)) {
					$formErrors[] = 'Price Can\'t be <strong>Empty</strong>';
				}
                if (empty($image)) {
					$formErrors[] = 'Image Path Can\'t be <strong>Empty</strong>';
				}



				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					// Update The Database With This Info

					$stmt = $con->prepare("UPDATE
												products
											SET
												product_name = ?,
												product_desc = ?,
												price = ?,
                                                product_img_name=?
											WHERE
												id = ?");

					$stmt->execute(array($name, $desc, $price,$image, $id));

					// Echo Success Message

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

					redirectHome($theMsg, 'back');

				}

			} else {

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

			}

			echo "</div>";

		} elseif ($do == 'Delete') {

			echo "<h1 class='text-center'>Delete Product</h1>";
			echo "<div class='container'>";

				// Check If Get Request Item ID Is Numeric & Get The Integer Value Of It

				$itemid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('id', 'products', $itemid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("DELETE FROM products WHERE id = :zid");

					$stmt->bindParam(":zid", $itemid);

					$stmt->execute();

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';

					redirectHome($theMsg, 'back');

				} else {

					$theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';

					redirectHome($theMsg);

				}

			echo '</div>';

		}

		include $tpl . 'footer.php';

	ob_end_flush(); // Release The Output

?>
