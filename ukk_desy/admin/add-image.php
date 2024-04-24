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

$userId = $_SESSION['userid'];

?><!DOCTYPE html>
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

<header class="bg-gray-500">
    <div class="px-[4rem] py-6">
        <div class="flex justify-between items-center">
            <div>
                <a class="text-3xl font-bold text-white" href="index.php">Gallery Photo</a>
            </div>
            <div>
                <div class="w-[20rem] flex justify-evenly">
                    <a class="text-xl text-white" href="index.php">Home</a>
                    <a class="text-xl text-white" href="home.php">My Image</a>
                    <a class="text-xl text-white" href="upload.php">Upload</a>
                    <a class="text-xl text-white" href="../service/logout_service.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div>
    <div class="w-full px-[10rem] py-[3rem]">
        <h1 class="text-3xl font-bold mb-5">Upload</h1>
        <form class="border border-black pb-5" action="../service/upload_service.php" method="post" enctype="multipart/form-data">
            <div class="flex flex-col space-y-4">
                <div class="mx-5 mt-5">
                    <label class="hidden" for="title">Title :</label>
                    <input class="w-full pl-4 text-black border border-black" name="title" id="title" type="text" placeholder="Title" required>
                </div>
                <div class="mx-5">
                    <label class="hidden" for="description">Description :</label>
                    <input class="w-full pl-4 text-black border border-black" name="description" id="description" type="text" placeholder="Description" required>
                </div>
                <div class="mx-5">
                    <label class="hidden" for="file">File :</label>
                    <input name="file" id="file" type="file" required>
                </div>
                <div class="mx-5 w-min">
                    <button class="bg-red-500 text-white p-2 rounded-md" type="submit" name="submit">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>