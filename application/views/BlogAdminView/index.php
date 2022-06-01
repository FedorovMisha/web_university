<div class="container">
    <div class="row mt-5">
        <form action="/admin/create-blog" method="post" class="p-5 rounded shadow-sm mb-5" enctype= "multipart/form-data">
            <label for="" class="h3 text-primary mb-5">Enter your comment</label>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Label</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter name" name="label">
                <small id="emailHelp" class="form-text text-muted">Yor personal data</small>
            </div>
            <div class="mb-5">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" name="image" id="formFile">
            </div>
            <div class="form-group mb-5">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="desc"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
</div>