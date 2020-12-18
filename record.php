<?php

include_once('config.php');
$e_fun = new Eventfunction();
$counter = 1;

if(isset($_POST['keyword']) && !empty(trim($_POST['keyword']))){

	$keyword = $e_fun->htmlvalidation($_POST['keyword']);

	$match_field['name'] = $keyword;
	$match_field['location'] = $keyword;
	$select = $e_fun->search("events", $match_field, "OR");

}
else{

	$select = $e_fun->select("events");

}


?>

				<table class="table" style="vertical-align: middle; text-align: center;">
				  <thead class="thead-dark">
					<tr>
					  	<th scope="col">#</th>
					  	<th scope="col">Name</th>
					  	<th scope="col">Location</th>
						<th scope="col">Category</th>
					  	<th scope="col">Organizer</th>
						<th scope="col">Date</th>
						<th scope="col">Action</th>
					</tr>
				  </thead>
				  <tdatey>
				  	<?php if($select){ foreach($select as $se_data){ ?>
					<tr>
					  <th scope="row"><?php echo $counter; $counter++; ?></th>
					  	<td><?php echo $se_data['name']; ?></td>
					  	<td><?php echo $se_data['location']; ?></td>
					  	<td><?php echo $se_data['category']; ?></td>
						<td><?php echo $se_data['organizer']; ?></td>
						<td><?php echo $se_data['date']; ?></td>
						<td>
							<button type="button" class="btn btn-danger editdata" data-dataid="<?php echo $se_data['id']; ?>" data-toggle="modal" data-target="#updateModalCenter">Update</button>
							<button type="button" class="btn btn-danger deletedata" data-dataid="<?php echo $se_data['id']; ?>" data-toggle="modal" data-target="#deleteModalCenter">Delete</button>
						</td>
					</tr>
					<?php }}else{ echo "<tr><td colspan='7'><h2>No Result Found</h2></td></tr>"; } ?>
				  </tdatey>
				</table>	