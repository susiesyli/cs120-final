<!DOCTYPE HTML>  
<html>
    <head>
        <?php
            $server = "localhost";
            $userid = "u3fi6z83zcg2y";
            $pw = "artify1234";
            $db = "dbgylh79jpnkih";
        ?>
    </head>
    <body>
        <div class="product-options">
        <?php
            $conn = new mysqli($server, $userid, $pw);

            $conn->select_db($db);

            $result = $conn->query("SELECT * FROM products;");

            while ($row = $result->fetch_assoc()) {
                printf(
                    '<div class="product-options" data-product="%s"><img class="product-image" src="%s"><div><h3>%s</h3><p>%s</p><p class="price">From $%s</p></div>',
                    $row['name'],
                    $row['image_link'],
                    $row['name'],
                    $row['description'],
                    $row['price']
                );
            }
            $conn->close();
        ?>
        </div>
    </body>
</html>
