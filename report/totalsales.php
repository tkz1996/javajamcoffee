<html lang="en">
  <head>
  <meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
  <title>JavaJam Coffee House Product Price Update</title>
  <style>
  #displaybox, tr, td
  {
    padding: 5px;
    font-family: Arial, sans-serif;
  	font-size: 100%;
  	font-weight: bold;
  	color: #883300;
    text-align: left;
    margin: 20px;
  }
  #leftcolumn
  {
    height: 350px;
  }
  #rightcolumn
  {
    height: 350px;
  }
  </style>
  </head>
  <body>
    <?php include('constants.php');
    $conn = mysqli_connect($servername, $username, $password, $databasename);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT fullname,price1,price2,quantity1,quantity2 FROM $pricetable";
    $result = mysqli_query($conn, $query);
    $total = 0;
    ?>
	<div id="wrapper">
		<div>
			<h1>
				<img src="javalogo.gif">
			</h1>
		</div>
		<div id="leftcolumn"><nav id="leftcolumn">
		</div></nav>
		<div id="rightcolumn">
			<div class="content">
				<h2 id="contenttitle">
					Daily sales report --- Total dollar sales by products:
				</h2>
        <div id='displaybox'>
          <table border='1'>
            <tr>
              <td>
                Product
              </td>
              <td style='text-align:center'>
                Total Sales
              </td>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result))
            {
              $earnings = $row['price1']*$row['quantity1'];
              $total += $earnings;
              $singlestr = ' (Single)';
              if (is_null($row['price2']))
              {
                $singlestr = '';
              }
              echo "
              <tr>
                <td>".
                  $row['fullname'].
                  $singlestr
                ."</td>
                <td style='text-align:center'>$".
                  $earnings
                ."</td>
              </tr>
              ";
              if (is_null($row['price2']))
              {
                continue;
              }
              $earnings = $row['price2']*$row['quantity2'];
              $total += $earnings;
              echo "
              <tr>
                <td>".
                  $row['fullname']
                ." (Double)</td>
                <td style='text-align:center'>$".
                  $earnings
                ."</td>
              </tr>
              ";
            }
            echo "
            <tr>
              <td>
                Total
              </td>
              <td style='text-align:center'>$".
                $total
              ."</td>
            </tr>
            ";
            ?>
          </table>
          <?php
            date_default_timezone_set('Asia/Singapore');
            $datetime = date('d/m/Y, h:i:sa');
            echo "</br>Report generated at ". $datetime .".";
          ?>
        </div>
			</div>
		</div>
		<footer >
			<small><i>Copyright &copy; 2014 JavaJam Coffee House <br> <a href="mailto:Ken_Zi@Teo.com">Ken_Zi@Teo.com</i></small></a>
		</footer>
	</div>
  <script src="salesscript.js"></script>
  </body>
</html>
