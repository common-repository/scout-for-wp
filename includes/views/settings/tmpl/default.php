<?php
$form = $data['form'];
?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php printf( __( 'Scout for WordPress - Settings v. %s', 'scout-for-wp' ), SCOUT4WP_VERSION ); ?></h1>
    <p>
        Embedding the Scout lead form on your site requires two simple steps:

        <ol>
            <li>Enter your API key below (<a href="https://app.scoutforpets.com/secure/settings/leads">click here to get it</a>)</li>
            <li>Use the <code>[scout_form]</code> shortcode to embed the form in any page you wish.</li>
        </ol>
    </p>
    <p>If you need help, <a href="http://docs.scoutforpets.com/lead-generation/embeddable-lead-form">please review our documentation</a> or <a href="mailto:support@scoutforpets.com">contact us</a>.</p>

    <hr>
    
    <form method="post" action="options.php" class="settings-page">
        <?php $form->render( 'general' ); ?>

        <button type="submit" class="button button-primary"><?php _e( 'Save Changes', 'scout-for-wp' ); ?></button>
        <?php settings_fields( SCOUT4WP_SETTINGS_GROUP ); ?>
    </form>
</div>
