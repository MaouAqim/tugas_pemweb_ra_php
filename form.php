<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="style.css"/>
    <script>
        function validateForm(event) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const age = document.getElementById('age').value.trim();
            const file = document.getElementById('file').files[0];

            if (!name || name.length < 3) {
                alert('Nama harus diisi dan minimal 3 karakter');
                event.preventDefault();
            } else if (!email || !email.includes('@')) {
                alert('Email tidak valid');
                event.preventDefault();
            } else if (!age || isNaN(age) || age < 18) {
                alert('Umur harus diisi dan minimal 18 tahun');
                event.preventDefault();
            } else if (!file || file.type !== "text/plain" || file.size > 1024 * 1024) {
                alert('File harus berupa teks dan tidak lebih dari 1MB');
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <div class="form-header">
    <h1 style="text-align:center;">Form Pendaftaran</h1>
    <h3 style="text-align:center;">Muklis Mustaqim | 122140115</h3>
    <form action="process.php" method="POST" enctype="multipart/form-data" onsubmit="validateForm(event)">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="age">Umur:</label>
        <input type="number" id="age" name="age" min="18" required>

        <label for="gender">Jenis Kelamin:</label>
        <select id="gender" name="gender">
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
        </select>

        <label for="file">Unggah File (Teks):</label>
        <input type="file" id="file" name="file" accept=".txt" required>

        <button type="submit">Kirim</button>
    </form>
    </div>

</body>
</html>
