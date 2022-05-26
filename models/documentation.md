# Import Model

- Để sử dụng 1 model trong bất cứ file php nào, ta phải thực hiện các bước sau:

  - Tạo 1 đoạn code php như sau ở đầu file, không được viết sau bất kì đoạn nào kể cả là html
    <?php
      namespace Models;
      include_once "models/index.php";
      include_once "configs/db.php";
    ?>

  - Sử dụng model theo mục đích của bạn, ví dụ tìm 1 đối tượng customer có id là 7:
    <?php
      $customer = Customer::find_by_pk($con, 7);
    ?>

  - Khi kết quả trả về là 1 model ta có thể trực tiếp truy xuất đến các thuộc tính trong đối tượng(lấy theo tên được tạo trong Model không lấy theo tên trường trên database) ví dụ:
    <?php
      echo $customer -> name."<br>";
      echo $customer -> email."<br>";
    ?>

  - Tham số $conditions là 1 array có danh sách key là select, where, order, limit, offset, quy tắc chuyển thành sql như sau
    - select: mặc định là select \* , nếu có ví dụ "select" => "customer_id, customer_name" thì sql sẽ là "select customer_id, customer_name from customers"
    - where: mặc định là không có gì, nếu có ví dụ "where" => "id = 7 and name='duong'" thì sql sẽ là "select \* from customer where id=7 and name='duong'"
    - order, limit, offset tương tự như where
    - ví dụ ta muốn tìm tất cả sản phẩm có giá nhỏ hơn $500 và sắp xếp chúng tăng dần theo giá:
    <?php
      $products = Product::find_all($con, array("where" => "product_price <= 500", "order" => "product_price"));
    ?>
    - SQL tương đương:
      select \* from products where product_price <= 500 order by product_price
    - Lưu ý các giá trị trong mảng conditions sẽ trực tiếp chuyển thành SQL nên tên các trường phải viết theo tên của trường dữ liệu trong database

# Model.findByPk

Tìm 1 đói tượng theo id

- Tham số:
  - $con msqli
  - $id int
- Trả về: Model | null
- Ví dụ:
  $customer = Customer::find_by_pk($con, 7);

# Model.findAll

- Tìm tất cả các đối tượng theo điều kiện
- Tham số:
  - $con mysqli
  - $conditions mảng conditions
- Trả về: [Model] | []
- Ví dụ:
  $customers = Customer::find_all($con, array("where" => "customer_name = 'duong'"));

# Model.findOne

- Tìm 1 đối tượng theo điều kiện
- Tham số:
  - $con mysqli
  - $conditions mảng conditions
- Trả về: Model | null
- Ví dụ:
  $customer = Customer::find_one($con, array("where" => "customer_name = 'duong'"));

# Model.findAllAndCount

- Tìm tất cả các đối tượng theo điều kiện và đếm số lượng bản ghi có trong database (chủ yếu sử dụng để phân trang)
- Tham số:
  - $con mysqli
  - $conditions mảng conditions
- Trả về: array("count" => int, "rows" => array(Model))
  - count tổng là số lượng bản ghi có trong database
  - rows là mảng những đối tượng được lấy ra
- Ví dụ:
  $customers = Customer::find_all_and_count($con, array("where" => "customer_name = 'duong'"));

# Model.count

- Đếm số lượng bản ghi có trong database theo điều kiện
- Tham số:
  - $con mysqli
  - $conditions mảng conditions
- Trả về: int
- Ví dụ:
  $customers = Customer::count($con, array("where" => "customer_name = 'duong'"));

# Model.create

- Tạo 1 đối tượng trong database
- Tham số:
  - $con mysqli
  - $form array()
- Trả về: Model | null
- Ví dụ:
  $category = Category::create($con, array("cat_title" => "Laza", "cat_desc" => "Thương hiệu thời trang nổi tiếng ít người biết đến."));

# Model.deleteByPk

- Xóa 1 bản ghi trong database
- Tham số:
  - $con mysqli
  - $id int
- Trả về: boolean
- Ví dụ:
  $category = Category::delete_by_pk($con, 10);

# Model.updateByPk

- Cập nhật 1 bản ghi trong database
- Tham số:
  - $con mysqli
  - $id int
  - $form array()
- Trả về: boolean
- Ví dụ:
  $category = Category::update_by_pk($con, 10, array("cat_desc" => "Thương hiệu thời trang số 1 thế giới"));

# Model#save

- Cập nhật 1 đối tượng lên cơ sở dữ liệu
- Tham số:
  - $con mysqli
- Trả về:
- Ví dụ:
  $category = Category::find_by_pk($con, 10);
  $category -> desc = "Thương hiệu thời trang cho giới trẻ";
  $category -> save();

# Model#delete

- Xóa 1 đối tượng trên cơ sở dữ liệu
- Tham số:
  - $con mysqli
- Trả về:
- Ví dụ:
  $category = Category::find_by_pk($con, 10);
  $category -> delete();

# Populate

- Một số đối tượng có quan hệ với các đối tượng khác, nếu đối tượng có hàm populated có thể sử dụng hàm đó để populate để lấy dữ liệu của bản ghi theo khóa ngoài, ví dụ:
  $product = Product::find_by_pk($con, 1); // ví dụ đối tượng product này có cat_id = 10, brand_id = 10
  $product -> populated("category"); // lúc này biến $product sẽ có thêm 1 trường $product -> category = dữ liệu của category có id bằng 10
  // nếu muốn populate cho 2 bảng trở nên ta truyền mảng vào hàm populated 
  $product -> populated(array("category", "brand"));

# Một số phương thức khác

- Ở bảng Product khi muốn lấy tất cả các ảnh của sản phẩm đó ta có phương thức get_images(), ví dụ:
  $product = Product::find_by_pk($con, 10);
  $images = $product -> get_images($con);// trả về array(Image)
- Bảng Order có phương thức get_details() với chức năng tương tự get_images()
