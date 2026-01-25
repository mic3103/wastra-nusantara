<?php
session_start();
require 'db.php';

// cek kalau admin login, misal user_id 1 dianggap admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 2) {
    echo "❌ Akses ditolak.";
    exit();
}

// update status
if(isset($_GET['action'], $_GET['id'])){
    $id = intval($_GET['id']);
    if($_GET['action'] === 'mark_paid'){
        $conn->query("UPDATE payments SET status='paid' WHERE id=$id");
        header("Location: admin_payments.php");
        exit();
    }
    if($_GET['action'] === 'delete'){
        $res = $conn->query("SELECT proof FROM payments WHERE id=$id");
        if($res && $res->num_rows > 0){
            $row = $res->fetch_assoc();
            if(!empty($row['proof']) && file_exists("uploads/".$row['proof'])){
                unlink("uploads/".$row['proof']);
            }
        }
        $conn->query("DELETE FROM payments WHERE id=$id");
        header("Location: admin_payments.php");
        exit();
    }
}

// ambil semua data pembayaran
$result = $conn->query("SELECT * FROM payments ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Data Pembayaran | Wastra Nusantara</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #35231B;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
            font-family: 'IM Fell Great Primer SC', serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        th {
            background: #000;
            color: #fff;
        }
        tr:hover {
            background: #f0f0f0;
        }
        tr.pending {
            background: #fff3cd; 
        }
        a.proof-link {
            color: #007BFF;
            text-decoration: none;
        }
        a.proof-link:hover {
            text-decoration: underline;
        }
        .action-btn {
            display: inline-block;
            padding: 4px 8px;
            margin: 2px;
            font-size: 12px;
            border-radius: 4px;
            text-decoration: none;
            color: #fff;
        }
        .mark-paid { background: #28a745; }
        .delete { background: #dc3545; }
    </style>
</head>
<body>

<div style="text-align:right; margin-bottom:10px;">
    <a href="logout.php" style="
        display:inline-block;
        padding:6px 12px;
        background:#dc3545;
        color:#fff;
        text-decoration:none;
        border-radius:4px;
        font-weight:bold;
    ">Log Out</a>
</div>


<h2>Data Pembayaran</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Kode Pesanan</th>
            <th>Amount</th>
            <th>Alamat</th>
            <th>Phone</th>
            <th>Proof</th>
            <th>Items</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr class="<?= $row['status']=='pending' ? 'pending' : ''; ?>">
            <td><?= $row['id']; ?></td>
            <td><?= $row['user_id']; ?></td>
            <td><?= $row['order_code']; ?></td>
            <td>Rp <?= number_format($row['amount'],0,',','.'); ?></td>
            <td><?= nl2br($row['address']); ?></td>
            <td><?= $row['phone']; ?></td>
            <td>
                <?php if(!empty($row['proof'])): ?>
                    <a href="uploads/<?= $row['proof']; ?>" target="_blank" class="proof-link">Lihat Bukti</a>
                <?php endif; ?>
            </td>
            <td>
                <?php 
                    $items = json_decode($row['items'], true);
                    if($items){
                        foreach($items as $item){
                            echo "- ".$item['nama']."<br>";
                        }
                    }
                ?>
            </td>
            <td><?= strtoupper($row['status']); ?></td>
            <td><?= $row['created_at']; ?></td>
            <td>
                <?php if($row['status']=='pending'): ?>
                    <a href="?action=mark_paid&id=<?= $row['id']; ?>" class="action-btn mark-paid">Tandai Lunas</a>
                <?php endif; ?>
                <a href="?action=delete&id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin hapus?');" class="action-btn delete">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
