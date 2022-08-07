<?php
include('header.php');
$obj =new boat();
$id ="";
$msg ="Album is not yet published and will not be visible to users. Publish it from publish section";


    if(isset($_POST['submit']))
    {
       $name =$obj->safe_str($_POST['name']);
       $desc =$obj->safe_str($_POST['desc']);
       $toshow =$obj->safe_str($_POST['toshow']);

    $res =$obj->insquery('album',['name'=>$name,'to_show'=>$toshow,'descrip'=>$desc]);
    $msg ="Added Successfully";
    }

    if(isset($_GET['id']))
    {
        $id =$obj->safe_str($_GET['id']);
        if($id<0 || $id>4)
        {
            $obj->redirect('logout.php');
            die();
        }
    }

    //id =0 means album section for admin.
    if($id==0)
    {
?>
    
    <?php if($id==0) {?>

    <div class="row space">

     <?php
        $i=0;
        $cimage =['images/4.jpg','images/5.jpg','images/3.jpg'];
        $cdesc =[
            'See all existing albums and images inside them and publish or unblish them accordingly.',
            'Add new Albums in your gallery with multiple images add on option',
            'Navigate to your previous admin user page'];
        $cbutton =['All Albums','Add Album','Go back'];
        $icon =['fa-solid fa-eye','fa-solid fa-plus','fa-solid fa-backward'];
        $clink =['gallery.php?id=5','linkbutton.php?id=4','main.php'];
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
    }
    
    //id=4 means adding new album in albums section.
    else if($id==4)
    {   
    ?>

<!-- add albums -->
<div class="row">
<div class="col-6">
<div class="container cardsty">
    <div class="card wotta" style="width: 18rem;">
  <div class="card-body">
  <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name:</label>
    <input type="text" class="form-control" name="name" >
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description:</label>
    <input  required name="desc" type="text" class="form-control">
  </div>

   <select name="toshow" id="">
    <option>---Select album visibility---</option>
    <option value="0">Visible to Premium only</option>
    <option value="1">Visible to both</option>
   </select>
<br>
<br>
  <div>
    <p style="color: red;"><?php echo $msg ?></p>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
  </div>
</div>
</div>
</div>


<!-- add images -->
<div class="col-6">
<div class="container cardsty">
    <div class="card wotta" style="width: 18rem;">
  <div class="card-body">
  <form method="post" action="upload_image/upload.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Album:</label>
    <select required name="album" id="">
        <option >Choose a album</option>
        <?php  
        $ses =$obj->selquery('*','album','','');
        $i=0;
        $count =count($ses);
        while($i!=$count){
        ?>
        <option value="<?php echo $ses[$i]['name'] ?>"><?php echo $ses[$i]['name'] ?></option>
        <?php $i++;} ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Choose image:</label>
    <input required name="my_image" type="file" class="form-control">
  </div>

<br>
  <div>
    <p style="color: red;"><?php echo $msg ?></p>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
  </div>
</div>
</div>
</div>
 
</div>
    <?php
    }  else if($id==1){ 
        $caas =$obj->selquery('*','user','','');
        ?>
        <div class="table-responsive bose">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">User Type</th>
      <th scope="col">Name</th>
      <th scope="col">Password</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php  
    $len =count($caas);
    $i=0;
    while($i!=$len){
    ?>
    <tr>
      <th scope="row"><?php echo $caas[$i]['role'] ?></th>
      <td><?php echo $caas[$i]['name'] ?></td>
      <td><?php echo $caas[$i]['password'] ?></td>
      <td><?php echo $caas[$i]['email']?> </td>
    </tr>
     <?php $i++; } ?>   
  </tbody>
  </table>
</div>
    
<?php
     }
include('footer.php');
?>