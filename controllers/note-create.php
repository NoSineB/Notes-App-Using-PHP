<?php

require 'Validator.php';

$heading = 'Add Note';

$config = require('config.php');

$db = new Database($config['database']);


if($_SERVER["REQUEST_METHOD"]== "POST"){

    $errors = [];

    if(! Validator::string($_POST["body"], 1, 1000)){
        $errors['body'] = "Enter Body not more than 1000 characters";
    }

    if(empty($errors)){
        $db->query("INSERT INTO `notes` (`id`, `body`, `user_id`) VALUES (DEFAULT, :body, :user_id);", [
            "body"=>$_POST["body"],
            "user_id"=>1
        ]);
        return routeToController('/notes', $routes);
    }

    
}

require("views/note-create.view.php");

