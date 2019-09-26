<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage LambadaLite
 * @since 1.0
 * @version 1.0
 */

?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

    <div class='container-fluid rt-tpg-container' id='rt-tpg-container-1385425394'>
<div class="layout2 mas-grid">

<article id="post-<?php the_ID(); ?>" <?php post_class('rt-col-lg-12 rt-col-md-12 rt-col-sm-12 rt-col-xs-12 rt-equal-height'); ?>>
    <div class="rt-holder">
        <div class="row">
            <div class="rt-col-sm-3 rt-col-xs-12 ">

	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="rt-img-holder" >
			<a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'post-thumbnail size' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
                </div>

            <div class="rt-col-sm-9 rt-col-xs-12 ">
                <div class="rt-detail">
                    <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink( )) ?>">
                            <?php the_title(); ?>
                        </a></h2>
                    <div class="post-meta-user">
                        <span class="date-meta"><i class="fa fa-calendar"></i> <?php the_date(" F j, Y"); ?></span>
                        <span class="author"><i class="fa fa-user"></i><a href="<?php echo esc_url( get_permalink( )) ?>"> <?php the_author(); ?></a></span>
                        <span class="categories-links"><i class="fa fa-folder-open-o"></i><a href="<?php echo esc_url( get_permalink( )) ?>" rel="tag"><?php the_category( ', ' ); ?></a></span>
                    </div>
                 <?php    $excerpt= wp_trim_words( get_the_content(), 8, '...' );
                    echo $excerpt; ?>
                    <span class="read-more"><a href="<?php echo esc_url( get_permalink( )) ?>">Read More</a></span>

                </div>
            </div>
        </div>
    </div>
</article>

</div>
</div>




<style type="text/css" media="all">
    #rt-tpg-container-1385425394 .rt-detail i,
    #rt-tpg-container-1385425394 .rt-detail .post-meta-user a,
    #rt-tpg-container-1385425394 .rt-detail .post-meta-category a {
        color: #1e73be;
    }

    body .rt-tpg-container .rt-tpg-isotope-buttons .selected {

    }

    #rt-tpg-container-1385425394 .pagination li a:hover,
    #rt-tpg-container-1385425394 .rt-tpg-isotope-buttons button:hover,
    #rt-tpg-container-1385425394 .rt-detail .read-more a:hover {
        background-color: #31a042;
    }

    #rt-tpg-container-1385425394 .rt-detail h2.entry-title a {
        color: #1e73be;
    }

    .row {
        height: 275px;
    }

    .rt-tpg-container .rt-equal-height {
        margin-bottom: 15px;
        background: #9ab9e094;
        height: 230px;
        border-radius: 8% 0% 0% 8%;
    }

    .rt-tpg-container .layout2 .rt-holder .rt-img-holder {
        position: relative;
        overflow: hidden;

    }

    .rt-detail.rt-tpg-container .layout2 .rt-holder .rt-detail .read-more {
        display: inline-block;
        text-align: right;
        position: relative;
        left: 415px;
    }

    .rt-tpg-container .layout2 .rt-holder .rt-img-holder img {

        transition: all 1.1s ease;
        max-width: 100%;
        height: 228px;
        border: 1px solid green;
        object-fit: cover;
        border-radius: 10% 0% 0% 10%;
    }

    .rt-col-xs-24, .rt-col-sm-24, .rt-col-md-24, .rt-col-lg-24, .rt-col-xs-1, .rt-col-sm-1, .rt-col-md-1, .rt-col-lg-1, .rt-col-xs-2, .rt-col-sm-2, .rt-col-md-2, .rt-col-lg-2, .rt-col-xs-3, .rt-col-sm-3, .rt-col-md-3, .rt-col-lg-3, .rt-col-xs-4, .rt-col-sm-4, .rt-col-md-4, .rt-col-lg-4, .rt-col-xs-5, .rt-col-sm-5, .rt-col-md-5, .rt-col-lg-5, .rt-col-xs-6, .rt-col-sm-6, .rt-col-md-6, .rt-col-lg-6, .rt-col-xs-7, .rt-col-sm-7, .rt-col-md-7, .rt-col-lg-7, .rt-col-xs-8, .rt-col-sm-8, .rt-col-md-8, .rt-col-lg-8, .rt-col-xs-9, .rt-col-sm-9, .rt-col-md-9, .rt-col-lg-9, .rt-col-xs-10, .rt-col-sm-10, .rt-col-md-10, .rt-col-lg-10, .rt-col-xs-11, .rt-col-sm-11, .rt-col-md-11, .rt-col-lg-11, .rt-col-xs-12, .rt-col-sm-12, .rt-col-md-12, .rt-col-lg-12 {
        position: relative;
        min-height: 1px;
        padding-left: 8px;
        padding-right: 18px;
    }
    .layout2 .rt-holder .rt-detail .read-more a {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        background: #337ab7;
        font-size: 15px;
        float: right;
    }

    #rt-tpg-container-1385425394 .rt-detail i, #rt-tpg-container-1385425394 .rt-detail .post-meta-user a, #rt-tpg-container-1385425394 .rt-detail .post-meta-category a {
        color: #0367bf;
    }
    .fa{
        color: #0367bf;
    }


</style>
