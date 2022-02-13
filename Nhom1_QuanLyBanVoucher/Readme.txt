--Hướng dẫn sử dụng--
File code được viết theo php nên vui lòng cài phần mềm XAMPP

	B1: Di chuyển thư mục "banvoucher" vào thư mục "htdocs" của XAMPP

	B2: Chỉnh Port của XAMPP Apache là 8888 vì trong code này sử dụng đường dẫn tuyệt đối

	B3: Mở edit file "banvoucher\app\controller\VoucherController.php" tại dòng 32 chỉnh lại
	đường dẫn lưu ảnh dựa theo đường dẫn cài XAMPP

	B4: Nếu mysql của bạn vào bằng đường dẫn hoặc tài khoản mật khẩu khác với mặc định của XAMPP
	vui lòng chỉnh lại  host, username,password tại "banvoucher\app\base\Database.php"

	B5: Import file database voucher.sql được đính kèm vào mysql	

	B6: Mở trình duyệt vào đường link: "http://localhost:8888/banvoucher/"
------------------
Tài khoản quản lý hệ thống:
TK: admin
MK: admin