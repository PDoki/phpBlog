<?php

require_once 'app/helpers.php';
start_session('motivate');
session_destroy();
header('location: login.php');