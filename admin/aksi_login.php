<?php
    include "config/koneksi.php";
    if(isset($_POST['login'])){
        // if(empty($_POST['area'])){
        //     echo "<script>
        //     alert('Silahkan Pilih Area terlebih dahulu!');
        //     window.location='login.php';
        //   </script>";
        // }

    $user = mysqli_real_escape_string($kon,$_POST['username']);
    $pass = mysqli_real_escape_string($kon,$_POST['password']);
    $area = $_POST['area'];
   
    $sql  = mysqli_query($kon,"SELECT * FROM tb_admin WHERE username = '$user'");
    $data = mysqli_fetch_array($sql);

  

    if(mysqli_num_rows($sql) > 0){
    if(password_verify($pass, $data["password"])){
        $daerah = mysqli_query($kon,"SELECT * FROM tb_area WHERE nama_area = '$area'");
        $d = mysqli_fetch_array($daerah);
    
            session_start();
            $_SESSION['id']			   = $data['id_admin'];
            $_SESSION['username']	   = $data['username'];
            $_SESSION['password']	   = $data['password'];
            $_SESSION['area']		   = $d['nama_area'];
            $_SESSION['id_area']		   = $d['id_area'];

            echo "<script>
            alert('Selamat Datang $_SESSION[username]');
            window.location='pages/index.php';
            </script>";
           
        }else{
        
             
            echo "<script>
            alert('Username dan pasword anda salah !');
            window.location='pages/index.php';
            </script>";
          
        }  

    }
    else
    {
        echo "<script>
            alert('Username dan pasword anda salah !');
            window.location='pages/index.php';
            </script>";
    }
}
?>