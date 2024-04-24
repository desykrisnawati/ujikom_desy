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
<div class="">
    <div class="relative w-full max-h-[100vh]">
        <div class="flex justify-start p-5">
            <a class="text-3xl cursor-pointer" href="upload.php">
                Kembali
            </a>
        </div>
        <form class="rounded-lg gap-4 relative w-full h-auto flex justify-start items-center p-5" action="../service/image_edit_service.php" method="post" enctype="multipart/form-data">
            <div class="p-5 w-[30rem] flex justify-center">
                <img class="w-2/3 h-auto" src="../image/<?php echo $_GET['filePath']?>" alt="<?php echo $_GET['filePath']?>">
            </div>
            <div class="flex flex-col space-y-3 h-auto">
                <div class="h-[19rem] w-[20rem] flex flex-col space-y-2">
                    <div class="flex flex-col justify-start">
                        <label class="text-left" for="id-edit">ID</label>
                        <input class="border border-black rounded-lg w-full py-2 px-3" type="text" id="id-edit" name="id-edit" value="<?php echo $_GET['id']?>" readonly>
                    </div>
                    <div class="flex flex-col justify-start">
                        <label class="text-left" for="title-edit">Judul</label>
                        <input class="border border-black rounded-lg w-full py-2 px-3" type="text" id="title-edit" name="title-edit" value="<?php echo $_GET['title']?>" required>
                    </div>
                    <div class="flex flex-col justify-start">
                        <label class="text-left" for="description-edit">Description</label>
                        <textarea class="border border-black rounded-lg w-full py-2 px-3" id="description-edit" name="description-edit" required><?php echo $_GET['description']?></textarea>
                    </div>
                    <div class="flex flex-col justify-start">
                        <label class="text-left" >File</label>
                        <input class="w-full" name="file" id="file" type="file">
                    </div>
                </div>
                <div class="flex justify-start">
                    <button class="bg-red-500 px-[1rem] py-[0.2rem] rounded-lg text-white" type="submit" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>