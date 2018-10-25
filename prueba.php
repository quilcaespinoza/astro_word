<?php
define("DB_SERVER", "localhost");
define("DB_USER", "astrovis_kalin");
define("DB_PASSWORD", "e]K[eOog;].!");
define("DB_DATABASE", "astrovis_newatro");

$cn = new mysqli("190.239.111.172", "astrovis_kalin", "e]K[eOog;].!", "astrovis_newatro");

$sql = "SELECT * FROM usuarios";

$rslt = $cn->query($sql);

while ($row = $rslt->fetch_array()) {

    echo $row["user_nick"] . "<br>";
}

?>