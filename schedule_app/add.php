<?php
    $task = trim($_POST['task']);
    $date = trim($_POST['date']);

    if (empty($task) || empty($date)) {
        echo '<h2>Incorrect input</h2>';
        exit();
    }

    require 'configDB.php';

    $sql = 'INSERT INTO tasks(task, date) VALUES(:task, :date)';
    $params = ['task' => $task, 'date' => $date];
    $query = $pdo->prepare($sql);
    $query->execute($params);

    header('Location: /');


?>