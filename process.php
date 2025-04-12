<?php
include 'form_handler.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $handler = new FormHandler($_POST['name']);
    echo $handler->getResponse();
} else {
    echo 'No input received';
}
