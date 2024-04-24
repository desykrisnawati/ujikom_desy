<?php

session_start();
include '../config/connection.php';
if ($_SESSION['status'] != 'login') {
    echo "
        <script>
            location.href='../index.php';
        </script>
    ";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Gallery Photo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<div>
    <div class="flex justify-start p-5">
        <a class="text-3xl cursor-pointer" href="upload.php">
            Kembali
        </a>
    </div>
    <form class="p-[5rem] flex flex-col self-start space-y-5" action="../service/image_delete_service.php" method="post" enctype="multipart/form-data">
        <div class="flex w-[15rem] gap-4">
            <input class="border border-black rounded-lg py-2 px-3" id="id-delete" name="id-delete" type="text" value="<?php echo $_GET['id']?>" readonly>
            <label class="whitespace-nowrap flex items-center" for="id-delete">Yakin ingin menghapus?</label>
        </div>
        <div class="flex justify-start">
            <button class="bg-red-500 px-[1rem] py-[0.2rem] rounded-lg text-white" type="submit" name="submit">Hapus</button>
        </div>
    </form>
</div>
</body>
</html>