<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
    header("Location: index.php");

}

if (isset($_POST['btn-submit']))
{



$dname = mysql_real_escape_string($_POST['dname']);
$name = mysql_real_escape_string($_POST['name']);
$email = $_POST['email'];
$cont = $_POST['contact'];
$ward = $_POST['ward'];
$time = $_POST['time'];
$date= $_POST['date'];
$address = $_POST['address'];

$query = "SELECT * FROM patient";
$result = mysql_query($query);

while ($row = mysql_fetch_array($result))
  
  {

    if ($row['email']==$email || $row['date']==$date)
      {
        $j=1;
     }
  }

  if ($j==1) {
    ?>
       <script>alert('Warning!!! This Name and The time are conflict with Others is already Registerd');</script>
       <?php
  }

  elseif (mysql_query("INSERT INTO patient(name,email,doct,contact,wardno,time,date,address) VALUES('$name','$email','$dname','$cont','$ward','$time','$date','$address')"))
     {
        
       ?>
        <script>alert('Successfully Registered :)');</script>
       <?php
        
      }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Hospital Management | Patient Dashboard</title>

</head>

<body>

<!--Menu -->

<div align="center" style="margin-left: -350px;">
  <div style="margin-top: px;">
  <a href="home.php"><button>Doctor</button></a>
  </div>
  <div style="margin-left:135px;;margin-top:-21px;">
    <a href="patient.php"><button style="border-color: black;">Patients</button></a>
    </div>
  <div style="margin-left: 268px;margin-top:-21px;">
    <a href="nurse.php"><button >Nurse</button></a>
    </div>
  <div style="margin-left: 410px;margin-top:-21px;">
    <a href="executive.php"><button >Executive</button></a>
    </div>
  <div style="margin-left: 575px;margin-top:-37px;">
   <p>Hi <a ><?php session_start();echo $_SESSION ['user']; echo " ";?></a>
    <a href="signout.php?logout"><button name="logout">Sign Out</button></p></a>
    </div>
</div>
<!--Header -->

  <div >
    <h2><div align="center"> Welcome to Hospital Management
    </div></h2>
   </div>
    
<!--List -->
<section>
  <h3 align="center">List</h3>
    <div align="center">
      <table >
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Doctor Name</th>
            <th>Ward Number</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Time</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
                
            $query = "SELECT * FROM patient";
            $result = mysql_query($query);
          
            while ($row = mysql_fetch_assoc($result))
              {
                  
                  $dep ++;
              }
         
            ?>
            <?php
            $i=0;
            for($i=1; $i<=$dep; $i++)
              {
                if($i<=$dep)
                { ?>
          <tr>
            <td>
            
              <?php
                
                $query = "SELECT * FROM patient WHERE id=$i";
                $result = mysql_query($query);
              
                while ($row = mysql_fetch_assoc($result))
                  {
                      
                      $id=$row['id'];
                  }
             
                ?><?php echo $id;?>
            </td>
            
            <td>
              
                <?php
               
                  $query = "SELECT * FROM patient WHERE id=$i";
                  $result = mysql_query($query);
                
                  while ($row = mysql_fetch_assoc($result))
                    {
                        
                        $name=$row['name'];
                    }
               
                  ?><?php echo $name;?>
              
            </td>
            
            <td>

              <?php
              
                $query = "SELECT * FROM patient WHERE id=$i";
                $result = mysql_query($query);
              
                while ($row = mysql_fetch_assoc($result))
                  {
                      
                      $doct=$row['doct'];
                  }
             
                ?><?php echo $doct;?>
            </td>

            <td>
              <?php
              
                $query = "SELECT * FROM patient WHERE id=$i";
                $result = mysql_query($query);
              
                while ($row = mysql_fetch_assoc($result))
                  {
                      
                      $ward=$row['wardno'];
                  }
             
                ?><?php echo $ward;?>
            </td>

            <td>

              <?php
              
                $query = "SELECT * FROM patient WHERE id=$i";
                $result = mysql_query($query);
              
                while ($row = mysql_fetch_assoc($result))
                  {
                      
                      $cont=$row['contact'];
                  }
             
                ?><?php echo $cont;?>
            </td>

            <td>

              <?php
          
                $query = "SELECT * FROM patient WHERE id=$i";
                $result = mysql_query($query);
              
                while ($row = mysql_fetch_assoc($result))
                  {
                      
                      $addd=$row['address'];
                  }
             
                ?><?php echo $addd;?>
            </td>
            <td>
              <?php
        
              $query = "SELECT * FROM patient WHERE id=$i";
              $result = mysql_query($query);
            
              while ($row = mysql_fetch_assoc($result))
                {
                    
                    $timee=$row['time'];
                }
           
              ?><?php echo $timee;?>
            </td>

            <td>
              <?php
            
                $query = "SELECT * FROM patient WHERE id=$i";
                $result = mysql_query($query);
              
                while ($row = mysql_fetch_assoc($result))
                  {
                      
                      $dayy=$row['date'];
                  }
             
                ?><?php echo $dayy;?> 
            </td>
         
            <?php
                  }
                  
                  }
                ?>
          </tr>
        </tbody>
      </table>
    </div>
</section>

<!--New Patient Account -->

<section >
  <h3 align="center">New</h3>
  <div style="margin-left: 580px;">
    <div style="padding: 10px;margin-right: 555px;border: 1px;border-style: solid;">
      <form method="post">
        <div style="padding: 10px;border: 1px;border-style: solid;">
          <div>
            <label>Fullname
            </label>
            <div>
              <input   type="text" name="name" placeholder="enter fullname" required>
              </div>
          </div>
          <div >
              <label>Email
              </label>
              <div>
                <input   type="email" name="email" placeholder="enter email" required>
                </div>
          </div>
          <div >
              <label  >Contact
              </label>
              <div>
                <input  type="text" name="contact" placeholder="enter phonenumber" required>
                </div>
          </div>
          <div >
              <label  >Time
              </label>
              <div>
                  <input  type="text" name="time" placeholder="enter time" required></div>
          </div>
          <div >
              <label  >Date
              </label>
              <div>
                <input  type="text" name="date" placeholder="dd/mm/yyyy" required>
                </div>
          </div>
          <div >
              <label  >Address
              </label>
              <div >
                <input  type="text" name="address" placeholder="enter address" required>
                </div>
          </div>
          <div >
            <label  >Doctor Name</label>
            <div >
              <select   name="dname" required="">
                <option>Select</option>
                  <?php
                    $query=mysql_query("select * from doct")or die(mysql_error());
                    while($row=mysql_fetch_array($query))
                    {
                      ?>
                      <option value="<?php echo $row['name']?>">
                        <?php echo $row['name']?>
                      </option>
                      <?php
                    }
                  ?>
              </select>
            </div>
          </div>
          <div >
            <label  >Ward Number
            </label>
            <div >
              <select  style="padding-right: 90px;" name="ward" required="">
                <option>Select</option>
                  <?php
                    $query=mysql_query("select * from ward")or die(mysql_error());
                    while($row=mysql_fetch_array($query))
                    {
                      ?>
                      <option value="<?php echo $row['no']?>">
                        <?php echo $row['no']?>
                      </option>
                      <?php
                    }
                  ?>
                </select>
            </div>
          </div>
        </div>
        <button style="margin-left: 55px;margin-top: 10px;"name="btn-submit" type="submit" >Submit</button>
      </form>
    </div>
  </div>
</section>

<hr>
    <div align="center"><footer> 2017 &copy; Hospital Management by Shathi 
    </footer></div>
<hr>

</body>
</html>