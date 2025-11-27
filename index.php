<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload ke Laptop (XAMPP)</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f2f5; margin: 0; }
        .container { background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; width: 350px; }
        h2 { color: #333; margin-top: 0; }
        .pesan { margin: 15px 0; padding: 10px; border-radius: 5px; font-size: 14px; }
        .sukses { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .gagal { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        input[type="file"] { margin: 20px 0; width: 100%; }
        button { background-color: #ff6600; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; width: 100%; }
        button:hover { background-color: #e65c00; }
    </style>
</head>
<body>

<div class="container">
    <h2>📂 Upload</h2>
    
    <?php
    // Logika PHP untuk memproses upload
    if (isset($_POST['upload'])) {
        $target_dir = "uploads/"; // Folder tujuan
        $nama_file = basename($_FILES["fileku"]["name"]);
        $target_file = $target_dir . $nama_file;
        
        // Cek apakah file ada isinya
        if(!empty($nama_file)) {
            // Pindahkan file dari sementara ke folder laptop
            if (move_uploaded_file($_FILES["fileku"]["tmp_name"], $target_file)) {
                echo "<div class='pesan sukses'>✅ Berhasil! File <b>$nama_file</b> sudah tersimpan di laptop.</div>";
            } else {
                echo "<div class='pesan gagal'>❌ Gagal mengupload file.</div>";
            }
        } else {
            echo "<div class='pesan gagal'>⚠️ Pilih file dulu!</div>";
        }
    }
    ?>

    <p>Pilih file untuk disimpan ke folder <i>uploads</i></p>
    
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileku" required>
        <button type="submit" name="uploads">Upload Sekarang</button>
    </form>
    
</div>

</body>
</html>