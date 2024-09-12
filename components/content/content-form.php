<?php
    $form = get_field('form');
    $title = $form['title'];
    $content = $form['content'];
?> 

<section class="content-form">
    <div class="container">
        <div class="form_section">
            <div class="intro-content">
                <h2><?php echo $title; ?></h2>
            </div>
            <?php echo $content; ?>
            <form action="">
                <input type="text">
            </form>
        </div>
    </div>
</section>