<?php

	if (!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php', '_self')</script>";
	}
	else{
		include_once "../controllers/formatCurrency.php";
        include "../helpers/config.php";
?>

<div class="page-loading">
    <i class="fa fa-spin fa-spinner fa-5x"></i>
</div>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Dashboard / Danh sách đơn hàng</li>
			<input type="text" name="search" id="user_query" placeholder="Search order" style="float: right;">
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-eye"></i> Danh sách đơn hàng</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Mã đơn hàng</th>
								<th>Khách hàng</th>
								<th>Số điện thoại</th>
								<th>Tổng tiền</th>
								<th>Người lấy hàng</th>
								<th>Nơi giao</th>
								<th>Ngày đặt</th>
								<th>Hình thức thanh toán</th>
								<th width="255">Trạng thái đơn hàng</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$get_orders = "SELECT * FROM orders ORDER BY order_id DESC";
								$run_orders = mysqli_query($con, $get_orders);
								while ($row_orders=mysqli_fetch_array($run_orders)) {
									$order_id = $row_orders['order_id'];
									$c_id = $row_orders['cus_id'];
									$get_customer = "select * from customers where customer_id = '$c_id'";
									$run_customer = mysqli_query($con, $get_customer);
									$order_customer = mysqli_fetch_array($run_customer)['customer_name'];
									$order_amount = (int)$row_orders['order_amount'];
									$order_address = $row_orders['order_address'];
									$order_receiver = $row_orders['order_receiver'];
									$order_phone = $row_orders['order_phone'];
									$order_payment_methods = $row_orders['order_payment_methods'];
									$order_status = $row_orders['order_status'];
									$createAt = $row_orders['createdAt'];

							?>
							<tr data-id="<?php echo $order_id; ?>">
								<td><?php echo $order_id; ?></td>
								<td><?php echo $order_customer; ?></td>
								<td><?php echo $order_phone; ?></td>
								<td><?php echo currency_format($order_amount); ?></td>
								<td><?php echo $order_receiver; ?></td>
								<td><?php echo $order_address; ?></td>
								<td><?php echo $createAt; ?></td>
								<td><?php echo $order_payment_methods; ?></td>
								<td class="status-column" height="52">
                                    <span class="badge badge-<?= $orderStatus[$order_status]['variant'] ?>">
                                        <?= $orderStatus[$order_status]['label'] ?>
                                    </span>
                                    <select name="order-status" class="form-control" style="display: none;">
                                        <option value="" selected disabled>--- Chọn trạng thái ---</option>
                                        <?php foreach ($orderStatus as $key => $status): ?>
                                            <option value="<?= $key ?>" <?= $order_status == $key ? 'selected' : '' ?>>
                                                <?= $status['label'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
							</tr>
							<?php 
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php  
	}
?>

<script type="text/javascript" src="js/notify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        'use strict';

        $('.status-column').dblclick(function () {
            $(this).parents('tr').siblings().find('span').show();
            $(this).parents('tr').siblings().find('select').hide();

            $(this).find('span').hide();
            $(this).find('select').show();
        });

        $("select[name='order-status']").change(function () {
            const _this = $(this);

            const status = _this.val();
            const order_id = _this.parents('tr').data('id');

            $.ajax({
                url: 'update-order-status.php',
                method: 'post',
                data: {status, order_id},
                beforeSend: function () {
                    $('.page-loading').show();
                },
                dataType: 'json'
            }).done(result => {
                if (result.status === 200) {
                    _this.siblings('span').replaceWith(`<span class="badge badge-${result.data.variant}">${result.data.label}</span>`).show();
                    _this.hide();
                    $.notify(result.message, 'success');
                }
            }).fail(error => {
                console.log(error)
            }).always(() => {
                $('.page-loading').hide();
            })
        })
    });
</script>
