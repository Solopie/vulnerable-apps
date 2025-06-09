<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_FILES["userfile"])) {
        if($_FILES["userfile"]["error"] != 0) {
            $result = $_FILES["userfile"]["error"];
            $err = TRUE;
        } else {
            $uploaddir = '/var/www/html/uploads/';
            $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $upload_path = "/uploads/".basename($_FILES['userfile']['name']);
                $result = "File was successfully uploaded to: <a href=\"".$upload_path."\">".$upload_path."</a>";
            } else {
                $result = "File upload failed";
                $err = TRUE;
            }
        }
    } else {
        $result = "Please upload a file";
        $err = TRUE;
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Temp Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        body {
            background-image: url('background.png');
            background-size: cover;
        }
    </style>
  </head>
  <body>
    <div class="container mt-5 d-flex flex-column text-center">
        <h1>Temp Upload</h1>
        <p>Upload your files temporarily and download them from anywhere on the internet</p>
        <form enctype="multipart/form-data" action="index.php" method="post" class="my-3">
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <div class="row g-3 align-items-center justify-content-center">
              <div class="col-auto">
                <label for="userfile" class="col-form-label">Upload here: </label>
              </div>
              <div class="col-auto">
                <input name="userfile" type="file" />
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
        </form>
        <?php if(isset($result) && isset($err) && $err === TRUE): ?>
            <div class="text-warning"><?php echo $result ?></div>
        <?php elseif(isset($result)): ?>
            <div class="text-success"><?php echo $result ?></div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>