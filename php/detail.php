<?php
if (isset($_POST['id'])) {
    include('database.php');

    if ( getDB() ) {
        $id = intval($_POST['id']);

        $query = "  SELECT product.*, subcategory.name AS subcategory_name
                    FROM product, product_subcategory, subcategory
                    WHERE product.id = $id
                    AND product.id = product_subcategory.product_id
                    AND subcategory.id = product_subcategory.subcategory_id
                 ";

        $result = pg_query($query);

        if ($result) {
            $arr = pg_fetch_all($result);
            echo json_encode($arr);
        }
    }
}
?>