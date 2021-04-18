<?php
require "functions/load.php";
Auth::logOut();
Url::redirect('/login.php');