<?php
include('header.php');  
$obj =new boat();


if(isset($_SESSION['QR_USER_LOGIN']))
{
    if($_SESSION['USER_ROLE'] ==0)
    {
?>

<div class="row space">
        
                <?php 
                $i=0;
                $cimage =['images/1.jpg','images/2.png','images/3.jpg'];
                $cdesc =[
                    'Create,Publish,Unpublish your albums. Inside these albums you can add or delete photos.',
                    'Create new users to your system depending on the type of user. Normal or Premium User. Provide roles to them.',
                    'You can logout .'];
                $cbutton =['Explore Album','Explore Users','Log Out'];
                $clink =['linkbutton.php?id=0','linkbutton.php?id=1','logout.php'];
                while($i<3)
                {
                ?>
                 <div class="col-4">
                 <div class="card" style="width: 18rem;">
                        <img src=<?php echo $cimage[$i] ?> class="card-img-top" alt="...">
                        <div class="card-body">
                           
                            <p class="card-text"><?php echo $cdesc[$i] ?></p>
                            <a href=<?php echo $clink[$i] ?> class="btn btn-primary"><?php echo $cbutton[$i] ?></a>
                        </div>
                        </div>
                 </div>    
                <?php
                $i++;
                }
                ?>
       
</div>

<?php
}

else if($_SESSION['USER_ROLE'] !=0)
{

    if($_SESSION['USER_ROLE'] ==2)
    {
        ?>
        <div class="upgrade bg-warning">
           <b> Upgrade to Premium and enjoy many benefits!</b>
        </div>

    <?php
    }
?>


<div class="row space">
    
            <?php 
            $i=0;
            $ctitle =['Profile','Gallery'];
            $cdesc =[
                'See your profile information .',
                'Visit album and see our collages been made for better user experience',
                'You can logout .'];
                $cimage =['images/6.jpg','images/1.jpg'];
            $cbutton =['Explore Profile','Explore Gallery','Log Out'];
            $clink =['linkbutton.php?id=0','gallery.php'];
            while($i<2)
            {
            ?>
             <div class="col-6">
                <div class="card">
                <img src="<?php echo $cimage[$i] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $ctitle[$i] ?></h5>
                    <p class="card-text"><?php echo $cdesc[$i] ?></p>
                    <a href=<?php echo $clink[$i] ?> class="btn btn-primary"><?php echo $cbutton[$i] ?></a>

                </div>
                </div>
            </div>
            <?php
            $i++;
            }
            ?>
   
</div>

<?php
}
}
else
{
    $obj->redirect('login.php');
}
include('footer.php');
?>