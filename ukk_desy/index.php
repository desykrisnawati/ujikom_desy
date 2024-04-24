<?php

session_start();
include 'config/connection.php';
if (isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
    echo "<script>location.href='admin/index.php';</script>";
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

    <header class="bg-gray-500">
        <div class="px-[4rem] py-6">
            <div class="flex justify-between items-center">
                <div>
                    <a class="text-3xl font-bold text-white" href="index.php">Gallery Photo</a>
                </div>
                <div>
                    <div class="w-[15rem] flex justify-evenly">
                        <a class="text-xl text-white" href="index.php">Home</a>
                        <a class="text-xl text-white" href="user/login.php">Login</a>
                        <a class="text-xl text-white" href="user/register.php">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div>
        <div>
            <div class="p-5 flex justify-end">
            </div>
            <hr>
            <div>
                
                </div>
            </div>
            <div>
                <div class="w-full p-9">
                    <p class="text-3xl font-bold mb-5">Gallery Website</p>
                    <div class="flex flex-wrap justify-center border border-black p-[3rem]">
                        <?php
                        $query = mysqli_query($connection, "SELECT p.*, u.username FROM pictures p JOIN users u ON p.user_id = u.id");
                        while ($data = mysqli_fetch_array($query)) { ?>
                            <div class="border border-black">
                                <div>
                                    <img class="w-[19rem] h-[10rem]" src="image/<?php echo $data['file_path'] ?>" alt="<?php echo $data['title']?>">
                                    <div class="w-[19rem] h-[10rem] px-3 py-2 overflow-hidden">
                                        <p class="text-xl font-bold">
                                            <?php echo $data['username']?>
                                        </p>
                                        <?php echo $data['description']?>
                                    </div>
                                    <div class="px-3 py-2">
                                        <?php echo $data['upload_date']?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>