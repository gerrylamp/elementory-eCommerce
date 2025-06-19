<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Elementor_Clients_Widget extends Widget_Base {

    public function get_name() {
        return 'clients_widget';
    }

    public function get_title() {
        return __('Clients Showcase', 'plugin-name');
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function render() {
        $query = new WP_Query([
            'post_type' => 'clients',
            'posts_per_page' => -1, // Get all clients
        ]);

        $total_clients = $query->found_posts;

        if ($query->have_posts()) {
            // Apply different classes based on client count
            $wrapper_class = 'clients-grid';

            if ($total_clients === 3) {
                $wrapper_class .= ' grid-3';
            } elseif ($total_clients > 6) {
                $wrapper_class .= ' marqueee';
            }

            echo '<div class="' . esc_attr($wrapper_class) . '">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="client-item">';
                if (has_post_thumbnail()) {
                    the_post_thumbnail('client-thumb', ['class' => 'client-logo']);
                }
                echo '</div>';
            }
            echo '</div>';
            wp_reset_postdata();
        } else {
            echo '<p>No clients found.</p>';
        }
    }
}
