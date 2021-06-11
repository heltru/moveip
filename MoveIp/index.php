<?php
echo '123';

$output =  shell_exec('php main.php');

echo "<pre>$output</pre>";