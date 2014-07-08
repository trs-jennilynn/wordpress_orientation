<?php
/*--Add a meta box for pages--*/
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script('wp-color-picker');
}
function simple_define_page_metabox($post) 
{ 
  global $post,$simple_meta;
  //Existing Meta value
  $meta_one_page         = get_post_meta($post->ID,'one_page',true);
  $meta_page_bgcolor       = get_post_meta($post->ID,'page_bgcolor',true);
  $meta_page_bg_trans       = get_post_meta($post->ID,'page_bgtrans',true);
  $meta_parallax_speed       = get_post_meta($post->ID,'parallax_speed',true);

  // Use nonce for verification
  wp_nonce_field(plugin_basename( __FILE__ ), 'simple_noncename' );

  //The title boost field
  

  if($meta_one_page =='yes')
  {
    $yes = 'checked="checked"';
    $no  = '';
  }
  elseif($meta_one_page =='no')
  {
    $no = 'checked="checked"';
    $yes = '';
  }
  else
  {
    $yes = 'checked="checked"';
    $no = '';
  }

  if($meta_page_bgcolor == null)
  {
    $pageColor = '#FFFFFF';
  }
  else
  {
    $pageColor = $meta_page_bgcolor;
  }

  if($meta_page_bg_trans == null)
  {
    $pageBgTrans = '.5';
  }
  else
  {
    $pageBgTrans = $meta_page_bg_trans;
  }

  if($meta_parallax_speed == null)
  {
    $parallax_speed = '1.5';
  }
  else
  {
    $parallax_speed = $meta_parallax_speed;
  }

  

  //Include in One page
  $html = "<div class='title_boost' style=\"border-top: solid 0px #DFDFDF;\">";
  $html .= '<div class="title_boost">';  
  $html .= "<h4 class='labelclass'>Include to Onepage?</h4>";
  $html .= '<input type="radio" id="amaze_hht" name="include_onepage" value="yes" '.$yes.' /> Yes &nbsp;&nbsp;';
  $html .= '<input type="radio" id="amaze_hht" name="include_onepage" value="no"  '.$no.'/> No';  
  $html .= '<br><small>';
  $html .= "If checked 'No' page will be excluded from single page layout.";
  $html .= '</small>'; 
  $html .= '</div>';
  $html .= '</div><br><hr>';

  //PAGE BACKGROUD COLOR
  $html .= "<div class='title_boost' style=\"border-top: solid 0px #DFDFDF;\">";
  $html .= '<div class="title_boost">';  
  $html .= "<h4 class='labelclass'>Select the page color</h4>";
  $html .= '<input type="text" id="page_color" name="page_color" value="'.$pageColor.'" class="my-color-field" data-default-color="'.$pageColor.'" />';
  $html .= '</div>';
  $html .= '</div><br>';

  //PAGE BACKGROUD COLOR TRANSPARENCY
  $html .= "<hr><div class='title_boost' style=\"border-top: solid 0px #DFDFDF;\">";
  $html .= '<div class="title_boost">';  
  $html .= "<h4 class='labelclass'>Background Overlay Transparency</h4>";
  $html .= '<input type="text" id="page_bgtrans" style="width:300px;" name="page_bgtrans" value="'.$pageBgTrans.'"/>';
  $html .= '<br><small>';
  $html .= "[minimum value: 0 and maximum value: 1]";
  $html .= '</small>';
  $html .= '</div>';
  $html .= '</div><br>';

  //PAGE BACKGROUD PARALLAX SPEED
  $html .= "<hr><div class='title_boost' style=\"border-top: solid 0px #DFDFDF;\">";
  $html .= '<div class="title_boost">';  
  $html .= "<h4 class='labelclass'>Background Parallax Speed</h4>";
  $html .= '<input type="text" id="parallax_speed" style="width:300px;" name="parallax_speed" value="'.$parallax_speed.'"/>';
  $html .= '</div>';
  $html .= '</div><br><br>';

  echo'<input type="hidden" name="submit_chk" value="" />';
  echo '<small>';
       _e("",'simplelang' );
  echo '</small>'; 
  

  echo $html;  

}
/*Invoke the box*/
function simple_create_page_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
    add_meta_box( 'page', 'Options', 'simple_define_page_metabox', 'page', 'normal', 'high' );
	
  }
}

add_action('admin_init', 'menu_initialize_theme_options'); 

function menu_initialize_theme_options() {  
    add_settings_section(  
        'menu_settings_section',
        'menu Options',                  
        'menu_general_options_callback',
        'nav-menus.php'                            
    );  

    add_settings_field(  
        'test_field',                        
        'Test',                             
        'menu_test_field_callback',  
        'nav-menus.php',                            
        'menu_settings_section',         
        array(                             
            'Activate this setting to TEST.'  
        )  
    );

    register_setting(  
        'nav-menus.php',  
        'test_field'  
    );
}

function menu_test_field_callback($args) {  
    
}


/*-for saving the meta--*/
function simple_save_metaboxdata($post_id)
{
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
if(isset( $_POST['simple_noncename'])) 
{
    if ( !wp_verify_nonce( $_POST['simple_noncename'], plugin_basename( __FILE__ ) ) )
      return;
}
  // Check permissions
if(isset( $_POST['post_type'])) 
{
    if ( 'page' == $_POST['post_type'] ) 
    {
      if ( !current_user_can( 'edit_page', $post_id ) )
          return;
    }
    else
    {
      if ( !current_user_can( 'edit_post', $post_id ) )
          return;
    }

    
    
    
}
if(isset($_POST['submit_chk']))
  { 
    
    $onepage     = $_POST['include_onepage'];
    $pagebgcolor   = $_POST['page_color'];
    $pagebgtrans   = $_POST['page_bgtrans'];
    $parallax_speed = $_POST['parallax_speed'];

    
    update_post_meta($post_id,'one_page',$onepage);
    update_post_meta($post_id,'page_bgcolor',$pagebgcolor);
    update_post_meta($post_id,'page_bgtrans',$pagebgtrans);
    update_post_meta($post_id,'parallax_speed',$parallax_speed);
    

  } 

}

//Initialize
add_action('admin_menu', 'simple_create_page_metabox'); /*--Plug the metabox*/
add_action( 'save_post', 'simple_save_metaboxdata' ); /*--save metabox content*/



/*---------------------------------------------
-------------Portfolio Metaboxes---------------
----------------------------------------------*/
function simple_define_portfolio_metabox($post) 
{ 
  global $post,$simple_meta;

  //Existing Meta value
  $meta_project_caption = get_post_meta( $post->ID,'project_caption',true);
  $meta_project_bg_color = get_post_meta( $post->ID,'project_bg_color',true);
  $meta_project_type = get_post_meta( $post->ID,'project_type',true);
  $meta_project_url = get_post_meta( $post->ID,'project_url',true);
  $meta_embed_code = get_post_meta( $post->ID,'embed_code',true);
  $meta_project_des = get_post_meta( $post->ID,'project_des',true);
  $meta_slide_count = get_post_meta( $post->ID,'slide_count',true);
  $meta_slides = get_post_meta( $post->ID,'project_slides',true);

  //$meta_embed_code = str_replace("&rsquo;","'",$meta_embed_code);
  //$meta_embed_code = str_replace("&quot;",'"',$meta_embed_code);

  $lightbox_select = '';
  $slider_select = '';
  $standard_select = '';
  $external_select = '';

  if($meta_project_type == 'lightbox')
    $lightbox_select = 'selected="selected"';
  elseif($meta_project_type == 'slider')
    $slider_select = 'selected="selected"';
  elseif($meta_project_type == 'standard')
    $standard_select = 'selected="selected"';
  elseif($meta_project_type == 'external_link')
    $external_select = 'selected="selected"';

  if($meta_slide_count == null)
    $meta_slide_count = 0;

  $slide_markup = '';

  if($meta_slide_count != 0)
  {
    $count = 0;
    $slide_counter = 1;
    foreach($meta_slides as $slides)
    {
      $slide_markup .= "<br>
                        <div class='title_boost'>
                          <br>
                          <div class='labelclass'>Slide <span class='slide_number'>".$slide_counter."</span></div>
                          <input readonly='readonly' id='img_url' value='".$slides."' name='simple_slide_image".$slide_counter."'  class='kp_input_box' type='hidden'>
                          <input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload button' value='Add Image' type='button'>
                          <span style='padding-left:10px;'></span>
                          <input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove button' value='Remove Image' type='button'>
                          <img class='image_preview' style='max-width:300px; display:block; clear:both; margin-top:10px;' src='".$slides."' title='Image URL' alt=''/>
                        </div>";
      $count++;
      $slide_counter++;
    }
  }

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'simple_portfolio_noncename' );




  
//PROJECT SUB HEADING
  $html  = '<div class="title_boost">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Caption";
  $html .= '</div> ';
  $html .= '<input type="text" id="simple_project_caption" name="simple_project_caption" value="'.$meta_project_caption.'" size="45"/>'; 
  $html .= '</div>';

//Backgroud Color
  $html .= "<br><div class='title_boost' style='border-top: solid 1px #DFDFDF;'>";
  $html .= "<br><div class='labelclass'>Select the background color</div>";
  $html .= '<input type="text" id="simple_project_bg_color" name="simple_project_bg_color" value="'.$meta_project_bg_color.'" class="my-color-field" data-default-color="#E74C3C" />';
  $html .= '</div>';

//Portfolio Type
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Choose the Portfolio Type";
  $html .= '</div> ';
  $html .= '<select name="simple_project_type" style="min-width:100px;">
              <option value="lightbox" '.$lightbox_select.'>Lightbox</option>
              <option value="slider" '.$slider_select.'>Slider</option>
              <option value="standard" '.$standard_select.'>Standard</option>
              <option value="external_link" '.$external_select.'>Link to External Page</option>
            </select>'; 
  $html .= '</div>';

//PROJECT URL
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Image / Video / External URL";
  $html .= '</div> ';
  $html .= '<input type="text" id="simple_project_url" name="simple_project_url" value="'.$meta_project_url.'" size="45"/>'; 
  $html .= '</div>';

//PROJECT URL
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Embed Code / iframe";
  $html .= '</div> ';
  $html .= '<input type="text" id="simple_embed_code" name="simple_embed_code" value="'.$meta_embed_code.'" size="45"/>'; 
  $html .= '</div>';
  $html .= '<small>Only iframes are allowed</small><br/>';

//PROJECT Description
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Project Description";
  $html .= '</div> ';
  $html .= '<textarea id="simple_project_des" name="simple_project_des" style="width:500px; height:200px;">'.$meta_project_des.'</textarea>'; 
  $html .= '</div>';

  //Slide Images
  $html .= '<div class="slide_images">'.$slide_markup.'</div>';
  

  //ADD SLIDE BUTTON
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><a href="#" class="docopy-slides button">Add slide</a>'; 
  $html .= '</div><br>';

  $html .= '<input type="hidden" name="slide_count" id="slide_count" value="'.$meta_slide_count.'" />';

  echo $html;

}
/*Invoke the box*/
function simple_create_portfolio_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
    add_meta_box( 'project_caption', 'Portfolio Additions', 'simple_define_portfolio_metabox', 'portfolio_item', 'normal', 'high' );
    
  }
}
/*-for saving the meta--*/
function simple_save_portfolio_metabox($post_id)
{
  global $post;

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if(isset( $_POST['simple_portfolio_noncename'])) 
  {
      if (!wp_verify_nonce( $_POST['simple_portfolio_noncename'], plugin_basename( __FILE__ ) ) )
        return;
  }
  // Check permissions
  if(isset($_POST['post_type']) AND isset($_POST['simple_project_caption']))
  if(isset($_POST['post_type']))
   {

      if ( 'portfolio_item' == $_POST['post_type'] ) 
      {
        if ( !current_user_can( 'edit_page', $post_id ) ) return;
      }
      else
      {
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
      }

      $up_project_caption = $_POST['simple_project_caption'];
      $up_project_bg_color = $_POST['simple_project_bg_color'];
      $up_project_type = $_POST['simple_project_type'];
      $up_project_url = $_POST['simple_project_url'];
      $up_embed_code = $_POST['simple_embed_code'];
      $up_project_des = $_POST['simple_project_des'];
      $up_project_slide_count = $_POST['slide_count'];

      $up_embed_code = str_replace("'","&rsquo;",$up_embed_code);
      $up_embed_code = str_replace('"',"&quot;",$up_embed_code);

      $up_project_slides = array();

      if($up_project_slide_count != 0)
      {
        for($i=1; $i<=$up_project_slide_count; $i++)
        {
          if($_POST['simple_slide_image'.$i] != '')
          {
            array_push($up_project_slides,$_POST['simple_slide_image'.$i]);
          }
        }
      }

      $up_project_slide_count = sizeof($up_project_slides);
      
      update_post_meta($post_id, 'project_caption', $up_project_caption);
      update_post_meta($post_id, 'project_bg_color', $up_project_bg_color);
      update_post_meta($post_id, 'project_type', $up_project_type);
      update_post_meta($post_id, 'project_url', $up_project_url);
      update_post_meta($post_id, 'embed_code', $up_embed_code);
      update_post_meta($post_id, 'project_des', $up_project_des);
      update_post_meta($post_id, 'slide_count', $up_project_slide_count);
      update_post_meta($post_id, 'project_slides', $up_project_slides);
    }

      
}
//Initialize
add_action('admin_menu', 'simple_create_portfolio_metabox'); /*--Plug the metabox*/
add_action( 'save_post', 'simple_save_portfolio_metabox' ); /*--save metabox content*/

/*---------------------------------------------
-------------Team Metaboxes---------------
----------------------------------------------*/

function simple_define_team_metabox($post) 
{ 
  global $post,$simple_meta;

  //Existing Meta value
  $meta_member_image          = get_post_meta( $post->ID,'member_image',true);
  $meta_member_designation    = get_post_meta( $post->ID,'member_designation',true);
  $meta_member_description    = get_post_meta( $post->ID,'member_description',true);
  $meta_member_fb             = get_post_meta( $post->ID,'member_fb',true);
  $meta_member_twitter        = get_post_meta( $post->ID,'member_twitter',true);
  $meta_member_dribble        = get_post_meta( $post->ID,'member_dribble',true);
  $meta_member_bg_color       = get_post_meta($post->ID,'member_bg_color',true);

  if($meta_member_bg_color == null)
  {
    $member_bg_color = '#E74C3C';
  }
  else
  {
    $member_bg_color = $meta_member_bg_color;
  }


  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'simple_team_noncename' );

  
//Brief Image
  $html = "<div class='title_boost'>";
  $html .= "<div class='labelclass'>Profile Image <small>(500px X 500px Only)</small></div>";
  $html .= "<input value='".$meta_member_image."' name='simple_member_image'  class='kp_input_box' type='hidden'>";
  $html .= "<input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload button' value='Add' type='button'>";
  $html .= "&nbsp;<input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove button' value='Remove' type='button'>";
  $html .= "<br><br><img class='image_preview' src='".$meta_member_image."' title='Image URL' alt=''>";
  $html .= "<br><br></div>";
 //Designation 
  $html .= '<div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Member designation";
  $html .= '</div> ';
  $html .= '<input type="text" id="member_designation" name="member_designation" value="'.$meta_member_designation.'" size="35" />'; 
  $html .= '</div>';
  //Decription
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Short Bio";
  $html .= '</div> ';
  $html .= '<textarea cols="75" rows="10" id="member_description" name="member_description">'.$meta_member_description.'</textarea>'; 
  $html .= '<small>';
  $html .= "<br>Description for team member";
  $html .= '</small>';
  $html .= '</div>';
  
  //Facebook 
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Facebook URL";
  $html .= '</div> ';
  $html .= '<input type="text" id="member_fb" name="member_fb" value="'.$meta_member_fb.'" size="30" />'; 
  $html .= '</div>';
 //Twitter 
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Twitter URL";
  $html .= '</div> ';
  $html .= '<input type="text" id="member_twitter" name="member_twitter" value="'.$meta_member_twitter.'" size="30" />'; 
  $html .= '</div>';
 //Dribble 
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Dribble URL";
  $html .= '</div> ';
  $html .= '<input type="text" id="member_dribble" name="member_dribble" value="'.$meta_member_dribble.'" size="30" />'; 
  $html .= '</div>';

  //Backgroud Color
  $html .= "<br><div class='title_boost' style='border-top: solid 1px #DFDFDF;'>";
  $html .= "<br><div class='labelclass'>Select the background color</div>";
  $html .= '<input type="text" id="member_bg_color" name="member_bg_color" value="'.$member_bg_color.'" class="my-color-field" data-default-color="#E74C3C" />';
  $html .= '</div><br>';
  



  echo $html;

}
/*Invoke the box*/
function simple_create_team_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
    add_meta_box( 'team_member', 'Team', 'simple_define_team_metabox', 'team', 'normal', 'high' );
  }
}
/*-for saving the meta--*/
function simple_save_team_metabox($post_id)
{
  global $post;

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if(isset( $_POST['simple_team_noncename'])) 
  {
      if (!wp_verify_nonce( $_POST['simple_team_noncename'], plugin_basename( __FILE__ ) ) )
        return;
  }
  // Check permissions
  if(isset($_POST['post_type']) AND isset($_POST['simple_member_image']))
  if(isset($_POST['post_type']))
   {

      if ( 'team' == $_POST['post_type'] ) 
      {
        if ( !current_user_can( 'edit_page', $post_id ) ) return;
      }
      else
      {
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
      }

      $image                = $_POST['simple_member_image'];
      $designation          = $_POST['member_designation'];
      $member_description   = $_POST['member_description'];
      $member_fb            = $_POST['member_fb'];
      $member_twitter       = $_POST['member_twitter'];
      $member_dribble       = $_POST['member_dribble'];
      $member_bg_color      = $_POST['member_bg_color'];

      update_post_meta($post_id, 'member_image', $image);
      update_post_meta($post_id, 'member_description', $member_description);
      update_post_meta($post_id, 'member_designation', $designation);
      update_post_meta($post_id, 'member_fb', $member_fb);
      update_post_meta($post_id, 'member_twitter', $member_twitter);
      update_post_meta($post_id, 'member_dribble', $member_dribble);
      update_post_meta($post_id, 'member_bg_color', $member_bg_color);
    }


        
}
//Initialize
add_action('admin_menu', 'simple_create_team_metabox'); /*--Plug the metabox*/
add_action( 'save_post', 'simple_save_team_metabox' ); /*--save metabox content*/



/*---------------------------------------------
-------------Post Metaboxes---------------
----------------------------------------------*/
function simple_define_post_metabox($post) 
{ 
  global $post,$simple_meta;

  //Existing Meta value
 
  $meta_post_url = get_post_meta( $post->ID,'post_ext_url',true);
  $meta_post_embed_code = get_post_meta( $post->ID,'post_embed_code',true);
  $meta_post_quote = get_post_meta( $post->ID,'post_quote',true);
  $meta_post_slide_count = get_post_meta( $post->ID,'post_slide_count',true);
  $meta_post_slides = get_post_meta( $post->ID,'post_slides',true);

  //$meta_embed_code = str_replace("&rsquo;","'",$meta_embed_code);
  //$meta_embed_code = str_replace("&quot;",'"',$meta_embed_code);

  if($meta_post_slide_count == null)
    $meta_post_slide_count = 0;

  $post_slide_markup = '';

  if($meta_post_slide_count != 0)
  {
    $count = 0;
    $slide_counter = 1;
    foreach($meta_post_slides as $slides)
    {
      $post_slide_markup .= "<br>
                        <div class='title_boost'>
                          <br>
                          <div class='labelclass'>Slide <span class='slide_number'>".$slide_counter."</span></div>
                          <input readonly='readonly' id='img_url' value='".$slides."' name='simple_slide_image".$slide_counter."'  class='kp_input_box' type='hidden'>
                          <input title='Upload' onclick='register_upload_button_event(jQuery(this));' class='kp_button_upload button' value='Add Image' type='button'>
                          <span style='padding-left:10px;'></span>
                          <input title='Remove' onclick='register_remove_button_event(jQuery(this));' class='kp_button_remove button' value='Remove Image' type='button'>
                          <img class='image_preview' style='max-width:300px; display:block; clear:both; margin-top:10px;' src='".$slides."' title='Image URL' alt=''/>
                        </div>";
      $count++;
      $slide_counter++;
    }
  }

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'simple_post_noncename' );




  
//POST URL
  $html  = '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Link / External URL";
  $html .= '</div> ';
  $html .= '<input type="text" id="simple_post_url" name="simple_post_url" value="'.$meta_post_url.'" size="45"/>'; 
  $html .= '</div>';

//POST Embed Code
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Embed Code / iframe [For Video and Audio Posts]";
  $html .= '</div> ';
  $html .= '<input type="text" id="simple_post_embed_code" name="simple_post_embed_code" value="'.$meta_post_embed_code.'" size="45"/>'; 
  $html .= '</div>';
  $html .= '<small>Only iframes are allowed</small><br/>';

//POST Description
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><div class="labelclass">';
  $html .=  "Blockquote Content";
  $html .= '</div> ';
  $html .= '<textarea id="simple_post_quote" name="simple_post_quote" style="width:500px; height:200px;">'.$meta_post_quote.'</textarea>'; 
  $html .= '</div>';

  //Slide Images
  $html .= '<div class="slide_images">'.$post_slide_markup.'</div>';
  

  //ADD SLIDE BUTTON
  $html .= '<br><div class="title_boost" style="border-top: solid 1px #DFDFDF;">';
  $html .= '<br><a href="#" class="docopy-slides button">Add Image slide</a>'; 
  $html .= '</div><br>';

  $html .= '<input type="hidden" name="post_slide_count" id="slide_count" value="'.$meta_post_slide_count.'" />';

  echo $html;

}
/*Invoke the box*/
function simple_create_post_metabox() 
{
  if ( function_exists('add_meta_box') ) 
  {
     add_meta_box( 'page', 'Options', 'simple_define_post_metabox', 'post', 'normal', 'high' );
    
  }
}
/*-for saving the meta--*/
function simple_save_post_metabox($post_id)
{
  global $post;

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
  if(isset( $_POST['simple_post_noncename'])) 
  {
      if (!wp_verify_nonce( $_POST['simple_post_noncename'], plugin_basename( __FILE__ ) ) )
        return;
  }
  // Check permissions
  if(isset($_POST['post_type']) AND isset($_POST['simple_post_url']))
  if(isset($_POST['post_type']))
   {

      if ( 'post' == $_POST['post_type'] ) 
      {
        if ( !current_user_can( 'edit_page', $post_id ) ) return;
      }
      else
      {
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
      }

      
      $up_post_url = $_POST['simple_post_url'];
      $up_post_embed_code = $_POST['simple_post_embed_code'];
      $up_post_quote = $_POST['simple_post_quote'];
      $up_post_slide_count = $_POST['post_slide_count'];

      $up_post_embed_code = str_replace("'","&rsquo;",$up_post_embed_code);
      $up_post_embed_code = str_replace('"',"&quot;",$up_post_embed_code);

      $up_post_slides = array();

      if($up_post_slide_count != 0)
      {
        for($k=1; $k<=$up_post_slide_count; $k++)
        {
          if($_POST['simple_slide_image'.$k] != '')
          {
            array_push($up_post_slides,$_POST['simple_slide_image'.$k]);
          }
        }
      }

      $up_post_slide_count = sizeof($up_post_slides);
      
      update_post_meta($post_id, 'post_ext_url', $up_post_url);
      update_post_meta($post_id, 'post_embed_code', $up_post_embed_code);
      update_post_meta($post_id, 'post_quote', $up_post_quote);
      update_post_meta($post_id, 'post_slide_count', $up_post_slide_count);
      update_post_meta($post_id, 'post_slides', $up_post_slides);
    }

      
}
//Initialize
add_action('admin_menu', 'simple_create_post_metabox'); /*--Plug the metabox*/
add_action( 'save_post', 'simple_save_post_metabox' ); /*--save metabox content*/
?>