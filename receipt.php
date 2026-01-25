<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: loginsignup");
    exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM payments WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "❌ Resi tidak ditemukan.";
    exit();
}

$data = $result->fetch_assoc();
$items = json_decode($data['items'], true);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Resi Pembayaran | Wastra Nusantara</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #35231B;
            margin: 0;
            padding: 0;
        }

        .receipt-container {
            max-width: 500px;
            background: #fff;
            margin: 80px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .receipt-container h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .receipt-container p {
            text-align: left;
            color: #444;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .receipt-container img {
            margin-top: 10px;
            width: 250px;      
            height: auto;      
            border-radius: 8px;
            border: 1px solid #ddd;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    


        .back-home {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #555;
            font-weight: bold;
        }

        .order-summary {
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .order-summary h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .product-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .product-item span {
            color: #444;
        }

        .order-total {
            border-top: 1px solid #ddd;
            padding-top: 8px;
            margin-top: 8px;
            text-align: right;
        }
    </style>
</head>
<body>

<div class="receipt-container">
    <h2>Resi Pembayaran</h2>

    <div class="order-summary">
        <h3>Detail Pesanan</h3>
        <?php if(!empty($items)): ?>
            <?php foreach($items as $i => $item): ?>
                <div class="product-item">
                    <span><?= $item['nama']; ?></span>
                    <?php if(isset($item['harga'])): ?>
                        <span>Rp <?= number_format($item['harga'],0,',','.'); ?></span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="order-total">
            <strong>Total: Rp <?= number_format($data['amount'],0,',','.'); ?></strong>
        </div>
    </div>

    <p><strong>Kode Pesanan:</strong> <?= $data['order_code']; ?></p>
    <p><strong>Alamat Pengiriman:</strong><br><?= nl2br($data['address']); ?></p>
    <p><strong>Nomor yang Dapat Dihubungi:</strong> <?= $data['phone']; ?></p>
    <p><strong>Status:</strong> <?= strtoupper($data['status']); ?></p>
    <p><strong>Tanggal:</strong> <?= $data['created_at']; ?></p>

    <p><strong>Bukti Pembayaran:</strong></p>
    <img src="uploads/<?= $data['proof']; ?>" alt="Bukti Pembayaran">
    <p><i>Mohon Screen Shot Layar ini sebagai bukti pembelian barang.</i></p>
    <p><strong>WASTRA: <a href="wa.me/6282111557981">0821-1155-7981</a></strong></p>

    <a href="index.php" class="back-home">← Kembali ke Home</a>
</div>


<div id="loading-screen">
  <div class="loader-content">
    <div class="logo">WASTRA NUSANTARA</div>
    <div class="tagline">Warisan Tradisi Anak Bangsa</div>
  </div>
</div>

<script>
  window.addEventListener("load", function () {
    const loader = document.getElementById("loading-screen");
    loader.classList.add("hidden");
  });
</script>

</body>
</html>
