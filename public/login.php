<?php
include 'nav.php';
//formularz logowania start
$form = '<form method="post">
    <fieldset>
        <input type="text" name="login" />
        <input type="password" name="haslo" />
        <input type="submit" name="zaloguj" value="Zaloguj się" />
    </fieldset>
</form>';
//formularz logowania koniec

session_start();

if(isset($_SESSION['zalogowany'])) {
    //akcja gdy jestes juz zalogowany
}

elseif(isset($_POST['zaloguj'])) {

    //akcja po zalogowaniu;
}

else {
    //co ma sie dziac jak bledne logowanie
}


        echo $form;



/**
 * Created by PhpStorm.
 * User: student
 * Date: 2015-03-31
 * Time: 12:39
 */
?>