#!/usr/bin/php
<?php
// use this if your php.ini does not allow shell etc #!/usr/bin/php -nia
// Links do crontab

$mysql_root_pwd = "";

function formattime() { return date("Y-m-d H:i:s"); }

echo "Starttime: ". formattime();

$con = mysqli_connect("localhost","root","$mysql_root_pwd");
$r = mysqli_query($con, "show databases");

while( $arr = mysqli_fetch_array($r) ){
        $db = $arr[0];
        echo "\n\nExporting $db\n" . formattime() . "\n";
         
        echo shell_exec("/usr/bin/mysqldump  -u root --password='$mysql_root_pwd' $db > ".$db.".sql");
}
`gzip -f *.sql`;
`chmod 0600 *.sql.gz`;
echo "\n\nEndtime: ". formattime() . "\n\n";

echo mysqli_error($con);
mysqli_close($con);
