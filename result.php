<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
            name="viewport"
            content="width=device-width"
    >
    <meta
            http-equiv="X-UA-Compatible"
            content="ie=edge"
    >
    <title>Результат</title>
    <link
            rel="stylesheet"
            href="assets/styles/result.css"
    >
</head>
<body>
<div class="container">
    <div class="wrapper">
        <div class="form">
            <h3 class="heading">Результат парсинга</h3>
            <a href="index.php" class="btn">Вернуться назад</a>
                <?php
                require 'classes/database.php';
                $count = 0;
                $database = new Database();
                $database->databaseConnect();
                $sql = "SELECT * FROM Parse";
                if($result = $database->connect->query($sql)){
                    echo "<table class='table'><tr><th class='count'>#</th><th>Артикул</th><th>Название товара</th><th>Цена</th><th>Остаток</th></tr>";
                    foreach($result as $row){
                        $count++;
                        echo "<tr>";
                        echo "<td class='count'>" . $count . "</td>";
                        echo "<td>" . $row["article"] . "</td>";
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>" . $row["balance"] . "</td>";
                        echo "</tr>";
                    }
                }
                if ($count === 0) {
                    echo '<h3 class="danger-text">Ничего не найдено. Попробуйте ещё раз...</h3>';
                }
                $database->databaseConnectClose();
                ?>
        </div>
    </div>
</div>
</body>
</html>