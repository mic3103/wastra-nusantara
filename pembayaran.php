<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: loginsignup");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pembayaran | Wastra Nusantara</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #35231B;
            margin: 0;
            padding: 0;
        }

        .payment-container {
            max-width: 500px;
            background: #fff;
            margin: 80px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .payment-container h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .payment-container p {
            text-align: center;
            color: #666;
            margin-bottom: 25px;
        }

        .payment-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .payment-form input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }

        .payment-form input[type="file"] {
            padding: 6px;
        }

        .payment-form button {
            width: 100%;
            background: #000;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .payment-form button:hover {
            background: #333;
        }

        .back-home {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #555;
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

<script>
document.addEventListener("DOMContentLoaded", function(){

    const cart = JSON.parse(localStorage.getItem("wastra_checkout")) || [];
    const totalInput = document.getElementById("amount");
    const orderInput = document.getElementById("order_code");
    const itemsInput = document.getElementById("items");
    const productList = document.getElementById("product-list");
    const totalText = document.getElementById("total-text");

    if(cart.length === 0){
        alert("Tidak ada data checkout!");
        window.location.href = "produk";
        return;
    }

    let total = 0;
    productList.innerHTML = "";

    cart.forEach(item => {
        const harga = parseInt(item.harga);
        total += harga;

        const div = document.createElement("div");
        div.className = "product-item";
        div.innerHTML = `
            <span>${item.nama}</span>
            <span>Rp ${harga.toLocaleString("id-ID")}</span>
        `;

        productList.appendChild(div);
    });

    totalInput.value = total;
    totalText.textContent = total.toLocaleString("id-ID");
    orderInput.value = "WN-" + Date.now();
    itemsInput.value = JSON.stringify(cart);

    // Ambil cuma nama produk
    const cartNamesOnly = cart.map(item => ({ nama: item.nama }));
    itemsInput.value = JSON.stringify(cartNamesOnly);

});
</script>






<div class="payment-container">
    <h2>Konfirmasi Pembayaran</h2>
    <p>Silakan unggah bukti pembayaran untuk memproses pesanan Anda.</p>

    <div class="order-summary">
        <h3>Detail Pesanan</h3>
        <div id="product-list"></div>
        <div class="order-total">
            <strong>Total: Rp <span id="total-text">0</span></strong>
        </div>
    </div>


    <form class="payment-form" action="process_payment.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="items" id="items">

        <label>Kode Pesanan</label>
        <input type="text" name="order_code" id="order_code" readonly>

        <label>Total Pembayaran (Rp)</label>
        <input type="number" name="amount" id="amount" readonly>

        <label>Alamat Pengiriman</label>
        <textarea name="address" id="address" rows="4" required
        placeholder="Contoh: Jl. Merdeka No.10, RT 02/RW 05, Bogor"></textarea>

        <label>Nomor yang Dapat Dihubungi</label>
        <input 
            type="tel" 
            name="phone" 
            id="phone" 
            required 
            placeholder="Contoh: 081234567890"
            pattern="[0-9]{10,13}"
            title="Masukkan nomor 10–13 digit (hanya angka)">

        <label>Upload Bukti Pembayaran</label>
        <input type="file" name="proof" required>

        <button type="submit">Kirim Bukti Pembayaran</button>
    </form>




    <a href="index" class="back-home">← Kembali ke Home</a>
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
