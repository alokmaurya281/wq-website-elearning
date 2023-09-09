<?php 

if(isset($_POST['search'])){
    $keyword = $_POST['keyword'];
    header("Location:http://localhost/website/search_results.php?keyword=$keyword");
}
else{
    echo "not found";
}


?>