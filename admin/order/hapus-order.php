<?php 
require "../functions.php";

$id = $_GET["id"];

if (hapusOrder($id) > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'data-order.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'data-order.php';
        </script>
    ";
}

?>