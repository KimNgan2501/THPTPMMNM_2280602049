<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm</title>
    <script>
        function validateForm(){
            let name = document.getElementById('name').value;
            let price = document.getElementById('price').value;
            let error = [];

            if (name.length < 10 || name.length > 100){
                error.push('Tên sản phẩm phải có từ 10 đến 100 ký tự');
            }
            if (price <= 0 || isNaN(price)){
                error.push('Giá phải là một số lượng lớn hơn 0');
            }
            if (error.length > 0){
                alert(error.join('\n'));
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Thêm sản phẩm mới</h1>
    <?php if (!empty($error)): ?>
        <ul>
            <?php foreach ($error as $err): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="POST" action="/HoatKimNgan/Product/add" onsubmit="return validateForm();">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" require><br><br>
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" require></textarea><br><br>
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" step="0.01" require><br><br>
        <button type="submit">Thêm sản phẩm</button>
    </form>
    <a href="/HoatKimNgan/Product/list">Quay lại danh sách sản phẩm</a>  
</body>
</html>