<?php
 include('../database.php') ;
  $obj =new boat();  
  $arr =$obj->selquery('name','album','','');
 
  foreach($arr as $k=>$v) {
    $new[$k] = $v['name'];
   }

   if(isset($_GET['pid']))
   {
    $album_name ="";
     $album_no =$obj->safe_str($_GET['pid']);
     $album_name =$arr[$album_no]['name'];
    
     $ses =$obj->selquery('img_name','image',['album_name'=>$album_name],'');
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/jquery_style.css">
    <link rel="stylesheet" href="jquery.flipster.min.css">
    <title>Images</title>
</head>

<body>
    <div class="hero">
        <div class="carousel">
            <ul>
                <?php   
                $len =count($ses);
                // print_r($ses);
                // die();
                $i=0;
               
                foreach($ses as $key=>$val)
                {
                    ?>
                <li><img src="../images/uploaded/<?php echo $val['img_name'] ?>" alt=""></li>
                    <?php
                }

                if($_SESSION['USER_ROLE']==0)
                {
                    ?>
                <li><a href="../linkbutton.php?id=4"><img src="../images/11.jpg" alt=""></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="jquery.flipster.min.js"></script>

    <script>
    $('.carousel').flipster();
</script>
</body>

</html>