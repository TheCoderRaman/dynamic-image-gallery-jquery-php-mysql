<!DOCTYPE html>
<html lang="en-US">
<head>
<title>How to Create Dynamic Image Gallery with jQuery, PHP & MySQL by Ralny</title>
<!-- fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">
<!-- JS library -->
<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- fancybox JS library -->
<script src="fancybox/jquery.fancybox.js"></script>

<script type="text/javascript">
    $("[data-fancybox]").fancybox({ });
</script>

<style type="text/css">
.gallery img {
    width: 20%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
}
</style>
</head>
<body>
<div class="container">
	<h1>Dynamic Image Gallery with jQuery, PHP & MySQL by Ralny</h1>
    <div class="gallery">
        <?php
        //Include database configuration file
        include('dbConfig.php');
        
        //get images from database
        $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");
        
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $imageThumbURL = 'images/thumb/'.$row["file_name"];
                $imageURL = 'images/'.$row["file_name"];
        ?>
            <a href="<?php echo $imageURL; ?>" data-fancybox="group" data-caption="<?php echo $row["title"]; ?>" >
                <img src="<?php echo $imageThumbURL; ?>" alt="" />
            </a>
        <?php }
        } ?>
    </div>
</div>
</body>
</html>