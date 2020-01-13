<?php
$missing="";
session_start();
$link = mysqli_connect("localhost","root","","inventory");
if (!$link)
{
    die("Connection failed: " .mysqli_connect_error());
}
  if(array_key_exists('btnsearch',$_POST))
  {
    $query3="SELECT * FROM orderplaced WHERE oid='".mysqli_real_escape_string($link,$_POST['orderid'])."'";
    $thisres=mysqli_query($link,$query3);
     $resultobt=mysqli_fetch_array($thisres);
     $oidfr = $resultobt['oid'];
     $cidobt=$resultobt['cno'];
     $gidfr = $resultobt['gid'];
     $qtyprice = $resultobt['amt'];
     $query4="SELECT * FROM goods WHERE gid='".mysqli_real_escape_string($link,$gidfr)."'";
     $myres=mysqli_query($link,$query4);
     $myresobt = mysqli_fetch_array($myres);
     $query5="SELECT * FROM customer WHERE cid='".mysqli_real_escape_string($link,$cidobt)."'";
     $myres1=mysqli_query($link,$query5);
     $myresobt1 = mysqli_fetch_array($myres1);
     $pricefr = $myresobt['price'];
      $fiprice = $qtyprice * $pricefr;
     $_SESSION['oidobt'] = $oidfr;
     $_SESSION['namesess'] = $myresobt1['cname'];
      $_SESSION['addsess'] = $myresobt1['addr'];
      $_SESSION['rawtype'] = $myresobt['gtype'];
      $_SESSION['brandentry'] = $myresobt['gname'];
     $_SESSION['calcprice'] = $fiprice;
  header("Location:orderstatus.php");
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
    <h2>ORDER DETAILS:</h2>
      <div id="red-marquee">
        <marquee direction="left" id="mar-text" behavior="scroll" onMouseOver="document.all.mar-text.stop()" onMouseOut="document.all.mar-text.stop()" style="color:white;">Goods once purchased will not be refunded back</marquee>
      </div>
      <fieldset>
        <legend>Shipping Order Details:</legend>
        <form method = "post">
        <center>
                  <b>ENTER THE ORDER ID TO KNOW THE STATUS?:</b>
                  <input type="text" id = "order_id" name="orderid" style="border-radius:6px;" autofocus><br><br>
                  <button type="submit" id="btn_search" name="btnsearch" class="btn btn-primary">SEARCH</button>
        </center>
         </form>
        <legend></legend>
    </fieldset>
  </body>
</html>
