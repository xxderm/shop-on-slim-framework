<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
</head>
<body>
    <?
        echo $this->name;
        include_once dirname(__DIR__)."\models\DB connection.php";
        $db = connection::getInstance();
        foreach ($db->getConnection()->products as $item)
        {
            echo $item["Name"]."\r\t";
        }
    ?>
</body>
</html>