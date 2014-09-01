<form action="<?php echo PAYPAL_URL; ?>" method="POST">
    <input type="hidden" name="currency_code" value="CAD" />
    <input type="hidden" name="business" value="<?php echo PAYPAL_EMAIL; ?>" />
    <input type="hidden" name="return" value="<?php echo url('/'); ?>"/>
    <input type="hidden" name="cancel_return" value="<?php echo url('/'); ?>"/>
    <input type="hidden" name="cmd" value="_cart" />
    <input type="hidden" name="upload" value="1" />
    <input type="hidden" name="notify_url" value="<?php echo PAYPAL_IPN_NOTIFICATION_URL; ?>" />
