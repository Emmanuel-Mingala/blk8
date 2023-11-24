<?php include('header.php'); ?>

<body class="landing-page">
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
      <div class="page-header">
        <div class="container shape-container d-flex align-items-center pt-lg pb-3">
          <div class="col px-0">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 text-center">
                <h1 class="text-white display-1">Menu</h1>
                <h2 class="display-4 font-weight-normal text-white">Choose your favorite dish!</h2>
              </div>
            </div>
          </div>
        </div>
		<div class="container">
		<div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
				<?php
				$sql = "select * from category order by categoryid asc limit 1";
				$fquery = $conn->query($sql);
				$frow = $fquery->fetch_array();
				?>
				<li class="nav-item active" role="presentation"><a class="nav-link" data-bs-toggle="tab" href="#<?php echo $frow['catname'] ?>"><?php echo $frow['catname'] ?></a></li>
				<?php

				$sql = "select * from category order by categoryid asc";
				$nquery = $conn->query($sql);
				$num = $nquery->num_rows - 1;

				$sql = "select * from category order by categoryid asc limit 1, $num";
				$query = $conn->query($sql);
				while ($row = $query->fetch_array()) {
				?>
					<li class="nav-item" role="presentation"><a class="nav-link" data-bs-toggle="tab" href="#<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></a></li>
				<?php
				}
				?>
                  
                </ul>
        </div>
		</div>
		
		<div class="container">
		<div class="tab-content">
			<?php
			$sql = "select * from category order by categoryid asc limit 1";
			$fquery = $conn->query($sql);
			$ftrow = $fquery->fetch_array();
			?>
			<div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade show active" role="tabpanel" style="margin-top:20px;">
				<?php

				$sql = "select * from product where categoryid='" . $ftrow['categoryid'] . "'";
				$pfquery = $conn->query($sql);
				$inc = 4;
				while ($pfrow = $pfquery->fetch_array()) {
					$inc = ($inc == 4) ? 1 : $inc + 1;
					if ($inc == 1) echo "<div class='row mb-3'>";
				?>
					<div class="col-md-3">
						<div class="card">
							<div class="card-header">
								<b><?php echo $pfrow['productname']; ?></b>
							</div>
							<div class="card-body">
								<img style="object-fit:cover;
								width:100%;
								height:225px;" src="<?php if (empty($pfrow['photo'])) {
												echo "upload/noimage.jpg";
											} else {
												echo $pfrow['photo'];
											} ?>">
							</div>
							<div class="card-footer text-center">
								₱ <?php echo number_format($pfrow['price'], 2); ?>
							</div>
						</div>
					</div>
				<?php
					if ($inc == 4) echo "</div>";
				}
				if ($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>";
				if ($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>";
				if ($inc == 3) echo "<div class='col-md-3'></div></div>";
				?>
			</div>
			<?php

			$sql = "select * from category order by categoryid asc";
			$tquery = $conn->query($sql);
			$tnum = $tquery->num_rows - 1;

			$sql = "select * from category order by categoryid asc limit 1, $tnum";
			$cquery = $conn->query($sql);
			while ($trow = $cquery->fetch_array()) {
			?>
				<div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" role="tabpanel" style="margin-top:20px;">
					<?php

					$sql = "select * from product where categoryid='" . $trow['categoryid'] . "'";
					$pquery = $conn->query($sql);
					$inc = 4;
					while ($prow = $pquery->fetch_array()) {
						$inc = ($inc == 4) ? 1 : $inc + 1;
						if ($inc == 1) echo "<div class='row mb-3'>";
					?>
						<div class="col-md-3">
							<div class="card">
								<div class="card-header text-center">
									<b><?php echo $prow['productname']; ?></b>
								</div>
								<div class="card-body">
									<img style="object-fit:cover;
									width:100%;
									height:225px;" src="<?php if ($prow['photo'] == '') {
													echo "upload/noimage.jpg";
												} else {
													echo $prow['photo'];
												} ?>">
								</div>
								<div class="card-footer text-center">
									₱<?php echo number_format($prow['price'], 2); ?>
								</div>
							</div>
						</div>
					<?php
						if ($inc == 4) echo "</div>";
					}
					if ($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>";
					if ($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>";
					if ($inc == 3) echo "<div class='col-md-3'></div></div>";
					?>
				</div>
			<?php
			}
			?>
		</div>
		</div>
      </div>
      <!-- <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div> -->
    </div>
    
    
    <br /><br />
    
  </div>
	
		<!-- <h1 class="page-header text-center"><b>M E N U</b></h1> -->

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
	<!-- <footer>
	<center>BLOCK8 Grill and Sizzling House</center>
</footer> -->
	<?php include('scripts.php');?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>