<?php
session_start();
require_once '../database/db-con.php';
// print_r($_SESSION);
?>
<?php
session_destroy();
?>
<script>
    window.location='login.php';
</script>