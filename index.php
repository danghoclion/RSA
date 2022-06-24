<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mã hóa RSA</title>
  <link rel="stylesheet" href="./style.css" type="text/css">
  <link rel="stylesheet" href="./style1.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="./index.js"></script>
</head>

<body>
  <?php
  $strng = "";
  if (isset($_FILES['fileToUpload'])) {
    $target_file = basename($_FILES["fileToUpload"]["name"]);
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    if ($FileType == "txt") {
      $myfile = fopen("$file_tmp", "r") or die("Unable to open file!");
      while (!feof($myfile)) {
        $strng = $strng . fgets($myfile); //. "<br>";
      }
      fclose($myfile);
    }
    else if ($FileType == "pdf") {
      include "./vendor/autoload.php";
      $parser = new \Smalot\PdfParser\Parser();
      $pdf = $parser->parseFile($file_tmp);
      $strng = $pdf->getText();
    }
    else if($FileType == "docx") {
      include "./readfile.php";
      $filedoc = $file_tmp;
      $docObj = new Doc2Txt($filedoc);
      $txt = $docObj->convertToText();
      $strng = $txt;
    }
  }
  ?>
  <h1>Chương trình mã hóa và giải mã RSA</h1>
  <div class="conten">
    <div class="box1">
      <button type="submit" id="taokhoa" onclick="showKey()">Tạo khóa private và public</button>
      <div class="container">
        <div class="row">
          <div class="col-25">
            <label>Khóa public: Key(b, n)</label>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label>Số b</label>
          </div>
          <div class="col-75">
            <input type="text" id="sob">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label>Số n</label>
          </div>
          <div class="col-75">
            <input type="text" id="son">
          </div>
        </div>
        </br>
        </br>
        </br>
        </br>
        <div class="row">
          <div class="col-25">
            <label>Khóa private: Key(a, n)</label>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label>Số a</label>
          </div>
          <div class="col-75">
            <input type="text" id="soa">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label>Số n</label>
          </div>
          <div class="col-75">
            <input type="text" id="son1">
          </div>
        </div>
      </div>
    </div>
    <div class="box2">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-input">
          <h4>Nhập dữ liệu đầu vào: </h4>
          <input type="file" id="fileToUpload" name="fileToUpload" placeholder="Select a PDF file" required="">
        </div>
        <input id="file" type="submit" name="submit" class="btn" value="Đọc Text">
        <textarea name="" id="txtbanro" cols="90" rows="7"><?php if ($strng !== "") echo $strng; ?></textarea>
      </form>
      <h4>Chuỗi mã hóa RSA: </h4>
      <button id="mahoa" type="submit">Mã hóa RSA</button>
      <textarea name="" id="txtbanma" cols="90" rows="7"></textarea>
      <h4>Chuỗi đã giải mã RSA: </h4>
      <button id="giaima">Giải mã RSA</button>
      <textarea name="" id="txtbangoc" cols="90" rows="7"></textarea>
    </div>
  </div>
  <button id="refesh">Refesh</button>

</body>

</html>