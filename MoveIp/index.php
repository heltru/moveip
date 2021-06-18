<?php
echo '123';

#$output =  shell_exec('php main.php');

#echo "<pre>$output</pre>";

require_once(
implode(
    DIRECTORY_SEPARATOR,
    [
        dirname(__DIR__),
        'Test.php'
    ]
)
);

$test = new Test();
$test->prn();