<?php
session_start();
if (!isset($_SESSION['formData'])) {
    header('Location: form.php');
    exit;
}

$data = $_SESSION['formData'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= htmlspecialchars($data['name']) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <th>Umur</th>
            <td><?= htmlspecialchars($data['age']) ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?= htmlspecialchars($data['gender']) ?></td>
        </tr>
    </table>

    <h2>Isi File</h2>
    <table>
        <tr>
            <th>Baris</th>
            <th>Konten</th>
        </tr>
        <?php foreach ($data['fileLines'] as $index => $line): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($line) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
