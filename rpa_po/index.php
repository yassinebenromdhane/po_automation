<!DOCTYPE html>
<html lang="en">

<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "rpa_po";

// Create connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected to database successfully!";

$sql = "SELECT * FROM purchase";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo "Error: " . mysqli_error($conn);
}

?>
<?php include('includes/head.php') ?>


<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container px-4">
      <a class="navbar-brand" href="/">PO Managment</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">

        </ul>
      </div>
    </div>
  </nav>
  <!-- Header-->
  <style type="text/css">
    #mc-MMERGE7 {
      display: none !important;

    }
  </style>
  <section id="about">
    <div class="container px-4">

      <h1>Purchase Orders Management</h1>
      <br>
      <div class="alert alert-primary" role="alert">
        <a href="Purchase%20Orders.xlsx"><i class="bi bi-file-earmark-excel"></i> Download the Excel file for this
          assignment</a>
      </div>
      <br>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Creator</th>
            <th scope="col">Amount</th>
            <th scope="col">Vendor</th>
            <th scope="col">Date Requested</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            while($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["creator"]; ?></td>
              <td><?php echo $row["amount"]; ?></td>
              <td><?php echo $row["vendor"]; ?></td>
              <td><?php echo $row["request_date"]; ?></td>
            </tr>
          <?php
            }
          ?>
        </tbody>
      </table>


      <a href="./controller/delete.php" name="delete" class="btn btn-danger" role="button">Remove all Purchase Orders</a><br><br>

      <h2>Add Purchase Order</h2>

      <form method="post" action="./controller/add.php">
        <div class="form-group">
          <label for="name">PO Name</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
          <label for="creator">PO Creator</label>
          <input type="text" class="form-control" id="creator" name="creator">
        </div>

        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="number" class="form-control" id="amount" name="amount">
        </div>

        <div class="form-group">
          <label for="country">Vendor</label>
          <select class="form-control" id="vendor" name="vendor">
            <option value="-">-</option>
            <option value="IT Unlimited">IT Unlimited</option>
            <option value="The Office Club">The Office Club</option>
            <option value="CFO Services Unlimited">CFO Services Unlimited</option>
            <option value="Johnson Consulting BV">Johnson Consulting BV</option>
            <option value="Event Management Group Ltd">Event Management Group Ltd</option>
          </select>
        </div>

        <div class="form-group">
          <label for="date_requested">Date Requested</label>
          <input type="date" class="form-control" id="date_requested" name="date_requested">
        </div>


        <div class="row">
          <div class="col-md-6">

            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="cfo-approval-required" name="cfo-approval-required">
              <label class="form-check-label" for="cfo-approval-required">CFO Approval Required</label>
            </div>



          </div>
          <div class="col-md-6">
            <br>
            <button type="submit" class="btn btn-success">Add Purchase Order</button>

          </div>
        </div>
      </form>



    </div>
  </section>




  <!-- Footer-->
  <?php include 'includes/footer.php'; ?>
  <!-- Bootstrap core JS-->
  <script src="./jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
  <script src="./npm/bootstrap%405.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="./js/scripts.js"></script>








</body>

</html>