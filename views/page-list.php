<?php  
    $login = $im_ar->userLogin();
    if ($login->Success) {
        $lists = $im_ar->listsGet($login->SessionID);
    }
?>
<div class="wrap">
    <h2>List Settings</h2>
    <?php if ($login->Success) : ?>
        <div style="display: none;" class="updated below-h2" id="list-settings-message"></div>
    <?php else: ?>
        <div class="updated below-h2" id="list-settings-message">
            <p>Your login is invalid. Click <a href="<?php echo admin_url('admin.php?page=im-ar-settings'); ?>">here</a> to validate your login.</p>
        </div>
    <?php endif; ?>
    <form id="list-settings-form" onsubmit="return false"> 
        <table class="form-table"> 
            <tr valign="top">
                <th scope="row">
                    <b>Selected List</b><br />
                    <!--<a id="refresh-list-select-link" href="">Refresh Selection</a> -->
                </th>
                <td>
                    <select id="list-select" name="list_id" <?php echo $login->Success ? '' : 'disabled="disabled"' ?>>
                    <?php 
                        if (is_array($lists->Lists)) {
                            foreach ($lists->Lists as $list) {
                                ?>
                                    <option value="<?php echo $list->ListID; ?>"><?php echo $list->Name ?></option>
                                <?php
                            }
                        }
                    ?>
                    </select>
                    <img id="refresh-list-select-spinner" style="display: none; vertical-align: middle;" src="<?php echo admin_url('images/wpspin_light.gif'); ?>" /><br />
                    <i>Choose the list where to send the auto subscriptions.</i>
                </td>
            </tr>
        </table>    
        <p class="submit">
            <input id="save-list-settings-button" <?php echo $login->Success ? '' : 'disabled="disabled"' ?> type="submit" class="button-primary" value="<?php _e('Save List Settings') ?>" />
            <img id="save-list-settings-spinner" style="display: none; vertical-align: middle;" src="<?php echo admin_url('images/wpspin_light.gif'); ?>" />
        </p>
    </form>
</div>
