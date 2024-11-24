<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $file = $_FILES['file'];

    $errors = [];

    // Validasi PHP
    if (strlen($name) < 3) {
        $errors[] = 'Nama minimal 3 karakter.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email tidak valid.';
    }
    if ($age < 18) {
        $errors[] = 'Umur minimal 18 tahun.';
    }
    if ($file['size'] > 1024 * 1024 || $file['type'] !== 'text/plain') {
        $errors[] = 'File harus berupa teks dan tidak lebih dari 1MB.';
    }

    if (!empty($errors)) {
        echo '<ul>';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
        echo '<a href="form.php">Kembali ke Form</a>';
        exit;
    }

    // Membaca isi file
    $fileContent = file_get_contents($file['tmp_name']);
    $fileLines = explode("\n", $fileContent);

    // Browser/Sistem Operasi
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    session_start();
    $_SESSION['formData'] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'gender' => $gender,
        'fileLines' => $fileLines,
        'userAgent' => $userAgent
    ];

    header('Location: result.php');
    exit;
}
