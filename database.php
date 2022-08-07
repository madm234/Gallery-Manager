<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
//using inheritance and making it like a parent class so that whosoever extends it can access it's method of connecting to database. 
class db{
    private $hostname; //private so that it can be only accessed inside it's class due to security reasons
    private $username;
    private $password;
    private $dbname;


    //protected function so that only child class can access it.
    protected function connect()
    {
        $this->hostname ='localhost';
        $this->username ='root';
        $this->password ='';
        $this->dbname ='test';
        $con =mysqli_connect( $this->hostname,$this->username,$this->password,$this->dbname);
        return $con;
    }
}



//made a child class of db 
class boat extends db{
    
    //this function will be called whenever we want to use select query 
    public function selquery($data='*',$user,$condition_where=[],$order_by='')
    {
        $sql ="select $data from $user ";
       
        if($condition_where!='')
        {
            $sql.='where ';
            $len =count($condition_where);
            $i =1;
            foreach($condition_where as $key=>$val)
            {
                if($i!=$len)
                {
                    $sql.="$key='$val' and ";
                }
               else
               {
                  $sql.="$key='$val' ";
               }
                $i++;
            }
        } 
        if($order_by!='')
        {
            $sql.=" order by $order_by";
        }
 
        // echo ($sql);
       $res =mysqli_query($this->connect(),$sql);
        if(mysqli_num_rows($res)>0)
        {
            $arr =array();
            while($row =mysqli_fetch_assoc($res))
            {
              $arr[] =$row;
            }
            return $arr;
        }
        else
        {
            return [];
        }
    }


 //this function will be called whenever we want to use insert query 
 public function insquery($user,$ins_values)
 {
    if($ins_values!=[])
    {
        foreach($ins_values as $key=>$val)
        {
            $key_arr []=$key;
            $val_arr []=$val;
        }
        $key_arr1 =implode(",",$key_arr);
        $val_arr2 =implode("','",$val_arr);

        $val_fixed="'".$val_arr2."'";
        $sql ="insert into $user($key_arr1) values($val_fixed)";
        // die($sql);
        // echo($sql);
        $res =mysqli_query($this->connect(),$sql); 
    }
 }


 //this function will be called whenever we want to use delete query 
 public function delquery($user,$condition_where)
 {
    $sql ="delete from $user ";
   
    if($condition_where!='')
        {
            $sql.=' where ';
            $len =count($condition_where);
            $i =1;
            foreach($condition_where as $key=>$val)
            {
                if($i!=$len)
                {
                    $sql.="$key='$val' and";
                }
               else
               {
                  $sql.="$key='$val' ";
               }
                $i++;
            }
            echo($sql);
        } 
        $res =mysqli_query($this->connect(),$sql); 
 }


 public function updquery($user,$condition_set,$condition_where,$where_value)
 {
    $sql ="update $user set ";
    $len =count($condition_set);
    $i =1;

    foreach($condition_set as $key=>$val)
    {
        if($i!=$len)
        {
            $sql.="$key='$val' and ";
        }
       else
       {
          $sql.="$key='$val'";
       }
        $i++;
    }
    $sql.=" where $condition_where='$where_value' ";
        $res =mysqli_query($this->connect(),$sql); 
    // print_r($sql);
 }


//  getting safe query
 function safe_str($str)
 {
    if($str!='')
    {
        return mysqli_real_escape_string($this->connect(),$str);
    }
 }

 //redirect anywhere with this
 function redirect($str)
 {
    ?>

    <script>
    window.location.href ='<?php echo $str ?>';
    </script>

    <?php 
 }

}
?>