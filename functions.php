// Enqueue contact page assets
function rsh_enqueue_contact_assets() {
    if (is_page('contact')) {
        wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
        wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);
        wp_enqueue_script('rsh-contact', get_template_directory_uri() . '/js/contact.js', array('jquery'), '1.0', true);
        wp_localize_script('rsh-contact', 'rsh_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('rsh_contact_nonce')
        ));
    }
}
add_action('wp_enqueue_scripts', 'rsh_enqueue_contact_assets');

// Handle AJAX form submission
add_action('wp_ajax_rsh_contact_submit', 'rsh_handle_contact_submit');
add_action('wp_ajax_nopriv_rsh_contact_submit', 'rsh_handle_contact_submit');

function rsh_handle_contact_submit() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'rsh_contact_nonce')) {
        wp_send_json_error('Invalid security token');
    }
    
    // Process form data here
    // Send email, save to database, etc.
    
    wp_send_json_success('Message sent successfully!');
}