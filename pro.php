<?php

if (isset($_POST['q']) && ($_POST['q'] == "_p")) {
    $res = reader();
    $content = ($res[0] + $_POST['v']);
    $content .= ',' . ($res[1] + 1);
    $fp = fopen('store.txt', 'w');
    fwrite($fp, $content);
    fclose($fp);
}
$res = reader();
// on first start total vot will be 0
if ($res[1] == 0)
    $calc = 0;
else
    $calc = round(($res[0] / $res[1]));
echo $calc;

function reader() {
// read values from text file
    $read = file_get_contents('store.txt');

// devide two part
    $res1 = explode(",", $read);
    return $res1;
}

?>