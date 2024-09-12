<?php
    $intro_section = get_field('intro_section');
    $title = $intro_section['title'];
    $description = $intro_section['description'];
?> 

<section class="content-intro">
    <div class="container">
        <div class="intro-content">
            <h2><?php echo $title; ?></h2>
            <p><?php echo $description?></p>
        </div>
    </div>
</section>