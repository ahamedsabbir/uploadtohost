<style>
.progress-wrapper {
    width:100%;
}
.progress-wrapper .progress {
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	animation: gradient 15s ease infinite;
    width:0%;
    padding:10px 0px 10px 0px;
}
</style>
<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModaloffline">
  Offline
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModaloffline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<form action=""  method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="exampleInputtoken1" class="form-label">Token</label>
				<input type="text" class="form-control" id="exampleInputtoken1" name="token">
			</div>
			<div class="mb-3">
				<label for="file1" class="form-label">File</label>
				<input type="file" class="form-control" id="file1" name="file">
			</div>
			<div class="py-2">
				<div class="progress-wrapper" style="">
					<span id="progress-persent-file1"></span>
					<div id="progress-bar-file1" class="progress"></div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit" value="offline" onclick="postFile()">Submit</button>
		</form>
      </div>
    </div>
  </div>
</div>
<script>
function postFile() {
    var formdata = new FormData();
    formdata.append('file1', $('#file1')[0].files[0]);
    var request = new XMLHttpRequest();
    request.upload.addEventListener('progress', function (e) {
        var file1Size = $('#file1')[0].files[0].size;
        if (e.loaded <= file1Size) {
            var percent = Math.round(e.loaded / file1Size * 100);
            $('#progress-bar-file1').width(percent + '%');
            $('#progress-persent-file1').html(percent + '%');
        } 
        if(e.loaded == e.total){
            $('#progress-bar-file1').width(100 + '%');
            $('#progress-persent-file1').html(100 + '%');
        }
    });   
    request.open('post', '/echo/html/');
    request.timeout = 450000;
    request.send(formdata);
}
</script>
