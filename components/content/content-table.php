<?php
    $top_table_headings = get_sub_field('top_table_headings');
    $main_table_content_advanced = get_sub_field('main_table_content_advanced');
    $table_notes = get_sub_field('table_notes');
    $section_id = get_sub_field('section_id');
    if ( $args['key'] ) {
        $key = $args['key'];
    }
?>
<section id="<?php if($section_id): echo $section_id; else: echo 'section-'.$key; endif;?>" class="content-section table" >
    <div class="container">
        <?php if($title): echo '<h3 class="title wow animate__animated animate__fadeInLeft">'.$title.'</h3>'; endif;?>

        <table class="table">
            <thead>
                <tr>
                    <?php foreach($top_table_headings as $heading): ?>
                        <th scope="col"><?php echo $heading['cell_content']; ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $num_of_heading = count($top_table_headings);
                ?>

                <?php 
                    foreach ($main_table_content_advanced as $row): 
                        $cell_style_change = $row['cell_style_change'];?>
                         <tr>
                            <th class="<?php echo $cell_style_change; ?>"><?= $row['title']; ?></th> <!-- First column as <th> -->
                                <?php 
                                if (!empty($row['table_row_item'])) {
                                    foreach ($row['table_row_item'] as $cell): ?>
                                        <td class="<?php echo $cell_style_change; ?>"><?= $cell['cell_content']; ?></td> 
                                    <?php endforeach; 
                                } else {
                                    // If content array is empty, fill with empty cells
                                    for ($i = 0; $i < $num_of_heading - 1; $i++): ?>
                                        <td></td>
                                    <?php endfor; 
                                }
                                ?>
                        </tr>
                    <?php endforeach;
                ?>
            </tbody>
        </table>
        <div class="table-notes">
            <?php echo $table_notes;?>
        </div>
    </div>
</section>