<?php
	if (!empty($_GET['alert'])) {
		$errors = [];
		if ($_GET['alert'] == 3) {
			$errors['gia']['int'] = 'Giá sách phải là số';
		}
		
		if ($_GET['alert'] == 1) {
			$errors['ten']['required'] = 'Bạn phải nhập tên sách';
		}

		if ($_GET['alert'] == 2) {
			$errors['gia']['required'] = 'Bạn phải nhập giá sách';
		}
		if ($_GET['alert'] == 4) {
			$errors['ten']['unique'] = 'Sách đã tồn tại';
		}
		if ($_GET['alert'] == 5) {
			$errors['ten']['special'] = 'Không nhập kí tự đặc biệt';
		}
		if ($_GET['alert'] == 6) {
			$errors['ten']['max'] = 'Vượt quá kí tự cho phép';
		}
	}
?>

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
					<a href="?action=bookindex">Trang chủ</a>
					<div class="card-header text-center">Thêm sách</div>

					<div class="card-body">

						<form action="?action=store" method="POST">
							<div class="form-group">
								<label>Tên sách</label>
								<input name="ten" type="text" class="form-control" placeholder="Nhập tên sách">
								<?php 
									if (!empty($errors['ten']['required'])) {
										echo '<span class="text-danger">'. $errors['ten']['required']. '</span>';
									}
									if (!empty($errors['ten']['unique'])) {
										echo '<span class="text-danger">'. $errors['ten']['unique']. '</span>';
									}
									if (!empty($errors['ten']['special'])) {
										echo '<span class="text-danger">'. $errors['ten']['special']. '</span>';
									}
									if (!empty($errors['ten']['max'])) {
										echo '<span class="text-danger">'. $errors['ten']['max']. '</span>';
									}
								?>
							</div>
							<div class="form-group">
								<label>Giá sách</label>
								<input name="gia" type="text" class="form-control" placeholder="Nhập giá sách">
								<?php 
									if (!empty($errors['gia']['required'])) {
										echo '<span class="text-danger">'. $errors['gia']['required']. '</span>';
									}
									if (!empty($errors['gia']['int'])) {
										echo '<span class="text-danger">'. $errors['gia']['int']. '</span>';
									}
								?>	
							</div>
							
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
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
