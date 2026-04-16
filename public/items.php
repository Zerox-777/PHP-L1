<?php
$items = require __DIR__ . '/../src/Data/stationery.php';
require __DIR__ . '/../src/Helpers/store_functions.php';

$totalTypes = count($items);
$totalStock = calculateTotalStock($items);
$availableItems = count(filterInStockItems($items));
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Văn phòng phẩm</title>
</head>
<body>
    <h1>Cửa hàng Văn phòng phẩm Mini</h1>
    
    <h2>Khu vực Thống kê</h2>
    <ul>
        <li>Tổng số loại mặt hàng: <?php echo $totalTypes; ?></li>
        <li>Tổng số lượng tồn kho: <?php echo $totalStock; ?></li>
        <li>Số mặt hàng còn sẵn: <?php echo $availableItems; ?></li>
    </ul>

    <h2>Danh sách Sản phẩm</h2>
    <?php foreach ($items as $item): ?>
    <div style="margin-bottom: 15px;padding: 10px;border: 1px solid #000;">
        <p><strong>Tên mặt hàng:</strong> <?php echo formatItemName($item['name'],$item['brand']); ?></p>
        <p><strong>Loại:</strong> <?php echo $item['category']; ?></p>
        <p><strong>Giá:</strong> <?php echo number_format($item['price']); ?> VNĐ</p>
        <p><strong>Số lượng kho:</strong> <?php echo $item['quantity']; ?></p>
        <p><strong>Trạng thái:</strong> <?php echo getItemStockStatus($item['quantity']); ?></p>
    </div>
    <?php endforeach; ?>
    <p><a href="index.php">Quay lại Trang chủ</a></p>
</body>
</html>