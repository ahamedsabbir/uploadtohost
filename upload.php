<?php
include("inc/head.php");
logoutChack();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <base href="<?php echo $base_url; ?>">
	<link rel="icon" href="icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>	
    <!-- Custom styles for this template -->
    <link href="form.css" rel="stylesheet">
  </head>
  <body class="bg-light">
		<?php include("inc/nav.php"); ?>
		<?php include("functions.php"); ?>
		<div class="container text-center d-none">
			<iframe id="input_open" src="icon.png" style="border:0px #ffffff none;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="400px" width="100%" allowfullscreen></iframe>
		</div>
        <main class="bg-light text-dark">
		 <div class="container">
          <div class="card text-center">
            <div class="card-header">
              File List
            </div>
            <div class="card-body">
				<ul class="list-group list-group-flush">
<?php
$file_link = "assets/file/";
$file_list = glob("$file_link*.*");
$all_size = 0;
$i = 0;
foreach($file_list as $file_url){  
  	$file_name = basename($file_url);
	$file_array = explode(".", $file_name);
	$extension = end($file_array);
	switch($extension){
	  case "txt":
		$file_font = "<i class='fa-solid fa-text-width'></i>";
		break;
	  case "mp4":
		$file_font = "<i class='fa-regular fa-file-video'></i>";
		break;
	  case "jpg":
		$file_font = "<i class='fa-solid fa-image'></i>";
		break;
	  default:
		$file_font = "<i class='fa-regular fa-file'></i>";
	}
  	$filemtime = date("d/m/y H:i:s", filemtime($file_url));
	$filempath = $base_url.$file_url;
	$file_size = ceil(filesize($file_url)/1048576);
	$all_size += $file_size;
	$i++;
	$delete = $base_url."upload.php?delete=".$file_name;
	if($file_name != "about.txt"){
		echo <<<TEXT
<li class="list-group-item d-flex justify-content-between align-items-center">
	<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
	  <div class="btn-group" role="group">
		<button id="btnGroupDrop1" type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
		<b><span style="color:red;">$i . </span>$file_font $file_name</b></button>
		<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
		  <li><input class="dropdown-item d-none" type="text" value="$filempath" id="$file_name"></li>
		  <li><a class="dropdown-item" href="$file_url">Open</a></li>
		  <li><span class="dropdown-item" onclick="myFunction('$file_name');">Copy</span></li>
		  <li><a class="dropdown-item" href="$delete" onclick="return confirm('are you sure?');">Delete</a></li>
		</ul>
	  </div>
	</div>
	<span>{$filemtime}/{$file_size}MB</span>
</li>
TEXT;
	}	
}                                                 
?>
				</ul>
            </div>
			<div class="card-footer text-muted">
              All file size is <b style="color:red;"><?php echo $all_size; ?> MB</b>
            </div>
          </div>
         </div>

           

        </main>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>   
  </body>
<?php include("inc/foot.php"); ?>
<script>
function myFunction(file_name){
  // Get the text field
  var copyText = document.getElementById(file_name);
  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices
   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}
</script>
</html>