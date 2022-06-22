<?php

const SUCCESS = 'success';
const ERROR = 'danger';
const INFO = 'info';

/*== Order status ==*/
const WAIT_CONFIRM_STATUS = 0; // chờ xác nhận
const WAIT_DELIVERY_STATUS = 1; // chờ lấy hàng
const DELIVERING_STATUS = 2; // đang giao
const COMPLETED_STATUS = 3; // hoàn thành
const CANCELLED_STATUS = 4; // hủy bỏ