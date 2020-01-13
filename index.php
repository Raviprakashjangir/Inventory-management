<?php
$conn = mysqli_connect("localhost","root","","inventory");
if (! $conn)
{
    die("Connection failed: " .mysqli_connect_error());
}
?>
<html>
  <head>
    <title>INVENTORY MANAGEMENT SYSTEM</title>
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
        top:-40px;
        left:-50px;
        font-size:360%;
      }
      #qwe
      {
        color:#C4F8C8;
        position:relative;
        top:-83px;
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
      #button-submit
      {
        font-size:30px;
      }
      B
      {
         left:100px;
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
    <h2>ONE STOP SOLUTION FOR ALL YOUR RAW MATERIAL NEEDS </h2>
      <div id="red-marquee">
        <marquee direction="left" id="mar-text" behavior="scroll" onMouseOver="document.all.mar-text.stop()" onMouseOut="document.all.mar-text.stop()" style="color:white;">Goods once purchased will not be refunded back</marquee>
      </div>
      <fieldset>
        <legend>Website Contents:</legend>
        <center>
          <form method="post">
            <B>1).</B><a href="purchase.php">PURCHASE SOME GOODS</a><br><br>
            <B>2).</B><a href="orderno.php">CHECK STATUS OF YOUR ORDER</a><br><br>
            </form>
           </center>
        <legend></legend>
    </fieldset>
  </body>
</html>
