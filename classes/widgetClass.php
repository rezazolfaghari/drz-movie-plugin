<?php

// Creating the widget
class drzWidget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'drzWidget',
            __('Movie Widget', textDomain),
            array('description' => __('Display the number of videos', textDomain),)
        );
    }

// Creating widget front-end
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        if (!empty($instance['selectTax'])) {
            $termsArgs = array(
                'taxonomy' => $instance['selectTax'],
                'hide_empty' => false,);
            $terms = get_terms($termsArgs);
            foreach ($terms as $term) { ?>
                    <a href="<?php echo get_term_link($term->term_id) ?>"><?php echo $term->name;  ?><sup><?php echo $term->count;  ?></sup></a><br>
                <?php
            }
        }
//        var_dump($instance);
        echo $args['after_widget'];
    }

// Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', textDomain);
        }
        if (isset($instance)) {
            $taxSelected = $instance['selectTax'];
        }
        //get taxonomies
        $taxonomies = get_object_taxonomies('movie');
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <?php foreach ($taxonomies as $slug):
                $taxonomy = get_taxonomy($slug); ?>
                <input type="radio" id="<?php echo $slug ?>" name="<?php echo $this->get_field_name('selectTax'); ?>"
                       value="<?php echo $slug ?>" <?php if ($taxSelected == $slug) echo "checked"; ?>>
                <label for="<?php echo $slug ?>"><?php echo $taxonomy->label ?></label><br>
            <?php endforeach; ?>
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['selectTax'] = (!empty($new_instance['selectTax'])) ? strip_tags($new_instance['selectTax']) : '';
        return $instance;
    }
}

function drzWidget()
{
    register_widget('drzWidget');
}

add_action('widgets_init', 'drzWidget');
