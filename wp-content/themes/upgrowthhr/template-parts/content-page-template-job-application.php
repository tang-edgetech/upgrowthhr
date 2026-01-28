<?php
$job_position = (isset($_GET['job_position'])) ? $_GET['job_position'] : '';
$back_url = home_url('career');
if( isset($_GET['job_position']) ) {
    $job = (isset($_GET['job_position'])) ? get_page_by_path( sanitize_title($job_position), OBJECT, 'career') : '';
    $job_id = $job->ID;
    $job_title = $job->post_title;
    $departments = get_the_terms($job_id, 'department');
    $tagging = get_field('tagging', $job_id);
    $job_permalink = get_permalink($job_id);
    $back_url = $job_permalink;
}
?>
<section class="section-single-career">
    <div class="site-container">
        <div class="site-row">
            <div class="single-career-header">
                <div class="single-back-button">
                    <a href="<?= $back_url;?>" class="btn btn-outline back-button-link"><i class="fa fa-arrow-left"></i><span>Back To Career</span></a>
                </div>
                <div class="career-header-inner">
                    <div class="site-col col-header-info" id="job-header-info">
                    <?php if( isset($_GET['job_position']) ) { ?> 
                        <div class="career-dep-title btn btn-outline"><?= $departments[0]->name;?></div>
                        <h1 class="career-title"><?= $job_title;?></h1>
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
                        $options = [];
                        $c_args = array(
                            'post_type' => 'career',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $c = new WP_Query($c_args);
                        while( $c->have_posts() ) {
                            $c->the_post();
                            $job_title = get_the_title();
                            $options[] = array(
                                'value' => $job_title,
                                'label' => $job_title,
                            );
                        }
                        wp_reset_postdata();
                        if( !empty($options) ) {
                        ?>
                            <form class="wpform wp-selecting-job-postition" id="selecting-job-position">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="selecting_job_position">Select Job Position: </label>
                                        <select name="selecting_job_position" class="input-control" id="selecting_job_position">
                                            <option value="" disabled selected>--Please select a job position--</option>
                                        <?php
                                            foreach( $options as $job ) {
                                                echo '<option value="'.$job['value'].'">'.$job['label'].'</option>';
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        <?php
                        }
                    } ?>
                    </div>
                    <div class="site-col col-job-apply">
                        <div class="btn-wrapper">
                            <button type="button" class="btn btn-formal" id="submit-job-application"><span>Submit Application</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
        <div class="site-row">
            <div class="site-col"><?php the_content();?></div>
        </div>
    </div>
</section>