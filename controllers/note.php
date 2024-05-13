<?php

$config = require('config.php');
$db = new Database($config['database']);
$currentUser = 1;

$heading = 'Note';

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrFail();

authorise($note['user_id'] == $currentUser);

require "views/note.view.php";