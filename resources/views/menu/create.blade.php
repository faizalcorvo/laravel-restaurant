@extends('layout.main')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <h1 class="h2 mb-4">Create Record Menu</h1>
        <nav aria-label="breadcrumb p-4 my-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/menu" class="text-decoration-none">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Record Menu</li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav>
        <div class="container">               
            <div class="row">
                <div class="col-16 mb-4 mb-lg-0">
                    <h3>Create New Record</h3>
                    <a href="/menu" class="btn btn-danger btn-md my-3 fw-bold mb-3" title="black">
                        <span data-feather="chevron-left">Back</span>
                    </a>
                    <div class="row">
                        <div class="col-18">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <form action="/menu" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <span class="input-group-text" id="basic-addon1"><b>Name : </b></span>
                                            <input value="{{ old('nameMenu') }}" required name="nameMenu" type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <span class="input-group-text" id="basic-addon1"><b>Description : </b></span>
                                            <textarea class="form-control" required value="{{ old('descMenu') }}" name="descMenu" required placeholder="Leave a comment here" id="floatingTextarea2" style="height : 100px"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <span class="input-group-text" id="basic-addon1"><b>Menu Photo : </b></span>
                                            <img class="img-preview img-fluid mb-3 col-sm-5">
                                            <input name="photoMenu" class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                                        </div>
                                        <div class="mb-3">
                                            <span class="input-group-text" id="basic-addon1"><b>Price : </b></span>
                                            <input value="{{ old('price') }}" name="price" type="number" class="form-control" id="floatingInput">
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary rounded me-1" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script>
	function previewImage() {
		const image = document.querySelector("#image");
		const imgPreview = document.querySelector(".img-preview");

		imgPreview.style.display = "block";

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFEvent) {
			imgPreview.src = oFEvent.target.result;
		}
	}
</script>
@endsection