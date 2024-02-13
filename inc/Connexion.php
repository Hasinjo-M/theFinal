<?php

function dbconnect() {
    static $connect = null;
    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'root', '', 'final');
    }
    return $connect;
}

?>
<?php ?>