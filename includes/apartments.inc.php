<?php

require_once "dbh.inc.php";
require_once "models/apartments_model.inc.php";
require_once "controllers/apartments_contr.inc.php";

$results = get_apartments_details($pdo);

// function get_name(string|array $results)
// {
//     foreach ($results as $result) {
//         echo $result['apartment_name'];
//     }
// }

// function get_image(string|array $results)
// {
//     foreach ($results as $result) {
//         echo '<br/>';
//         echo $result['images_url'];
//     }
// }

// function get_price(string|array $results)
// {
//     foreach ($results as $result) {
//         echo $result['price_per_month'];
//     }
// }

// get_image($results);
// die();
