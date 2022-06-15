<?php

	if (!isset($_SESSION['admin_email'])):
		echo "<script>window.open('login.php', '_self')</script>";
	else:
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="text-center">Chào mừng <?php echo $admin_name; ?></h1>
		<h1 class="page-header">Dashboard</h1>
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tags fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_products; ?></div>
						<div>Sản phẩm</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_products">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>	
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_customers; ?></div>
						<div>Khách hàng</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_customers">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>	
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-list fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_categories; ?></div>
						<div>Danh mục</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_cats">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>	
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_pending_orders; ?></div>
						<div>Đơn hàng</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_orders">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>	
	</div>
</div>

<div style="display: grid; grid-template-columns: 2.5fr 1fr; gap: 15px;">
    <div class="panel chart-loading" style="min-height: 400px;" id="chart-container">
        <div class="panel-body">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-6">
                    <h3 class="m-0">
                        <strong>Biểu đồ doanh thu</strong>
                    </h3>
                </div>
                <div class="col-md-6 text-right">
                    <div class="btn-group" role="group" id="chart-filter">
                        <button type="button" class="btn btn-info active" data-unit="day">Ngày</button>
                        <button type="button" class="btn btn-info" data-unit="month">Tháng</button>
                        <button type="button" class="btn btn-info" data-unit="year">Năm</button>
                    </div>
                </div>
            </div>
            <canvas id="revenueChart" style="height: 350px; width: 100%;"></canvas>
        </div>
        <i class="fa fa-spinner fa-spin" style="display: none;"></i>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="mb-md thumb-info">
                <img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>" class="rounded img-responsive" style="width: 100%;">
                <div class="thumb-info-title">
                    <span class="thumb-info-inner"><?php echo $admin_name; ?></span>
                </div>
            </div>
            <div class="mb-md">
                <div class="widget-content-expanded">
                    <i class="fa fa-envelope"></i> <span>Email:</span> <?php echo $admin_email; ?><br>
                    <i class="fa fa-flag"></i> <span>Quốc gia:</span> <?php echo $admin_country; ?><br>
                    <i class="fa fa-phone"></i> <span>Điện thoại:</span> <?php echo $admin_phone; ?><br>
                </div>
                <hr class="dotted short">
                <h5 class="text-muted">Thông tin của tôi</h5>
                <p><?php echo $admin_about; ?></p>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Đơn hàng mới</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Email</th>
                    <th>Mã hóa đơn</th>
                    <th>Mã sản phẩm</th>
                    <th>Số lượng sản phẩm/th>
                    <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                $get_order = "select * from orders order by 1 DESC LIMIT 0,5";
                $run_order = mysqli_query($con, $get_order);
                while ($row_order=mysqli_fetch_array($run_order)) {
                    $order_id = $row_order['order_id'];
                    $c_id = $row_order['cus_id'];
                    $order_amount = $row_order['order_amount'];
                    $order_address = $row_order['order_address'];
                    $order_receiver = $row_order['order_receiver'];
                    $order_status = $row_order['order_status'];
                    $i++;

                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <?php
                            $get_customer = "select * from customers where customer_id = '$c_id'";
                            $run_customer = mysqli_query($con, $get_customer);
                            $row_customer = mysqli_fetch_array($run_customer);
                            $customer_email = $row_customer['customer_email'];
                            echo $customer_email;
                            ?>
                        </td>
                        <td style="text-align: left;"><?php echo "$".$order_amount; ?></td>
                        <td><?php echo $order_receiver; ?></td>
                        <td><?php echo $order_address; ?></td>
                        <td>
                            <?php
                            echo $order_status;
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="text-right">
            <a href="index.php?view_orders">Tất cả đơn hàng</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script type="text/javascript" src="./js/dashboard.js"></script>

<?php endif; ?>