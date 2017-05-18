<?php
echo '<img src="waiting.gif" >';
$host="localhost";
$user="root";
$password="";
$dbname="plmb";
$coms_conect = new mysqli($host, $user, $password, $dbname);
 
$query="SHOW TABLES";
$result = $coms_conect->query($query);
	while($row = $result->fetch_assoc()) {
		$coms_conect->query("DROP TABLE IF EXISTS ".$dbname.'.'.$row['Tables_in_' . $dbname]);
	}

function recursiveRemoveDirectory($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}

recursiveRemoveDirectory('modules/');
 
recursiveRemoveDirectory('database/migrations/');


function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 
recurse_copy('reset_files/migrations','database/migrations');
recurse_copy('reset_files/modules','modules');
copy('reset_files/composer.json','composer.json');
copy('reset_files/app.php','config/app.php');

system("php artisan migrate"); 
system("composer dump-autoload");
header('Location: /crud/public/admin/modulesbuilder');
?>
