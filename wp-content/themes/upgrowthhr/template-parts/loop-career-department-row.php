<?php
$dep_name = $args['dep_name'];
$target_dep = (isset($args['target_dep'])) ? $args['target_dep'] : $dep_name;
$career_id = get_the_ID();
$career_title = get_the_title();
$career_slug = get_post_field('post_name', $career_id);
$career_type = get_field('job_type');
$career_tagging = get_field('tagging');
$career_permalink = get_permalink($career_id);
$scheme = is_ssl() ? 'https://' : 'http://';
$back_url = ( isset($args['current_url']) ) ? $args['current_url'] . '?department='.$target_dep : home_url( add_query_arg( NULL, NULL ) );
$back_url = urlencode($back_url);
$data = array(
    'dep_name' => $dep_name,
    'career_id' => $career_id,
    'career_title' => $career_title,
    'career_slug' => $career_slug,
    'career_type' => $career_type,
    'career_tagging' => $career_tagging,
    'career_permalink' => $career_permalink,
    'back_url' => $back_url,
);
get_template_part('template-parts/loop-career', 'job-grid', $data );
?>