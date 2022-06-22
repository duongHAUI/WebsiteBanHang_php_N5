<?php

	if (!isset($_SESSION['admin_email'])):
		echo "<script>window.open('login.php', '_self')</script>";
	else:
        include_once "../controllers/formatCurrency.php";
        include_once "../helpers/config.php";
?>

<link rel="stylesheet" href="./css/jquery.datetimepicker.min.css">
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
    <div class="panel loading" style="min-height: 400px;" id="chart-container">
        <div class="panel-body">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-6">
                    <h3 class="m-0">
                        <strong>Biểu đồ doanh thu</strong>
                    </h3>
                </div>
                <div class="col-md-6">
                    <div class="chart-filter">
                        <div class="form-group">
                            <div class='input-group date'>
                                <input type='text' class="form-control datetimepicker" id="start-date" readonly placeholder="Ngày bắt đầu" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <i class="fa fa-minus"></i>
                        <div class="form-group">
                            <div class='input-group date'>
                                <input type='text' class="form-control datetimepicker" id="end-date" readonly placeholder="Ngày kết thúc" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="btn-filter-chart">
                            <i class="fa fa-filter"></i>
                            Lọc
                        </button>
                    </div>
                </div>
            </div>
            <canvas id="revenueChart"></canvas>
<!--            <button type="button" id="reset-chart">Reset</button>-->
        </div>
        <i class="fa fa-spinner fa-spin"></i>
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
                    <th>Khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái đơn hàng</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get_order = "select * from orders where order_status = " . WAIT_CONFIRM_STATUS . " order by order_id DESC LIMIT 0, 10";
                $run_order = mysqli_query($con, $get_order);
                while ($row_order=mysqli_fetch_array($run_order)) {
                    $get_customer = "select * from customers where customer_id = {$row_order['cus_id']}";
                    $run_customer = mysqli_query($con, $get_customer);
                    $row_customer = mysqli_fetch_array($run_customer);
                    ?>
                    <tr>
                        <td><?= $row_order['order_id']; ?></td>
                        <td><?= $row_customer['customer_name'] ?></td>
                        <td><?= $row_customer['customer_phone'] ?></td>
                        <td><?= date('d/m/Y', strtotime($row_order['createdAt'])) ?></td>
                        <td><?= number_format($row_order['order_amount']) ?>đ</td>
                        <td>
                            <span class="badge badge-<?= $orderStatus[$row_order['order_status']]['variant'] ?>">
                                <?= $orderStatus[$row_order['order_status']]['label'] ?>
                            </span>
                            <?php if ($row_order['order_status'] == CANCELLED_STATUS): ?>
                                <br /><strong>Lý do: </strong> <?= $row_order['order_cancel_reason'] ?>
                            <?php endif; ?>
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
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.2.1/chartjs-plugin-zoom.min.js" integrity="sha512-klQv6lz2YR+MecyFYMFRuU2eAl8IPRo6zHnsc9n142TJuJHS8CG0ix4Oq9na9ceeg1u5EkBfZsFcV3U7J51iew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="./js/jquery.datetimepicker.full.min.js"></script>
<script src="./js/moment.min.js" type="text/javascript"></script>
<script type="text/javascript" src="./js/dashboard.js"></script>

<?php endif; ?>