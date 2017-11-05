<?php 
namespace Teorihandbok\views;

include '../templates/footer.php'; 
include '../templates/header.php'; 

require_once '../src/Core/connection.php';

$posts ="SELECT * FROM posts WHERE category = 1";

$sth = $connection->prepare($query);
$sth->execute();

return $sth->fetchAll();

echo '<pre>';
print_r($posts);
echo '</pre>';
