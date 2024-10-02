<?php
$dir = 'path/to/your/html/files'; // مسیر دایرکتوری که فایل‌های HTML شما در آن قرار دارد.

if (isset($_POST['upload'])) {
    $file = $_FILES['file'];
    move_uploaded_file($file['tmp_name'], $dir . '/' . $file['name']);
}

if (isset($_POST['delete'])) {
    $fileToDelete = $dir . '/' . $_POST['fileToDelete'];
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
    }
}

$files = array_diff(scandir($dir), array('.', '..'));
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت فایل‌های HTML</title>
</head>
<body>
    <h1>مدیریت فایل‌های HTML</h1>

    <h2>آپلود فایل HTML</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".html" required>
        <button type="submit" name="upload">آپلود</button>
    </form>

    <h2>حذف فایل HTML</h2>
    <form action="" method="post">
        <select name="fileToDelete">
            <?php foreach ($files as $file): ?>
                <option value="<?= $file ?>"><?= $file ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="delete">حذف</button>
    </form>

    <h2>فایل‌های موجود</h2>
    <ul>
        <?php foreach ($files as $file): ?>
            <li><?= $file ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
