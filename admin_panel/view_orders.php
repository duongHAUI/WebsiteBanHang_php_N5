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
									$order_cancel_reason = $row_orders['order_cancel_reason'];
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
                                    <div class="status-text">
                                        <span class="badge badge-<?= $orderStatus[$order_status]['variant'] ?>">
                                            <?= $orderStatus[$order_status]['label'] ?>
                                        </span>
                                        <?php if ($order_status == CANCELLED_STATUS): ?>
                                            <br /><strong>Lý do: </strong> <?= $order_cancel_reason ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="change-order-status-form" style="display: none;">
                                        <select name="order-status" class="form-control">
                                            <option value="" selected disabled>--- Chọn trạng thái ---</option>
                                            <?php foreach ($orderStatus as $key => $status): ?>
                                                <option value="<?= $key ?>" <?= $order_status == $key ? 'selected' : '' ?>>
                                                    <?= $status['label'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <a href="javascript: void(0);" class="btn-close-form" data-tooltip="true" title="Hủy bỏ">&times;</a>
                                    </div>
                                    <input type="hidden" value="<?= $order_status ?>" class="old-status-id" />
                                </td>
							</tr>
							<?php 
								}
							?>
						</tbody>
					</table>

                    <div class="modal fade" tabindex="-1" role="dialog" id="cancel-reason-modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="update-order-status.php" method="post" data-validate="true" onsubmit="return false;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Hủy đơn hàng</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="cancel_reason" class="form-label">Vui lòng nhập lý do hủy</label>

                                            <div class="form-group mt-2" id="cancel_reason">
                                                <input type="text" name="cancel_reason" placeholder="Vui lòng cho biết lý do" class="form-control" data-rule-required="true" data-msg-required="Vui lòng nhập lý do hủy" />
                                            </div>

                                            <input type="hidden" value="" name="order_id" />
                                            <input type="hidden" value="" name="status" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                        <button type="submit" class="btn btn-danger" name="submit-cancel-order">Đồng ý</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php  
	}
?>

<script src="./js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/notify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha512-iztkobsvnjKfAtTNdHkGVjAYTrrtlC7mGp/54c40wowO7LhURYl3gVzzcEqGl/qKXQltJ2HwMrdLcNUdo+N/RQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    let cancelledStatus = <?= CANCELLED_STATUS ?>;
</script>
<script type="text/javascript" src="./js/orders.js"></script>
