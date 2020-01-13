<?php
$missing="";
session_start();
$link = mysqli_connect("localhost","root","","inventory");
if (!$link)
{
    die("Connection failed: " .mysqli_connect_error());
}
  $query3="SELECT * FROM billing WHERE oid='".mysqli_real_escape_string($link,$_SESSION['oidobt'])."'";
 $thisres=mysqli_query($link,$query3);
  $resultobt=mysqli_fetch_array($thisres);
  $bidobt=$resultobt['bid'];
  if(array_key_exists('homebutton',$_POST))
  {
      header("Location:index.php");
  }
?>
<html>
  <head>
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
    <h2>BILLING DETAILS:</h2>
      <div id="red-marquee">
        <marquee direction="left" id="mar-text" behavior="scroll" onMouseOver="document.all.mar-text.stop()" onMouseOut="document.all.mar-text.stop()" style="color:white;">Goods once purchased will not be refunded back</marquee>
      </div>
      <fieldset>
        <legend>Billing Details:</legend>
        <form method = "post">
        <center>
             <table style="width:100%;" cellpadding="3">
  <tr  width="20">
    <th>BILL/INVOICE ID</th>
    <th>ORDER ID</th>
    <th>CUSTOMER NAME</th>
    <th>SHIPPING ADDRESS</th>
    <th>ITEM ORDERED</th>
    <th>BRAND NAME</th>
    <th>BILL AMOUNT:</th>
  </tr>
  <tr>
    <td><?php echo $bidobt; ?></td>
    <td><?php echo $_SESSION['oidobt']; ?></td>
    <td><?php echo $_SESSION['namesess'];?></td>
    <td><?php echo $_SESSION['addsess']; ?></td>
     <td><?php echo $_SESSION['rawtype']; ?></td>
    <td><?php echo $_SESSION['brandentry']; ?></td>
    <td><?php echo $_SESSION['calcprice']; ?></td>
  </tr>
</table>
<br><br><br>
          <button  name ="homebutton" id = "home_button" class = "btn btn-warning" > HOME</button>
         <button type="submit" name="submitbutton" id="button-submit" class="btn btn-success">PAYMENT</button><br>
        </center>
         </form>
        <legend></legend>
    </fieldset>
  </body>
</html>
