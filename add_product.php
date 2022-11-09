<?php
require_once("auth.php");
include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!--Regular Datatables CSS-->
  <link rel="stylesheet" type="text/css" href="datatable/datatables.min.css"/>
 
 <!--Regular Datatables fixed Header CSS-->
   <link rel="stylesheet" type="text/css" href="datatable/FixedHeader/css/fixedHeader.dataTables.min.css"/>

<!--Regular Datatables JS-->
<script type="text/javascript" src="datatable/datatables.min.js"></script> 
<!--Responsive Extension Datatables CSS-->
<link href="datatable/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">

<!-- Datatables buttons CSS-->
<link rel="stylesheet" type="text/css" href="datatable/buttons/css/buttons.dataTables.min.css"/>


<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<h1><?php if(!empty($_GET['msg']) && $_GET['msg'] =='duplicate'){ print "Sorry Duplicate Entry !!!"; } if(!empty($_GET['msg']) && $_GET['msg']=='success'){ print "Product  Successfully Added !!!"; } ?></h1>
<div class="topnav">
  <a href="home.php">Home</a>
  <a href="Add_User.php"> Add User </a>
  <a href="add_product.php" class="active"> Add Product </a>
  <div class="search-container">
      <a href="logout.php">Logout</a>
  </div>
</div>


<div class="container" id="container1">
  <form>
    <label for="fname">Product Name</label>
    <input type="text" id="name" required placeholder="Enter Product name..">

    <label for="lname">Product Price</label>
    <input type="text" id="price" required placeholder="Enter Product Price..">

    <label for="lname">Brand Name</label>
    <input type="text" id="brand" required placeholder="Your Brand Name..">
    <input type="button" value="Submit" id="submit" onclick="add_product();">

  </form>
</div>
<script>
//add new product 
function add_product() {

  var name = $('#name').val();
  var price = $('#price').val();
  var brand = $('#brand').val();

  if(name == ''){
    alert('Please Enter Product Name');
    return false;
  }

  if(price == ''){
    alert('Please Enter Product Price');
    return false;
  }

  if(brand == ''){
    alert('Please Enter Brand Name');
    return false;
  }

  //Bepore Responce
  $('#submit').val('Please Wait...');
  document.getElementById('submit').disabled = true;

  //use ajax to send data to server
  $.ajax({
    url: 'action_product.php',
    type: 'POST',
    data: {
      name: name,
      price: price,
      brand: brand
    },
    success: function(response){
      //after responce
      $('#submit').val('Submit');
      document.getElementById('submit').disabled = false;

      if(response == 'duplicate'){
        alert('Duplicate Entry');
      }else{
        alert('Product Successfully Added');
          $('#name').val('');
          $('#price').val('');
          $('#brand').val('');
        $("#table_reload").load("product_table.php");
      }
    }
  });

}

</script>

<div class="container">
    
<h2>Product  List</h2>
<div id="table_reload">
<?php include("product_table.php"); ?>
</div>
</div>


<script type="text/javascript" src="datatable/jQuery-3.6.0/jquery-3.6.0.js"></script>
<script type="text/javascript" src="datatable/DataTables-1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="datatable/FixedHeader/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="datatable/buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="datatable/ajax/jszip.min.js"></script>
<script type="text/javascript" src="datatable/ajax/pdfmake.min.js"></script>
<script type="text/javascript" src="datatable/ajax/vfs_fonts.js"></script>
<script type="text/javascript" src="datatable/buttons/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="datatable/buttons/js/buttons.print.min.js"></script>
<script type="text/javascript" src="datatable/buttons/js/buttons.colVis.min.js"></script>

<script>
        
        $(document).ready(function() {
            $('#example').DataTable( {
                // 'searching': false,
                // 'paging': false,
                // 'info': false,
                // 'ordering': false,
                'fixedHeader': true,
                'dom': 'Bfrtip',
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                'buttons': [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print',
                    'colvis',
                    'pageLength'
                ],
                'columns':[
                    {'data':'ID'},
                    {'data':'Product Name'},
                    {'data':'Product Price'},
                    {'data':'Product Brand'}
                ],
                
             
            } );
        } );
            </script>

</body>
</html>
