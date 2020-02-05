<?php
    // views/admin.php
?>
<div class="wrap">
	<h2>Plugin Options</h2>
    <p>Set various options for the plugin</p>
    <form method="post" action="options.php">
		<?php wp_nonce_field('update-options') ?>
        <p><strong>Display Shortcode: </strong><br />
            <select name="display_shortcode">
                <option value="yes"<?= $shortcode_yes; ?>>Yes</option>
                <option value="no"<?= $shortcode_no; ?>>No</option>
            </select>
        </p>
        <p><input type="submit" name="Submit" value="Save Options" /></p>
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="display_shortcode" />
    </form>
</div>