<?php
    require_once 'application/core/Models/ViewStatistic.php';
    saveViewStatistic("Album");
?>

<?php
function insertPhoto($photo)
{
    echo <<<EOL

            <div class="row mb-5">
            <div class="col">
            <p>
            <a class="" data-bs-toggle="collapse" href="#collapse_$photo->id" role="button" aria-expanded="false" aria-controls="collapse_$photo->id">
                <img src="$photo->path" alt="" class="w-100 h-100">
            </a>
        </p>
        <div class="collapse" id="collapse_$photo->id">
            <div class="card card-body">
                $photo->description
            </div>
        </div>
            </div>
        </div>

        EOL;
}
?>


<div class="container">
    <?php
        foreach($args as $value) {
        insertPhoto($value);
    }
    ?>
</div>