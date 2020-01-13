<?php
$missing="";
session_start();
if(array_key_exists('submitbutton',$_POST))
{
    $_SESSION['rawtype']=$_POST['rawmaterialentry'];
    $_SESSION['brandentry']=$_POST['brandentry'];
    $_SESSION['amtneeded']=$_POST['qtyentry'];
   if(!$_POST['qtyentry'])
  {
    $missing.="Please enter a quantity!<br>";
  }
  if($missing!="")
  {
      $missing='<div class="alert alert-warning">'."<p>There were some fields missing in the form!!</p>".$missing.'</div>';
  }
  else
  {
    header("Location:customer_shipping.php");
  }
}
if(array_key_exists('backbutton',$_POST))
{
    header("Location:index.php");
}
?>
<html>
  <head>
    <title>INVENTORY MANAGEMENT SYSTEM</title>
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
    <h2>PURCHASE SECTION:</h2>
      <div id="red-marquee">
        <marquee direction="left" id="mar-text" behavior="scroll" onMouseOver="document.all.mar-text.stop()" onMouseOut="document.all.mar-text.stop()" style="color:white;">Goods once purchased will not be refunded back</marquee>
      </div>
      <fieldset>
        <legend>Purchase Details:</legend>
        <center>
          <form method="post">
           <label id="usn" for="usn-box"><strong>Raw Material Type:</strong></label>
          <select id="usn" name="rawmaterialentry" style="border-radius:6px;" required autofocus>
          <option selected>-----</option>
          <option>CEMENT</option>
          <option>SANDSTONE</option>
          <option>LIMESTONE</option>
          <option>GRANITE</option>
          </select><br><br>
          <label id="usn" for="usn-box"><strong>Brand Name:</strong></label>
          <select id="usn" name="brandentry" style="border-radius:6px;" required autofocus>
          <option selected>-----</option>
          <option>AMBUJA</option>
          <option>ULTRATECH</option>
          <option>DALMIA BHARAT</option>
          <option>ACC</option>
          <option>ASHTECH</option>
          </select><br><br>
          <label id="usn" for="usn-box"><strong>Quantity:</strong></label>
          <input type="number" id="usn" name="qtyentry" style="border-radius:6px;" autofocus><br><br>
         <button type="submit" name="backbutton" id="back-submit" class="btn btn-danger">BACK</button>
         <button type="submit" name="submitbutton" id="button-submit" class="btn btn-primary">NEXT</button><br>
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
