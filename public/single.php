<?php
include 'database.class.php';

ob_start();

include 'page/nav.php';


include 'page/single.php';
include 'page/footer.php';

ob_end_flush();
