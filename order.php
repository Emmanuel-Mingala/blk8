<?php include('header.php'); ?>

<body id="top">
	<?php include('navbar.php'); ?>
	<div class="wrapper">
	<div class="section section-hero section-shaped">
      <div class="shape shape-style-1 shape-dark">
        <span class="span-150"></span>
        <span class="span-50"></span>
        <span class="span-50"></span>
        <span class="span-75"></span>
        <span class="span-100"></span>
        <span class="span-75"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
      </div>
      <div class="container mt-5">
		
		<h1 class="page-header display-1 text-secondary text-center mb-3">ORDER</h1>
		<form method="POST" action="purchase.php">
		<div class="row mb-3">
				<div class="col-md-3">
					<input type="text" name="customer" class="form-control" placeholder="Customer Name" required>
				</div>
				<div class="col-md-2" style="margin-left:-20px;">
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
				</div>
			</div>
			<table class="table table-striped table-bordered bg-secondary">
				<thead>
					<th class="text-center"><input type="checkbox" id="checkAll"></th>
					<th>Category</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Quantity</th>
				</thead>
				<tbody>
					<?php
					$sql = "select * from product left join category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";
					$query = $conn->query($sql);
					$iterate = 0;
					while ($row = $query->fetch_array()) {
					?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							<td><?php echo $row['catname']; ?></td>
							<td><?php echo $row['productname']; ?></td>
							<td class="text-right">₱ <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
					<?php
						$iterate++;
					}
					?>
				</tbody>
			</table>

			<a href="#top" class="btn btn-primary">Back to top<i class="fas fa-chevron-up ml-3"></i></a>
		</form>
	</div>
	</div>
	<footer class="footer">
      <div class="container">
        <div class="row row-grid align-items-center mb-5">
          <div class="col-lg-6">
            <h3 class="text-primary font-weight-light mb-2">Thank you for Ordering!</h3>
            <h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
          </div>
          <div class="col-lg-6 text-lg-center btn-wrapper">
            <button target="_blank" href="#" rel="nofollow" class="btn btn-icon-only btn-twitter rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
              <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
            </button>
            <button target="_blank" href="#" rel="nofollow" class="btn-icon-only rounded-circle btn btn-facebook" data-toggle="tooltip" data-original-title="Like us">
              <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
            </button>
            
          </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
          <div class="col-md-6">
            <div class="copyright">
              &copy; 2023 <a href="" target="_blank">Block 8</a>.
            </div>
          </div>
          <div class="col-md-6">
            <ul class="nav nav-footer justify-content-end">
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">Block 8</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#checkAll").click(function() {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>