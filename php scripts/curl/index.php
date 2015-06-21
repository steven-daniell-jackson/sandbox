
<?php 
require('header.php');
include('source.php');
?>







<?php 
foreach ($product_categories as $categories) {
echo 'Category name: '. $categories['name'] . '<br>';
}

?>

<strong>Echo data</strong>

<?php 
require('footer.php');

?>

