<?php 
    $ssql = "SELECT * FROM datos_usuario WHERE nombre='$usu' and pass='$pass'";
    $rs = mysqli_query($conn, $ssql);

    if ($rs === false) {
        echo mysqli_error($conn);
    } else {
        $admin_sesion = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    }
    if(!isset($_SESSION['nombre'])){
        if (mysqli_num_rows($rs) != 0) {
            if($admin_sesion[0]["administrador"] != "0"){
            session_start();
            $_SESSION["nombre"] = $usu . " - Administrador";
            $_SESSION["pass"] = $pass;
            } else{
            session_start();
            $_SESSION["nombre"] = $usu . " - Usuario";
            $_SESSION["pass"] = $pass;
            }
        } else{
        session_destroy();
        header("Location: login.php");
        }
    }   

    if ($rs === false) {
        echo mysqli_error($conn);
    } else {
        $admin_sesion = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    }
if(session_start() == false){
    if (mysqli_num_rows($rs) != 0) {
        if($admin_sesion[0]["administrador"] != "0"){
            session_start();
            $_SESSION["nombre"] = $usu . " - Administrador";
            $_SESSION["pass"] = $pass;
        } else{
            session_start();
            $_SESSION["nombre"] = $usu . " - Usuario";
            $_SESSION["pass"] = $pass;
        }
    } else{
        header("Location: login.php");
    }
}   
?>