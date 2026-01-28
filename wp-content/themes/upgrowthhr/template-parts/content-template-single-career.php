<?php
$post_id = get_the_ID();
$post_title = get_the_title();
$post_name = get_post_field('post_name', $post_id);
$job_type = get_field('job_type');
$tagging = get_field('tagging');
$details = get_field('details');
$departments = get_the_terms($post_id, 'department');
$back_url = ( isset($_GET['back']) && !empty($_GET['back']) ) ? $_GET['back'] : home_url('career');
$back_to_career = ( !isset($_GET['back']) ) ? '?department=' . $departments[0]->slug : '';
$back_url .= $back_to_career;

$job_application = home_url('job-application') . '?job_position=' . urlencode($post_title);
?>
<section class="section-single-career">
    <div class="site-container">
        <div class="site-row">
            <div class="single-career-header">
                <div class="single-back-button">
                    <a href="<?= $back_url . '#career-id-'.$post_id;?>" class="btn btn-outline back-button-link"><i class="fa fa-arrow-left"></i><span>Back To Career</span></a>
                </div>
                <div class="career-header-inner">
                    <div class="site-col col-header-info">
                        <div class="career-dep-title btn btn-outline"><?= $departments[0]->name;?></div>
                        <h1 class="career-title"><?= $post_title;?></h1>
                        <div class="career-metas">
                        <?php
                        if( $tagging ) {
                            foreach( $tagging as $tag ) { ?>
                                <div class="meta-item btn btn-outline"><?= $tag->name;?></div>
                            <?php }
                        }
                        ?>
                        </div>
                    </div>
                    <div class="site-col col-job-apply">
                        <div class="btn-wrapper">
                            <a href="<?= $job_application;?>" class="btn btn-formal"><span>Apply Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="single-career-body">
                <div class="career-body-inner">
                <?php foreach( $details as $item ) {
                    $item_title = $item['title'];
                    $item_id = sanitize_title($item_title);
                    $item_content = $item['content'];
                ?>
                    <div class="detail-item text-editor">
                        <h4 class="detail-title"><?= $item_title;?></h4>
                        <div class="detail-content"><?= $item_content;?></div>
                    </div>
                <?php
                } ?>
                </div>
            </div>
        </div>
    </div>
</section>