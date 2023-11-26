<?php
get_header();

// check if the repeater field has rows of data
if (have_rows('slider_section')) : ?>
    <section class="hero_slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                $i = 0;
                while (have_rows('slider_section')) : the_row(); ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" class="active" aria-current="true" aria-label="Slide <?php echo $i; ?>"></button>
                <?php
                    $i++;
                endwhile;
                ?>
            </div>
            <div class="carousel-inner">
                <?php
                $j = 'active';
                while (have_rows('slider_section')) : the_row(); ?>
                    <div class="carousel-item <?php echo $j; ?>">
                        <img src='<?php the_sub_field('slider_image'); ?>' loading='lazy' class='d-block slider_img' alt='...'>
                    </div>
                <?php
                    $j = '';
                endwhile;

                ?>
            </div>
    </section>

<?php
endif;

$categories = get_categories(array(
    "hide_empty" => 0,
    "type"      => "post",
    'orderby' => 'name',
    'order'   => 'ASC'
));

?>
<div class="container-md mt-5 category">
    <div class="row g-4">
        <div class="col-12">
            <div class="text-center">
                <h5 class="topic_heading px-3 text-center line text-uppercase d-inline-block mb-4 ">Top Music Categories</h5>
            </div>
            <div class="d-flex align-items-center flex-wrap gap-3 justify-content-between justify-content-md-center position-relative">
                <div class="nav nav-pills justify-content-center">
                    <a class="nav-link active" href="javascript:void(0);" data-term_id=''>All</a>
                    <?php
                    foreach ($categories as $category) {
                        echo '<a class="nav-link" href="javascript:void(0);" data-term_id="' . $category->term_id . '">' . $category->name . '</a>';
                    }
                    ?>
                </div>

                <select name="" id="custom_tag_filter" class="form-select ps-3 w-auto filter">
                    <option value="" selected> Filter by Artist</option>
                    <?php $tags = get_tags(array(
                        'hide_empty' => false
                    ));
                    foreach ($tags as $tag) { ?>
                        <option value="<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-12">
            <?php $args = array(
                'post_type' => 'post',
                'orderby'    => 'ID',
                'post_status' => 'publish',
                'order'    => 'DESC',
                'posts_per_page' => 10
            );
            $result = new WP_Query($args);

            if ($result->have_posts()) : ?>
                <div class="row g-4 category_filter_container">

                    <?php while ($result->have_posts()) : $result->the_post();
                        $post_id = get_the_ID();
                        $tags = get_the_tags($post_id);
                        $tag_name = isset($tags[0]->name) ? $tags[0]->name : '';
                    ?>

                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'single-post-thumbnail'); ?>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="card music_card text-center">
                                <?php if ($image) { ?>
                                    <a href="<?php echo esc_url(get_permalink($post->ID)) ?>" class="mb-2"><img src="<?php echo $image[0]; ?>" alt="image" class="img-fluid music_thumb card-img" /></a>
                                <?php } ?>
                                <h6 class="mb-0 fs-16 fw-semibold"> <a href="#"><?php the_title(); ?> </a></h6>
                                <?php if ($tag_name) { ?>
                                    <small class="text-muted">Music by - <?php echo $tag_name; ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>