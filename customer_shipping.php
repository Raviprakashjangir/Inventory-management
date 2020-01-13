<?php
$missing="";
session_start();
$link = mysqli_connect("localhost","root","","inventory");
if (!$link)
{
    die("Connection failed: " .mysqli_connect_error());
}
if(array_key_exists('submitbutton',$_POST))
{
    if(!$_POST['nameentry'])
  {
    $missing.="Name field is missing!<br>";
  }
   if(!$_POST['addentry'])
  {
    $missing.="Address field is missing!<br>";
  }
   if(!$_POST['mobileentry'])
  {
    $missing.="Mobile number is missing!<br>";
  }
   if(!$_POST['mailentry'])
  {
    $missing.="Email address is missing!<br>";
  }
 $query="INSERT INTO `customer` (`cname`,`addr`,`phno`,`cmail`) VALUES ('".mysqli_real_escape_string($link,$_POST['nameentry'])."', '".mysqli_real_escape_string($link,$_POST['addentry'])."', '".mysqli_real_escape_string($link,$_POST['mobileentry'])."', '".mysqli_real_escape_string($link,$_POST['mailentry'])."')";
  mysqli_query($link,$query);
  $first=$_SESSION['brandentry'];
  $second=$_SESSION['rawtype'];
$query2="SELECT * FROM goods WHERE gname='".mysqli_real_escape_string($link,$first)."' AND gtype='".mysqli_real_escape_string($link,$second)."'";
  $result1=mysqli_query($link,$query2);
  $rowobt=mysqli_fetch_array($result1);
  $gidobt=$rowobt['gid'];
  $priceobt=$rowobt['price'];
  $amtobt=$_SESSION['amtneeded'];
  $qtyavail=$rowobt['qtyavail'];
  $pricecalc=$priceobt*$amtobt;

  $query3="SELECT * FROM customer WHERE cname='".mysqli_real_escape_string($link,$_POST['nameentry'])."'";
  $thisres=mysqli_query($link,$query3);
  $resultobt=mysqli_fetch_array($thisres);
  $cidobt=$resultobt['cid'];

  $query4="INSERT INTO `orderplaced` (`cno`,`gid`,`amt`,`ostatus`) VALUES ('".mysqli_real_escape_string($link,$cidobt)."', '".mysqli_real_escape_string($link,$gidobt)."', '".mysqli_real_escape_string($link,$amtobt)."', '".mysqli_real_escape_string($link,"PENDING")."')";
 mysqli_query($link,$query4);
   if($qtyavail<=0)
 {
     header("Location:index.php");
 }

 $query5="UPDATE `goods` SET qtyavail=qtyavail-$amtobt";
 mysqli_query($link,$query5);
 $query6="SELECT * FROM `orderplaced` WHERE cno='".mysqli_real_escape_string($link,$cidobt)."'";
 $myqueryres=mysqli_query($link,$query6);
 $bitres=mysqli_fetch_array($myqueryres);

$_SESSION['oidobt']=$bitres['oid'];
$_SESSION['namesess']=$_POST['nameentry'];
$_SESSION['addsess']=$_POST['addentry'];
$_SESSION['mobsess']=$_POST['mobileentry'];
$_SESSION['emailsess']=$_POST['mailentry'];
$_SESSION['calcprice']=$pricecalc;


$date = date('Y-m-d H:i:s');
$onlyq="INSERT INTO `billing` (`oid`,`billdate`,`billamt`) VALUES ('".mysqli_real_escape_string($link,$_SESSION['oidobt'])."', $date, '".mysqli_real_escape_string($link,$_SESSION['calcprice'])."')";
mysqli_query($link,$onlyq);

  if($missing!="")
  {
       $missing='<div class="alert alert-warning">'."<p>There were some fields missing in the form!!</p>".$missing.'</div>';
  }
  else
  {
      header("Location:billing.php");
  }
}
?>
<html>
  <head>
    <title>INVENTORY MANAGEMENT SYSTEM</title>
    <link rel="icon" href="download.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
      #imges
      {
        width:140px;
        height:140px;
      }
      #header-box
      {
        width:1750px;
        height:170px;
      }
      #green-box
      {
        width:1350px;
        height:140px;
        position:relative;
        top:-130px;
        left:140px;
        border:2px ridge black;
      }
      h1
      {
        color:#C4F8C8;
        position:relative;
        top:-20px;
        left:-50px;
        font-size:360%;
      }
      #qwe
      {
        color:#C4F8C8;
        position:relative;
        top:-43px;
        font-size:150%;
      }
      .wrapper
      {
        width:300px;
      }
      #red-marquee
      {
        width:1500px;
        height:36px;
        background-color:maroon;
        margin-left:6px;
      }
      #mar-text
      {
        font-size:20px;
        margin:6px 3px;
      }
      h2
      {
        font-size:20px;
      }
      #usn
      {
        font-size:200%;
      }
      #usn-box
      {
        font-size:24px;
        position:relative;
        top:-4px;
      }
      B
      {
         left:100px;
      }
      #rawmaterialentry
      {
          font-size:40px;
      }
    </style>
  </head>
  <body>

    <header>
      <div id="header-box" name="header-box" style="background-color:rgb(255,254,204);">
      <img src="download.jpg" id="imges">
        <div id="green-box" name="gr-box" style="background-color:#0BA889;">
          <h1><center>INVENTORY MANAGEMENT SYSTEM</center></h1>
      </div>
      </div>
      </header>
    <h2>SHIPPING DETAILS:</h2>
      <div id="red-marquee">
        <marquee direction="left" id="mar-text" behavior="scroll" onMouseOver="document.all.mar-text.stop()" onMouseOut="document.all.mar-text.stop()" style="color:white;">Goods once purchased will not be refunded back</marquee>
      </div>
      <fieldset>
        <legend>Shipping Details:</legend>
        <center>
          <form method="post">

          <label id="usn" for="usn-box"><strong>Name:</strong></label>
          <input type="text" id="usn" name="nameentry" placeholder="For ex:YZX" style="border-radius:6px;" autofocus><br><br>

          <label id="usn" for="usn-box"><strong>Address:</strong></label>
          <input type="text" id="usn" name="addentry" placeholder="For ex:street no,street name city" style="border-radius:6px;" autofocus><br><br>

          <label id="usn" for="usn-box"><strong>Mobile No:</strong></label>
          <input type="number" id="usn" name="mobileentry" placeholder="For ex: 98XXXXXXXX" style="border-radius:6px;" autofocus><br><br>

          <label id="usn" for="usn-box"><strong>Email Address:</strong></label>
          <input type="email" id="usn" name="mailentry" placeholder="For ex:asdf@xyz.com" style="border-radius:6px;" autofocus><br><br>

         <button type="submit" name="submitbutton" id="button-submit" class="btn btn-success">SUBMIT AND PLACE ORDER</button><br>
        </form>
        <div id="missing-fields">
            <?php
            echo $missing;
            ?>
        </div>
           </center>
        <legend></legend>
    </fieldset>
  </body>
</html>
