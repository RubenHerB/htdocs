<?php
echo '<ul>';
foreach($_POST as $ind=>$con){
    echo "<li>$ind: $con</li>";
}
echo '</ul>';
?>