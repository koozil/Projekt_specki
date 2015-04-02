<?php
  include 'nav.php';
  include 'database.class.php';
  
  ob_start();
  
  
  
  include 'page/index.php';
  
  ob_end_flush();
