<?php
    require_once 'application/core/Models/ViewStatistic.php';
    saveViewStatistic("Hobbies");
?>

<?php


function printHobbie($hobbie)
{
    $text = <<<EOL
                <div class="mb-5" id="$hobbie->id">
                    <div class="row " style="height: 50vh;">
                        <img src="$hobbie->imagePath" class="w-100 h-100" style="object-fit: cover; object-position:bottom;" alt="">
                    </div>
    
                    <div class="row mt-5 p-2"> 
                        <h2> $hobbie->name </h2>
                    </div>
    
                    <div class="row mt-3"> 
                        <p> $hobbie->description </p>
                    </div>
                </div>
    
            EOL;

    echo $text;
}

?>

<div class="container">
    
    <ul class="nav my-5">
        <?php
        foreach ($args as $value) {
            echo <<<EOL
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#$value->id">$value->name</a>
                        </li>
                    EOL;
        }
        ?>
    </ul>


    <?php
    foreach ($args as $value) {
        printHobbie($value);
    }
    ?>

</div>