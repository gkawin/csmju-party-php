<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script src='<?=Conf::_URL?>/js/libs/jquery-1.9.0/jquery.min.js' type='text/javascript'></script>
        <?php
        if (count($this->getCss())) {
            foreach ($this->getCss() as $item) {
                echo $item;
            }
        }
        if (count($this->getJS())) {
            foreach ($this->getJS() as $item) {
                echo $item;
            }
        }
        ?>
		<link href= '<?=Conf::_URL?>/css/main.css' type='text/css' rel='stylesheet'/>
		<script src='<?=Conf::_URL?>/js/main.js' type='text/javascript'></script>
    </head>
    <body>
