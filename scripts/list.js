jQuery(document).ready(function($){   
    $('#save-list-settings-button').click(function(){
        var button = $(this);
        var spinner = $('#save-list-settings-spinner');
        var message = $('#list-settings-message');
        
        button.attr('disabled', 'disabled');
        spinner.show();
        message.empty().hide();
        
        $.post(
            im_ar_cfg.ajax_url,
            {
                action : 'im_ar_save_list',
                data : {list_id : $('#list-select').val()}
            },
            function(response) {
                button.removeAttr('disabled');
                spinner.hide();
                            
                if ('object' == typeof(response) && response.Success) {
                    $.each(response.SuccessText, function(i, v){
                        message.append($(document.createElement('p')).append(v));
                    });
                    
                    message.show(); 
                } else {
                }         
            },
            'json'
        );
    });       
});