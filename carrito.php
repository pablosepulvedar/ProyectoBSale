<?php
session_start();

$mensaje="";

if (isset($_POST['btnAction'])) {
    switch ($_POST['btnAction']) {
        case 'Agregar':
            if(is_numeric(openssl_decrypt($_POST['id'], $COD, $KEY))){
                $ID=openssl_decrypt($_POST['id'], $COD,$KEY);
                $mensaje.="Ok ID correcto ".$ID;
            }else{
                $mensaje.="Ups.... ID incorrecto ".$ID;
            }

        if(is_string(openssl_decrypt($_POST['nombre'], $COD, $KEY))){
            $NOMBRE=openssl_decrypt($_POST['nombre'], $COD,$KEY);
            $mensaje.="Ok nombre correcto ".$NOMBRE;
        }else{
            $mensaje.="Ups.... nombre incorrecto ".$NOMBRE; break;}

        if(is_numeric(openssl_decrypt($_POST['precio'], $COD, $KEY))){
            $PRECIO=openssl_decrypt($_POST['precio'], $COD,$KEY);
            $mensaje.="Ok precio correcto ".$PRECIO;
        }else{
            $mensaje.="Ups.... precio incorrecto ".$PRECIO; break;}

        if(is_numeric(openssl_decrypt($_POST['cantidad'], $COD, $KEY))){
            $CANTIDAD=openssl_decrypt($_POST['cantidad'], $COD,$KEY);
            $mensaje.="Ok cantidad correcta ".$CANTIDAD;
        }else{
            $mensaje.="Ups.... Cantidad incorrecto ".$CANTIDAD; break;}
    
    if(isset($_SESSION['CARRITO'])){
        $producto=array(
            'ID'=>$ID,
            'NOMBRE'=>$NOMBRE,
            'PRECIO'=>$PRECIO,
            'CANTIDAD'=>$CANTIDAD
        );
        $_SESSION['CARRITO'][0]=$producto;
    }else{
        $NumeroProductos=count($_SESSION['CARRITO']);
        $producto=array(
            'ID'=>$ID,
            'NOMBRE'=>$NOMBRE,
            'PRECIO'=>$PRECIO,
            'CANTIDAD'=>$CANTIDAD
        );
        $_SESSION['CARRITO'][$NumeroProductos]=$producto;
    }

    break;
    }
}
?>