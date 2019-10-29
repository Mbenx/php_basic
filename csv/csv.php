<?php
/*
* iTech Empires:  How to Import Data from CSV File to MySQL Using PHP Script
* Version: 1.0.0
* Page: Import.PHP
*/
 
// Database Connection
$koneksi = mysqli_connect("localhost","root","","uprs"); 
$message = "";
if (isset($_POST['submit'])) {
    $allowed = array('csv');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        // show error message
        $message = 'Invalid file type, please use .CSV file!';
    } else {
 
        move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES['file']['name']);
 
        $file = "uploads/" . $_FILES['file']['name'];
 
        $query = <<<eof
        LOAD DATA LOCAL INFILE '$file'
         INTO TABLE sewa_cibesel
         FIELDS TERMINATED BY ';'
         LINES TERMINATED BY '\r\n'
         IGNORE 1 LINES
         (id_sewa,nomor_va,nama_penghuni,bulan_tunggakan,nomor_unit,sewa,air,denda,total,val)
eof;
        if (!$result = mysqli_query($koneksi, $query)) {
            exit(mysqli_error($koneksi));
        }
        $message = "CSV file successfully imported!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title></title>

<head>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/business-frontpage.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" href="plugins/bootstrap/css/radiobutton.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              <i class="right fa fa-cloud-upload"></i>
              Upload Data
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Import Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="content-header">
                <div class="container-fluid">
                  <h5>Import Data Warga</h5>
                  <section class="konten">
                    <div class="card-body">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <form enctype="multipart/form-data" method="post" action="index.php?halaman=import_cibesel">
                              <div class="form-group">
                                <label for="file">Select .CSV file to Import</label>
                                <input name="file" type="file" class="form-control">
                              </div>
                              <div class="form-group">
                                <?php echo $message; ?>
                              </div>
                              <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
                              </div>
                            </form>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>