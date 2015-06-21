
<?php 
require('header.php');
include('source.php');
?>


<strong>Echo data</strong>


<?php 
foreach ($product_categories as $categories) {
echo 'Category name: '. $categories['name'] . '<br>';
}

?>


<?php 
require('footer.php');

?>

