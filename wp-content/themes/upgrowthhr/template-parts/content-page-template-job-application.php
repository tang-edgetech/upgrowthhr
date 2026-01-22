<?php
$job_position = (isset($_GET['job_position'])) ? $_GET['job_position'] : '';
$job = (isset($_GET['job_position'])) ? get_page_by_path($job_position, OBJECT, 'career') : '';
$job_id = $job->ID;
$job_title = $job->post_title;

$post_id = get_the_ID();
$post_title = get_the_title();
$post_name = get_post_field('post_name', $post_id);
$job_type = get_field('job_type');
$tagging = get_field('tagging');
$details = get_field('details');
$departments = get_the_terms($post_id, 'department');
$back_url = ( isset($_GET['back']) && !empty($_GET['back']) ) ? $_GET['back'] : home_url('career');
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
                    <?php if( $job ) { ?> 
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
                    <?php } else {

                    } ?>
                    </div>
                    <div class="site-col col-job-apply">
                        <div class="btn-wrapper">
                        <?php if( $job ) { ?> 
                            <button type="button" class="btn btn-formal" id="submit-job-application"><span>Submit Application</span></button>
                        <?php } ?>
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