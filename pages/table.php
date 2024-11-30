<?php
$pageTitle = "Table - Page";
include('../includes/header.php');
?>



<table>
  <caption>Swap Booking Table</caption>
  <thead>
  
    <tr>
      <th rowspan="2">Book Name</th>
      <th rowspan="2">Current Owner</th>
      <th colspan="3">Swap Details</th>
    </tr>
    <tr>
      <th>Requested By</th>
      <th>Swap Date</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td >The Alchemist</td>
      <td >Feras</td>
      <td >Ali</td>
      <td >25th Nov</td>
      <td >Confirmed</td>
    </tr>

    <tr>
      <td >The Great Gatsby</td>
      <td >Ahmed</td>
      <td>Mohammed</td>
      <td>26th Nov</td>
      <td >Pending</td>
    </tr>


    <tr>
      <td > 1984</td>
      <td >Sara</td>
      <td >Noor</td>
      <td >27th Nov</td>
      <td >Confirmed</td>
    </tr>

    <tr>
      <td > To Kill a Mockingbird</td>
      <td>John</td>
      <td >Feras</td>
      <td >28th Nov</td>
      <td >Pending</td>
    </tr>

    <tr>
      <td> Pride and Prejudice</td>
      <td >Noor</td>
      <td >Ahmed</td>
      <td >29th Nov</td>
      <td>Confirmed</td>
    </tr>



    <tr>
      <td > Moby Dick</td>
      <td >Hassan</td>
      <td >Sara</td>
      <td >30th Nov</td>
      <td >Pending</td>
    </tr>
 
  </tbody>
</table>



<?php include('../includes/footer.php'); ?>