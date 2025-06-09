<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["host"])) {
        exec("ping -c 5 ".$_POST["host"]." 2>&1", $result, $retval);
        if($retval !== 0) {
            $err = TRUE;
        } else {
            $err = FALSE;
        }
    } else {
        $result = "Please fill in the host";
        $err = TRUE;
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ping Pong</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        body {
            background-image: url('background.jpg');
            background-size: cover;
        }
    </style>
  </head>
  <body>
    <div class="container mt-5 d-flex flex-column text-center">
        <h1>Ping your website!</h1>
        <p>Here you can ping any website you want! Just make sure you have permission 😃</p>
        <form action="index.php" method="post" class="my-3">
            <div class="row g-3 align-items-center justify-content-center">
              <div class="col-auto">
                <label for="host-input" class="col-form-label">Host: </label>
              </div>
              <div class="col-auto">
                <input type="text" id="host-input" name="host" class="form-control">
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
        </form>
        <?php if(isset($result) && isset($err) && $err === TRUE): ?>
            <div class="text-warning"><?php echo implode("<br>", $result) ?></div>
        <?php elseif(isset($result)): ?>
            <div class="text-success"><?php echo implode("<br>", $result) ?></div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>