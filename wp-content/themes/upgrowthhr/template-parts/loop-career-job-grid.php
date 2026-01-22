<?php
$dep_name = $args['dep_name'];
$career_id = $args['career_id'];
$career_title = $args['career_title'];
$career_slug = $args['career_slug'];
$career_type = $args['career_type'];
$career_tagging = $args['career_tagging'];
$career_permalink = $args['career_permalink'];
$back_url = $args['back_url'];

?>
<div class="career-item career-item-<?= $career_id;?> career-item-<?= $career_slug;?>" id="career-id-<?= $career_id;?>">
    <div class="career-item-inner">
        <div class="career-header">
            <div class="career-dep-tag"><?= $dep_name;?></div>
            <h4 class="career-title"><?= $career_title;?></h4>
            <div class="career-metas">
            <?php
            if( !empty($career_tagging) ) {
                foreach( $career_tagging as $tag ) {
                ?>
                <div class="meta-item btn btn-outline"><?= $tag->name;?></div>
                <?php
                }
            }
            ?>
            </div>
        </div>
        <div class="career-footer">
            <div class="career-type"><div class="btn btn-outline"><?= $career_type[0]['label'];?></div></div>
            <div class="career-cta">
                <a href="<?= esc_url( $career_permalink.'?back='. $back_url.'#career-id-'.$career_id);?>" class="btn btn-gradient career-cta-link"><span>Details</span><i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>