<?php
if(isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == 'admin'){
        if($password == 'admin'){
            // login valid
            header('Location: dashboard.php');
            exit; // tambahkan pernyataan exit setelah header untuk menghentikan eksekusi skrip lebih lanjut
        }else{
            // password salah 
            header('Location: loginadmin.php?pesan=Password Salah');
            exit; // tambahkan pernyataan exit setelah header untuk menghentikan eksekusi skrip lebih lanjut
        }
    }else{
        // username salah 
        header('Location: loginadmin.php?pesan=Username Salah');
        exit; // tambahkan pernyataan exit setelah header untuk menghentikan eksekusi skrip lebih lanjut
    }
}
?>
