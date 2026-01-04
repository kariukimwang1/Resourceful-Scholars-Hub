// Enhanced form submission with AJAX
jQuery(document).ready(function($) {
    $('#contactForm').submit(function(e) {
        e.preventDefault();
        
        // Validation logic here
        
        // AJAX submission
        $.ajax({
            url: rsh_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'rsh_contact_submit',
                nonce: rsh_ajax.nonce,
                form_data: $(this).serialize()
            },
            success: function(response) {
                // Handle success
            },
            error: function() {
                // Handle error
            }
        });
    });
});