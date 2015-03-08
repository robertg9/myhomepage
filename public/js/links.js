var counter = 2;
jQuery('#next #add-next').click(function() {
    html = '<p><input type="text" maxlength="200" name="link' + counter + '" size="100"></p>';
    jQuery(this).parent('p#next').before(html);
    counter++;
});

jQuery('#change-status').click(function() {
    newStatus = jQuery(this).text();
    userget = jQuery('#user-get').text();
    jQuery.post('/user', {status : newStatus, userget: userget}, function(data) {
        if (data != '') {
            jQuery('#current-status').html(data);
            if (data == 'private') {
                jQuery('#current-status').removeClass('green').addClass('red');
                jQuery('#change-status').text('publicacc');
            } else {
                jQuery('#current-status').removeClass('red').addClass('green');
                jQuery('#change-status').text('private');
            }
    }   
    });
    
    return false;
});
