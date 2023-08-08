<?php
/*
Plugin Name: Glossary Items
Description: A custom plugin for creating a custom post type and displaying custom fields.
*/

// Register Custom Post Type
function custom_plugin_register_post_type()
{
    $labels = array(
        'name' => 'Glossary Items',
        'singular_name' => 'Glossary Item',
    );

    $args = array(
        'label' => 'Glossary Items',
        'labels' => $labels,
        'public' => true,
        'supports' => array('title', 'editor'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'glossary-items'),
    );

    register_post_type('glossary_item', $args);
}
add_action('init', 'custom_plugin_register_post_type');

// Add Custom Fields to Glossary Item Post Type
function custom_plugin_add_custom_fields()
{
    add_meta_box('glossary_fields', 'Glossary Fields', 'custom_plugin_render_custom_fields', 'glossary_item', 'normal', 'high');
}
add_action('add_meta_boxes', 'custom_plugin_add_custom_fields');

function custom_plugin_render_custom_fields($post)
{
    $glossary_term = get_post_meta($post->ID, '_glossary_url', true);
    $glossary_definition = get_post_meta($post->ID, '_glossary_definition', true);
    ?>
    <label for="glossary_url">Glossary Url:</label>
    <input type="text" id="glossary_url" name="glossary_url" value="<?php echo esc_attr($glossary_term); ?>">

    <label for="glossary_definition">Glossary Definition:</label>
    <input type="text" id="glossary_definition" name="glossary_definition"  value="<?php echo esc_attr($glossary_definition); ?>">
    <?php
}

function custom_plugin_save_custom_fields($post_id)
{
    if (isset($_POST['glossary_url'])) {
        update_post_meta($post_id, '_glossary_url', sanitize_text_field($_POST['glossary_url']));
    }

    if (isset($_POST['glossary_definition'])) {
        update_post_meta($post_id, '_glossary_definition', sanitize_text_field($_POST['glossary_definition']));
    }
}
add_action('save_post', 'custom_plugin_save_custom_fields');



// Shortcode to Display Glossary Fields
function custom_plugin_display_glossary_fields()
{
    ob_start();
    // WP_Query to retrieve custom posts
    $args = array(
        'post_type' => 'glossary_item',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
    );

    $custom_query = new WP_Query($args);
    ?>
    <div class="alpha-wrapper">
        <div class="alpha-search">
            <input type="search" id="myInput" placeholder="Search for names.." title="Type in a name">
        </div>
        <?php
        // Check if there are any custom posts
        if ($custom_query->have_posts()) {
            $current_letter = '';

            while ($custom_query->have_posts()) {
                $custom_query->the_post();

                // Get the first letter of the title
                $first_letter = strtoupper(substr(get_the_title(), 0, 1));

                // Check if the letter has changed
                if ($first_letter !== $current_letter) {
                    // Close the previous list if it exists
                    if ($current_letter !== '') {
                        echo '</ul>';
                        echo '</div>';
                    }

                    echo '<div class="alpha">';
                    echo '<h2 class="alpha-letter">' . $first_letter . '</h2>';
                    echo '<ul class="alpha-ul">';
                }

                ?>
                <li class="glossary-item"><a href="#">
                        <?php the_title(); ?>
                    </a></li>
                <?php
                $current_letter = $first_letter;
            }
            echo '</ul>';
            echo '</div></div>';
        } else {
            // No custom posts found
            echo 'No glossary items found.';
        }

        // Restore original post data
        wp_reset_postdata();


        return ob_get_clean();
}
add_shortcode('glossary_fields', 'custom_plugin_display_glossary_fields');

// Enqueue Stylesheet and jQuery
function custom_plugin_enqueue_styles()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-plugin-script', plugin_dir_url(__FILE__) . 'js/glossary.js', array('jquery'), '1.0', true);
    wp_enqueue_style('custom-plugin-style', plugin_dir_url(__FILE__) . 'css/glossary.css');
}
add_action('wp_enqueue_scripts', 'custom_plugin_enqueue_styles');





// Add Admin Page as a Subpage
function custom_plugin_add_admin_page() {
    add_submenu_page(
        'edit.php?post_type=glossary_item', // Parent menu slug
        'Custom Plugin Settings', // Page title
        'Settings', // Menu title
        'manage_options', // Capability required to access the page
        'custom-plugin-settings', // Menu slug
        'custom_plugin_render_admin_page' // Callback function to render the page content
    );
}
add_action('admin_menu', 'custom_plugin_add_admin_page');

// Render Admin Page Content
function custom_plugin_render_admin_page() {
    ?>
    <div class="wrap">
        <h1>Glossary Items Plugin</h1>
        <p>To show glossary items alphabetically via this shortcode </p>
        <strong>[glossary_fields]</strong>
    </div>
    <?php
}