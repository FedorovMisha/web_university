<div class="container">
    <div class="row mt-5">
        <form class="p-5 rounded shadow-sm mb-5" enctype= "multipart/form-data">
            <label for="" class="h3 text-primary mb-5">Enter your blog item</label>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Label</label>
                <input type="text" class="form-control" id="lbi" aria-describedby="emailHelp"
                    placeholder="Enter label" name="label" value="<?php echo $args->label;   ?>">
                <small id="emailHelp" class="form-text text-muted">Yor personal data</small>
            </div>
            <div class="form-group mb-5">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="lbd" name="desc" ><?php echo $args->description; ?></textarea>
            </div>
            <a href="#" class="btn btn-primary mb-5" onclick="update()" value="<?php echo $args->description ?>">Submit</a>
        </form>
    </div>
</div>

<script> 
    function update() {
        let formData = new FormData();
        let doc1 = document.getElementById(`lbi`);
        let doc2 = document.getElementById(`lbd`);

        formData.append("label", doc1.value);
        formData.append("desc", doc2.value);
        formData.append("blogId", '<?php print_r($args->id); ?>');

        fetch('./update-blog', {
            body: formData,
            method: 'POST',
            credentials: 'same-origin'
        }).then(resp => console.log(resp.json()));

        alert("send update");
    }
</script>