<?php

require base_dir('Core/Validator.php');

$heading = 'Add Note';

$config = require base_dir('config.php');

$db = new Database($config['database']);

$errors = [];


if($_SERVER["REQUEST_METHOD"]== "POST"){

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

view('notes/create.view.php', [
    'heading' => 'Add Note',
    'errors' => $errors
]);
