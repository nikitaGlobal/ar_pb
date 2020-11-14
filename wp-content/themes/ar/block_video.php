<section class="homepage-widget-block">
<div class="wp-video" style="width:100%;">
<video autoplay loop muted playsinline>
<?php $formats = [ 'mp4', 'mov', 'ogv', 'webm' ];
foreach ( $formats as $format ) {
    $file = get_field( 'video_' . $format, 7 );
    if ( ! $file ) {
        continue;
    } ?>
    <source src="<?php echo $file; ?>" type="video/<?php echo $format; ?>">
    <?php
}
?>
 </video>
</div>
</section>