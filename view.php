<form method="get" action="<?php echo $bp; ?>view" class="form-inline">
	<div class="form-group">
		<input name="name" type="text" class="form-control" id="inputName" placeholder="Name" value="<?php if(!empty($_GET['name'])){ echo $_GET['name'];} ?>">
	</div>
	PAGE:
	<div class="form-group">
		<select name="page" class="form-control">
			<option>-</option>
			
			<?php for($i = 1; $i <($countips / $vps) + 1; $i++){ ?>
				<option><?php echo $i; ?></option>
			<?php } ?>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Search</button>
  
	<a href="<?php echo $bp; ?>view" type="submit" class="btn btn-default">reset</a>
</form>



<br />

<?php
if(!empty($_GET['page']) && is_numeric($_GET['page'])){
	?>
	<div class="alert alert-danger" role="alert">
	showing Page: <?php echo $_GET['page']; ?>
	</div>
	<?php
}
?>
<?php
if(!empty($_GET['name'])){
	?>
	<div class="alert alert-danger" role="alert">
	showing IPs for Name: <?php echo $_GET['name']; ?>
	</div>
	<?php
}
?>

<br />
	


<table class="table table-hover">
	<thead>
        <tr>
			<th>Name</th>
			<th>IP</th>
			<th>Timestamp</th>
        </tr>
	</thead>
	<tbody>
		<?php foreach ($ips as $ip) { ?>
			<tr>
				<td><?php echo $ip['name']; ?></td>
				<td><?php echo $ip['ip']; ?></td>
				<td><?php echo $ip['timestamp']; ?></td>
			</tr>
		<?php } ?>
</table>
