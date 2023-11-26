<?php
get_header();
$post_id = get_the_ID();
$tags = get_the_tags($post_id);
$tag_name = isset($tags[0]->name) ? $tags[0]->name : '';
$image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'single-post-thumbnail');
?>
<section class="banner_top position-relative" style="background-image: url('https://images.pexels.com/photos/1105666/pexels-photo-1105666.jpeg?auto=compress&cs=tinysrgb&w=1920&h=750&dpr=1');">
    <div class="overlay position-absolute w-100 h-100 " style="background-color: rgba(0 0 0 / .5); top: 0;left: 0;">
    </div>
    <div class="container position-absolute start-50 translate-middle text-center " style="top: 55%;">
        <div class="row">
            <div class="col-12 offset-sm-2 col-sm-8 text-white">
                <p class="mb-0"><?php echo $tag_name; ?></p>
                <h1 class="banner_heading mb-1"><?php the_title(); ?></h1>
                <span><?php echo get_the_date(); ?></span>
            </div>
        </div>
    </div>
</section>
<section class="container my-4">
    <div class="row g-4 g-xl-5 align-items-center">
        <div class="col-12">
            <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
        </div>
        <div class="col-md-6 col-xl-5">
            <img src="<?php echo $image[0]; ?>" alt="" class="img-fluid w-100" style="aspect-ratio: 1/.8;">
        </div>
        <div class="col-md-6 col-xl-7">
            <h2 class="mb-2" style="font-size: 28px;"><?php the_title(); ?></h2>
            <p class="mb-0"><?php the_content(); ?></p>
        </div>
    </div>
</section>