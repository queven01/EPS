<?php 
$editors = get_field('editors');
$editor_title = $editors['title'];
$editor = $editors['editor'];
?>
<?php if($editor): ?>
    <section class="editor_section">
        <div class="container">
            <?php if($editor_title): ?>
                <div class="section-intro">
                    <h2 class="title"><?php echo $editor_title; ?></h2>
                </div>
            <?php endif; ?>
            <?php echo $editor; ?>
        </div>
    </section>
<?php endif; ?>