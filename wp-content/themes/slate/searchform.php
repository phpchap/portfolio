<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <input type="text" onfocus="if (this.value == '<?php _e('Search Site','okay'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search Site','okay'); ?>';}" value="<?php _e('Search Site','okay'); ?>" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="" />
    </div>
</form>