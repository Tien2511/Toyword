<?php
// Define PostgreSQL database server connect parameters.
define('PG_HOST', 'ec2-35-175-155-248.compute-1.amazonaws.com');
define('PG_PORT', 5432);
define('PG_DATABASE', 'd43kr8bhn1vaui');
define('PG_USER', 'uuswliaummzbij');
define('PG_PASSWORD', 'ad5d4d3d6af7c25999d1d13ed61975de09d43c6e3f049647f5d32b7032c62c1e');
define('ERROR_ON_CONNECT_FAILED', 'Connection failed!');

// Merge connect string and connect db server with default parameters.
function getDB() {
    return pg_pconnect (' host=' . PG_HOST .
                        ' port=' . PG_PORT .
                        ' dbname=' . PG_DATABASE .
                        ' user=' . PG_USER .
                        ' password=' . PG_PASSWORD
                       ) or die (ERROR_ON_CONNECT_FAILED);
}
?>