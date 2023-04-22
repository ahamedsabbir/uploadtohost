<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModalonline">
  Online
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalonline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
			<label for="exampleInputextension1" class="form-label">Extension</label>
			<input type="text" class="form-control" id="exampleInputextension1" name="extension">
		  </div>
		  <div class="mb-3">
			<label for="file1" class="form-label">URL</label>
			<input type="url" class="form-control" id="file1" name="file">
		  </div>
		  <button type="submit" class="btn btn-primary" name="submit" value="online">Submit</button>
		</form>
      </div>
    </div>
  </div>
</div>
