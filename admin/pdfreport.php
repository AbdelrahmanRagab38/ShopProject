<?php
 
function fetch_data()
{ $output = '';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  
 $pages_query="select * FROM orders ORDER BY id ASC";
$pg=mysqli_query($conn,$pages_query);

while($row=mysqli_fetch_array($pg))
 {
     $output .= '<tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["product_code"].'</td>
         <td>'.$row["product_name"].'</td>        
         <td>'.$row["price"].'</td>           
         <td>'.$row["units"].'</td>           
         <td>'.$row["date"].'</td>
         <td>'.$row["total"].'</td>
 
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Orders Report");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Orders Report</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">id</th>  
                <th width="10%">product_code</th>  
                <th width="20%">product_name</th>  
                <th width="15%">price</th> 
                <th width="5%">units</th> 
                <th width="30%">date</th> 
                <th width="15%">total</th> 
                
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Orders Report</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body style="background:black">  
           <center>
           <div class="container">  
               <br>
                <h1 align="center" style="color:white"><strong>Orders Report</strong> </h1><br />  
                <div class="table-responsive">  
                	<div class="col-md-12" align="center">
                     <form method="post">
                    <a href="pdfreport.php"><img src="images/rep.png" width="400" alt="image03"></a><br><br>
                  <input type="submit" name="generate_pdf" class="btn btn-success" value="Get PDF Now" />
                  <a href='order.php' class='btn btn-success' align="left"><i class='fa fa-edit'></i> Back To Orders </a>
                     </form>  
                     </div> 
                </div>  
           </div>  </center>
      </body>  
</html>  