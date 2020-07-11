<?php

	include('inc/dbconfig.php');
	$search = '';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$search = $_POST['search'];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<title>Advance Search</title>
</head>
<body>
	<div class="wr">
		<h1>Advance Serach Using PHP</h1>
		<div class="leftSide">
			<div class="list-group">
			  <button type="button" class="list-group-item list-group-item-action active">
			    Lorem ipsum dolor sit amet
			  </button>
			  <button type="button" class="list-group-item list-group-item-action">Lorem ipsum dolor sit amet</button>
			  <button type="button" class="list-group-item list-group-item-action">Lorem ipsum dolor sit amet</button>
			  <button type="button" class="list-group-item list-group-item-action">Lorem ipsum dolor sit amet</button>
			  <button type="button" class="list-group-item list-group-item-action" disabled>Lorem ipsum dolor sit amet</button>
			</div>
		</div>
		<div class="rightSide">
			<div class="list-group">
			  <button type="button" class="list-group-item list-group-item-action active">
			    Lorem ipsum dolor sit amet
			  </button>
			  <button type="button" class="list-group-item list-group-item-action">Lorem ipsum dolor sit amet</button>
			  <button type="button" class="list-group-item list-group-item-action">Lorem ipsum dolor sit amet</button>
			  <button type="button" class="list-group-item list-group-item-action">Lorem ipsum dolor sit amet</button>
			  <button type="button" class="list-group-item list-group-item-action" disabled>Lorem ipsum dolor sit amet</button>
			</div>
		</div>
		<div class="content">

			<div class="bookSearch">
				<h3>Search Books</h3>
				<div class="col-md-12 col-sm-12 searchForm">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="serachbox">
							<input class="srcField" type="text" name="search" placeholder="Search....." value="<?php echo $search; ?>">
						</div>
					
						<div class="col-md-6" style="float:left;">
							<select id="lang" style="margin:5px;" name="language" id="language">
							  <option value="0">Select Language</option>
								<?php
									$sql = "SELECT * FROM language ORDER BY name ASC";
									$result = $conn->query($sql);

									if($result->num_rows > 0){
										while($row = $result->fetch_assoc()){
											echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
										}
									}
								?>
							</select>

							
							<select id="lang" style="margin:5px;">
							  <option value="0">Select Category</option>
								<?php
									$sql = "SELECT * FROM category ORDER BY name ASC";
									$result = $conn->query($sql);

									if($result->num_rows > 0){
										while($row = $result->fetch_assoc()){
											echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
										}
									}
								?>
							</select>
							<select id="lang" style="margin:5px;">
							  <option value="0">Select Location</option>
								<?php
									$sql = "SELECT * FROM location ORDER BY name ASC";
									$result = $conn->query($sql);
									
									if($result->num_rows > 0){
										while($row = $result->fetch_assoc()){
											echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
										}
									}
								?>
							</select>
						</div>
						<div class="col-md-6" style="float:right;">
							<select id="lang" style="margin:5px;">
							  <option value="0">Select Year</option>
								<?php
									$sql = "SELECT DISTINCT YEAR(date_relise) AS year FROM books ORDER BY date_relise DESC";				
									$result = $conn->query($sql);
									
									if($result->num_rows > 0){
										while($row = $result->fetch_assoc()){
											echo '<option value="'.$row['year'].'">'.$row['year'].'</option>';
										}
									}
								?>
							</select>
							<select id="lang" style="margin:5px;">
							  <option value="0">Select Author</option>
								<?php
									$sql = "SELECT * FROM authores ORDER BY name ASC";
									$result = $conn->query($sql);
									
									if($result->num_rows > 0){
										while($row = $result->fetch_assoc()){
											echo '<option value="'.$row['id'].'">'.$row['name'].' </option>';
										}
									}
								?>
							</select>
							<div class="cover">
								  <p style="margin-bottom:5px;">Select Cover:</p>
								  <?php
								  	$sql = "SELECT * FROM cover ORDER BY name ASC";
								  	$result = $conn->query($sql);

								  	if($result->num_rows > 0){
								  		while($row = $result->fetch_assoc()){
								  			echo '<input type="radio" id="other" name="cover" value="'.$row['id'].'" style="margin-left:10px;">';
								  			echo '<label for="'.$row['name'].'" style="margin-left:4px;">'.$row['name'].'</label>';
								  		}
								  	}
								  ?>
							</div>
						</div>
						<input id="submitBtn" type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
	</div>
	<div style="width:90%; margin:auto">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Book Title</th>
		      <th scope="col">Category</th>
		      <th scope="col">Authores</th>
		      <th scope="col">Price</th>
		      <th scope="col">Year</th>
		    </tr>
		  </thead>
		  <tbody>

	      <?php
		    $sql = "SELECT * FROM books 
		      		INNER JOIN category ON books.category = category.id 
		      		INNER JOIN authores ON books.id = authores.id";
	  		$result = $conn->query($sql);

	  		if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
	  				echo 
	  				'<tr>
				      <td>'.$row['title'].'</td>
				      <td>'.$row['name'].'</td>
				      <td>'.$row['auth_name'].'</td>
				      <td>'.$row['price'].'</td>
				      <td>'.$row['date_relise'].'</td>
				    </tr>';
	  			}
	  		}
	  	  ?>
		    
		    
		  </tbody>
		</table>
	</div>
	<div class="footer">
		<div class="final">
			<p>All Right Group</p>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>