<?php
  session_start();
  include_once 'dbconnect.php';

  if(!isset($_SESSION['user']))
    {
        header("Location: index.php");

    }

  if(!isset($_SESSION['user']))
    {
        header("Location: index.php");

    }

  if (isset($_POST['btn-submit']))
    {

      $name = mysql_real_escape_string($_POST['name']);
      $cont = $_POST['contact'];
      $desig= $_POST['desig'];
      $salary= $_POST['salary'];

      $query = "SELECT * FROM exec";
      $result = mysql_query($query);

      while ($row = mysql_fetch_array($result))
        
        {

          if ($row['name']==$name)
            {
              $j=1;
           }
        }

        if ($j==1)
          {
            ?>
               <script>alert('Warning!!! This Name or Email is already Registerd');</script>
               <?php
          }

        elseif (mysql_query("INSERT INTO exec(name,contact,desig,salary) VALUES('$name','$cont','$desig','$salary')"))
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
    
    <title>Hospital Management | Executive Dashboard</title>
    
</head>

<body>


<!--Menu -->

<div align="center" style="margin-left: -350px;">
  <div style="margin-top: px;">
  <a href="home.php"><button>Doctor</button></a>
  </div>
  <div style="margin-left:135px;;margin-top:-21px;">
    <a href="patient.php"><button>Patients</button></a>
    </div>
  <div style="margin-left: 268px;margin-top:-21px;">
    <a href="nurse.php"><button >Nurse</button></a>
    </div>
  <div style="margin-left: 410px;margin-top:-21px;">
    <a href="executive.php"><button style="border-color: black;">Executive</button></a>
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
           
<h2 align="center">List</h2>
<section >

    <div align="center">
      <table >
            <thead>
              <tr>
                <th>#</th>
                <th> Name</th>
                <th> Email</th>
                <th> Department</th>
                <th> Contact</th>
                <th> Ward Number</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
                $query = "SELECT * FROM exec";
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
              
                  $query = "SELECT * FROM exec WHERE id=$i";
                  $result = mysql_query($query);
                
                  while ($row = mysql_fetch_assoc($result))
                    {
                        
                        $id=$row['id'];
                    }
               
                  ?><?php echo $id;?>
                
              </td>
              <td>
                
                <?php
             
                  $query = "SELECT * FROM exec WHERE id=$i";
                  $result = mysql_query($query);
                
                  while ($row = mysql_fetch_assoc($result))
                    {
                        
                        $name=$row['name'];
                    }
               
                  ?><?php echo $name;?>
                    
              </td>
            
              <td>
                

                  <?php
               
                    $query = "SELECT * FROM exec WHERE id=$i";
                    $result = mysql_query($query);
                  
                    while ($row = mysql_fetch_assoc($result))
                      {
                          
                          $desig=$row['desig'];
                      }
                 
                    ?><?php echo $desig;?>
                  
                
              </td>

              <td>
                
                  <?php
               
                    $query = "SELECT * FROM exec WHERE id=$i";
                    $result = mysql_query($query);
                  
                    while ($row = mysql_fetch_assoc($result))
                      {
                          
                          $ward=$row['contact'];
                      }
                 
                    ?><?php echo $ward;?>
                  
              </td>
              <td>
                  
                  <?php
                 
                        $query = "SELECT * FROM exec WHERE id=$i";
                        $result = mysql_query($query);
                      
                        while ($row = mysql_fetch_assoc($result))
                          {
                              
                              $salary=$row['salary'];
                          }
                     
                        ?><?php echo $salary;?>

              </td>
              
            </tr>

              <?php
                }
                
                }
              ?>

          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!--New Executive -->
<h2 align="center">New</h2>
<section >
  <div style="margin-left: 550px;">
    <div style="padding: 10px;margin-right: 550px;border: 1px;border-style: solid;">
      <form method="post" >
        <div style="padding: 10px;border: 1px;border-style: solid;">
          <div >
              <label >Fullname
              </label>
              <div >
                  <input style="padding-right: 45px;  type="text" name="name" placeholder="enter fullname" required="">
                  </div>
          </div>
          
          <div >
              <label  >Contact
              </label>
              <div >
                  <input style="padding-right: 45px; type="text" name="contact" placeholder="enter phonenumber" required=""></div>
          </div>

          <div >
              <label  >Salary
              </label>
              <div >
                  <input style="padding-right: 45px;" type="text" name="salary" placeholder="enter salary" required=""></div>
          </div>
          
          <div>
              <label >Designation
              </label>
              <div >
                  <input style="padding-right: 45px; type="text" name="desig" placeholder="enter designation" required=""></div>
          </div>
        </div>
        <button style="margin-left: 70px;margin-top: 10px; name="btn-submit" type="submit" >Submit</button>
      </form>
    </div>
</section>


<hr>
    <div align="center"><footer> 2017 &copy; Hospital Management by Shathi 
    </footer></div>
<hr>

</body>
</html>