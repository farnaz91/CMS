<?php

 class Youtube_Subs_Widget extends WP_Widget {

  //the main function widgets is added here 
    
    public function widget( $args, $instance ) {
      echo $args['before_widget']; 
      //This is to be added for adding the title 

      if ( ! empty( $instance['title'] ) ) {

        //added the filters 
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
      }

      // added the youtube subscriptions 
      echo '<div class="g-ytsubscribe" data-channel="'.$instance['channel'].'" data-layout="'.$instance['layout'].'" data-count="'.$instance['count'].'"></div>';

      echo $args['after_widget']; //keeping the after widgets
    }

//the constructor function is added in here 
      function __construct() {
      parent::__construct(
        'youtubesubs_widget', // The base id for the youtube subs is added 
        esc_html__( 'YouTube Subs', 'yts_domain' ), // an added name and domain
        array( 'description' => esc_html__( 'Widget to display YouTube subs', 'yts_domain' ), ) // arguments are passed
      );
    }
  
  
  
    public function form( $instance ) {

      //adding the variable to pass the parameter
      $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Youtube Subscriptions', 'yts_domain' ); 

      //added the variable to pass the variable 
      
      $channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'jamescookunibrisbane', 'yts_domain' ); 

      //addded the layout variable to be able to pass the parametere
      $layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'yts_domain' ); 

      //added the counts parameter
      $count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'yts_domain' ); 
  
      ?>
      
      
      
      
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
          <?php esc_attr_e( 'Title:', 'yts_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $title ); ?>">
      </p>

      
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
          <?php esc_attr_e( 'Channel:', 'yts_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $channel ); ?>">
      </p>

     
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
          <?php esc_attr_e( 'Layout:', 'yts_domain' ); ?>
        </label> 

        <select 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
          <option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>
            Default
          </option>
          <option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>
            Full
          </option>
        </select>
      </p>

  
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
          <?php esc_attr_e( 'Count:', 'yts_domain' ); ?>
        </label> 

        <select 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>">
          <option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>
            Default
          </option>
          <option value="hidden" <?php echo ($count == 'hidden') ? 'selected' : ''; ?>>
            Hidden
          </option>
        </select>
      </p>
      <?php 
    }
  
    
    public function update( $new_instance, $old_instance ) {
      $instance = array();

      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

      $instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? strip_tags( $new_instance['channel'] ) : '';

      $instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? strip_tags( $new_instance['layout'] ) : '';

      $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
  
      return $instance;
    }
  
  } 