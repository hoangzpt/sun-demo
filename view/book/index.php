<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
include ('view/home.php');
?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Quản lí sách</div>

					<div class="card-body">

						<a class="btn btn-success mb-3" href="?action=create" role="button">Thêm sách</a>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Tên sách</th>
									<th scope="col">Giá</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($arr as $each): ?>
									<tr>
										<th scope="row"><?php echo $each->get_ma() ?></th>
										<td><?php echo $each->get_ten() ?></td>
										<td><?php echo $each->get_gia() ?></td>
										<td>
											<a class="btn btn-primary" href="?action=edit&ma=<?php echo $each->get_ma() ?>" role="button">Sửa</a>
											<a class="btn btn-danger" href="?action=delete&ma=<?php echo $each->get_ma() ?>" role="button">Xóa</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
