<?php
include('../database.php');
$obj =new boat;

if(isset($_FILES['my_image']))
{
    $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
    $album =$_POST['album'];

    if ($error === 0) {
		if ($img_size > 12500099897) {
			$em = "Sorry, your file is too large.";
		    // header("Location: index.php?error=$em");
            die();
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../images/uploaded/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				// $sql = "INSERT INTO image(img_name) 
				//         VALUES('$new_img_name')";
				// mysqli_query($conn, $sql);

                $obj->insquery('image',['img_name'=>$new_img_name,'album_name'=>$album]);
				$obj->redirect('../linkbutton.php?id=4');
			}else {
				$em = "You can't upload files of this type";
		        $obj->redirect('../linkbutton.php?id=4');
			}
		}
	}else {
		$em = "unknown error occurred!";
		$obj->redirect('../linkbutton.php?id=4');
	}

}
else {
	$obj->redirect('../linkbutton.php?id=4');
}

?>