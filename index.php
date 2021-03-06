<?php 
header('Content-type: text/html; charset=utf-8');
require_once 'connect.php';
require_once 'funcs.php';

if(!empty($_POST)) {
    save();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

$messages = get_mess();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>гостевая книга</title>

    <style>
    .messages {
        border: 1px solid black;
        padding: 1rem;
        margin: 1rem;
    }
    
    </style>
</head>
<body>  

    <form action="index.php" method="POST">
    <p>
        <label for="name">Name</label><br/>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="text">Text</label><br/>
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
    </p>
    <button type="submit">Submit</button>
    </form>
    <hr/>

    <?php if(!empty($messages)): ?>
        <?php foreach($messages as $message):?>            

            <div class="messages">
                <p>Author: <?=nl2br($message['name']) ?> | Date: <?=nl2br($message['date'])?></p>
                <div><?=nl2br(htmlspecialchars($message['text'])) ?></div>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>