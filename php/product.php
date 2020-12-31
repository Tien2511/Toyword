<?php
include('database.php');

if ( getDB() ) {
    $category = trim($_POST['category']);
    $subcategory = trim($_POST['subcategory']);

    $query = 'SELECT * FROM product';
    
    if ( isset($subcategory) && $subcategory != '' ) {
        $query = "  SELECT product.*
                    FROM product, product_subcategory, subcategory
                    WHERE product.id = product_subcategory.product_id
                    AND subcategory.id = product_subcategory.subcategory_id
                    AND subcategory.name = '$subcategory'";
    } else if ( isset($category) && $category != '' ) {
        $query = "  SELECT DISTINCT product.*
                    FROM product, product_subcategory
                    WHERE product.id = product_subcategory.product_id
                    AND product_subcategory.subcategory_id IN ( SELECT subcategory.id
                                                                FROM category, subcategory
                                                                WHERE subcategory.category_id = category.id
                                                                AND category.name = '$category'
                                                               )";
    }
    
    $result = pg_query($query);

    if ($result) {
        $arr = pg_fetch_all($result);
        echo json_encode($arr);
    }
}
?>