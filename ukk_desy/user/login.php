<?php

session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
    echo "<script>location.href='../admin/index.php';</script>";
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
                <a class="text-3xl font-bold text-white" href="../index.php">Gallery Photo</a>
            </div>
            <div>
                <div class="w-[15rem] flex justify-evenly">
                    <a class="text-xl text-white" href="../index.php">Home</a>
                    <a class="text-xl text-white" href="login.php">Login</a>
                    <a class="text-xl text-white" href="register.php">Register</a>
                </div>
            </div>
        </div>
    </div>
</header>

    <div>
        <div>
            <div class="w-full px-[10rem] py-[3rem]">
                <h1 class="text-3xl font-bold mb-5">Login</h1>
                <form class="border border-black pb-5" action="../service/login_service.php" method="post">
                    <div class="flex flex-col space-y-4">
                        <div class="mx-5 mt-5">
                            <label class="hidden" for="username">Username :</label>
                            <input class="w-full pl-4 text-black border border-black" name="username" id="username" type="text" placeholder="Username" required>
                        </div>
                        <div class="mx-5">
                            <label class="hidden" for="password">Password :</label>
                            <input class="w-full pl-4 text-black border border-black" name="password" id="password" type="password" placeholder="Password" required>
                        </div>
                        <div class="mx-5 w-min">
                            <button class="bg-red-500 text-white p-2 rounded-md" type="submit" name="submit">Login</button>
                        </div>
                    </div>
                </form>
                <p>Not registered yet? <a class="underline" href="register.php">Register</a></p>
            </div>
        </div>
    </div>

</body>
</html>