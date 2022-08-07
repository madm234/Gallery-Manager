<?php
include('header.php');
$obj =new boat();



if(isset($_GET['id']) && isset($_GET['status']) )
{
    $pub =$obj->safe_str($_GET['status']);
    $id =$obj->safe_str($_GET['id']);

    if($pub!="publish")
    {
      $pub =1;
    }
    else
    {
      $pub =0;
    }
    // mysqli_query($con,"update staff set status='$status' where id='$id'");
    // $obj->updquery('album',['publish'=>$pub],'id',$id);
    print_r( $obj->updquery('album',['publish'=>$pub],'id',$id));
    // $obj->redirect("staff.php");
}



        $str ='';
       if($_SESSION['USER_ROLE']!=0)
       {
        if($_SESSION['USER_ROLE']==1)
       { $str =['publish'=>'1'];}
        else
        if($_SESSION['USER_ROLE']=2)
        {$str =['to_show'=>'1','publish'=>'1'];}
       } 

    $res =$obj->selquery('*','album',$str,'');
    $seen ="";
    
    $len =count($res); 
    if($len==0)
    { ?>
        <h1 style="text-align: center;">No Album Found!</h1>
   <?php 
   die();
    }
    $i=0;
    
    if($len>0)
    {?>

    
        <div class='row'>
       
       <?php  while($i!=$len)
        {
            if($res[$i]['to_show'] ==0)
            {$seen ='Premium';}
            else
            {$seen ='all';} 
            ?>

           <div class="col-4 space">
           <div class="card " style="width: 18rem;">
            <img src="images/1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $res[$i]['name'] ?></h5>
                <p class="card-text"><?php echo $res[$i]['descrip'] ?></p>
            </div>
           
            <?php
            if($_SESSION['USER_ROLE']==0)
            {
            ?>
             <ul class="list-group list-group-flush">
                <li class="list-group-item">Can be seen to <b><?php echo $seen ?></b> user</li>
            </ul>

            <?php
            } ?>

            <div class="card-body">
                <?php if($_SESSION['USER_ROLE']==0){ 
                    
                    $pub ="publish";
                    $strpub ="Unpublish";
                    if($res[$i]['publish']==0)
                    {
                        $pub ="unpublish";
                        $strpub ="Publish";
                    }
                    ?>
                    
                
                    <a href="?id=<?php echo $res[$i]['id']?>&status=<?php echo $pub ?>">
                    <?php if($strpub=="Publish"){ ?>
                    <button class="btn btn-warning" ><?php echo $strpub ?></button></a> 
                    <?php }else{ ?>
                    <button class="btn btn-dark" ><?php echo $strpub ?></button></a> 
                    <?php }?>
                <?php } ?>
                    <a  href="jquery/index.php?pid=<?php echo $i ?>" class="btn btn-success card-link">Watch</a>
                    
               </div>

               
            </div>
            <br>
           </div>
            
            <?php
            $i++;
        }
        ?>
        </div>
    <?php }

include('footer.php');
?>