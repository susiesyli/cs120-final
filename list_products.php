<!DOCTYPE HTML>  
<html>
    <head>
        <?php
            $server = "carterb1.sgedu.site";
            $userid = "u3fi6z83zcg2y";
            $pw = "artify1234";
            $db = "dbgylh79jpnkih";
        ?>
    </head>
    <body>
        <?php
            $conn = new mysqli($server, $userid, $pw);

            $conn->select_db($db);

            $result = $conn->query("SELECT * FROM products;");

            while ($row = $result->fetch_assoc()) {
                printf(
                    '<div class="product-option" data-product="%s" product-id="%s"><img class="product-image" src="images/%s"><div><h3>%s</h3><p>%s</p><p class="price">From $%s</p></div></div>',
                    $row['name'],
                    $row['productid'],
                    $row['image_link'],
                    $row['name'],
                    $row['description'],
                    $row['price']
                );
            }
            $conn->close();
        ?>
    </body>
</html>
