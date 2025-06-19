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
            'posts_per_page' => 6,
        ]);

        if ($query->have_posts()) {
            echo '<div class="clients-grid">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="client-item">';
                if (has_post_thumbnail()) {
                    the_post_thumbnail('client-thumb', ['class' => 'client-logo']);
                }
                // echo '<h4>' . get_the_title() . '</h4>';
                echo '</div>';
            }
            echo '</div>';
            wp_reset_postdata();
        } else {
            echo '<p>No clients found.</p>';
        }
    }
}
