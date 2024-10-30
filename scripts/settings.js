jQuery(document).ready(function($){
    $('#save-login-settings-button').click(function(){
        var button = $(this);
        var spinner = $('#save-login-settings-spinner');
        var message = $('#login-settings-message');
        
        button.attr('disabled', 'diabled');
        spinner.show();
        message.empty().hide();
        
        var data = {};
        
        $.each($('#login-settings-form').serializeArray(), function(i, v){
            data[v.name] = v.value;    
        });
        
        $.post(
            im_ar_cfg.ajax_url,
            {
                action : 'im_ar_login_check',
                data : data
            },
            function (response) {
                button.removeAttr('disabled');
                spinner.hide();
                
                if ('object' == typeof(response) && response.Success) {
                    $.each(response.SuccessText, function(i, v){
                        message.append($(document.createElement('p')).append(v));
                    });
                    
                    message.show(); 
                } else {
                    $.each(response.ErrorText, function(i, v){
                        message.append($(document.createElement('p')).append(v));
                    });
                    
                    message.show();
                }
            },
            'json'
        );
    });         
});