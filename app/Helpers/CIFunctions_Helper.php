<?php 

  use App\Libraries\CIAuth;
  use App\Models\UsersModel;
  use App\Models\SettingsModel;
  use App\Models\SocialMediaModel;



  if ( !function_exists('get_user') ) {
    function get_user(){
      if( CIAuth::check() ){
        $user = new UsersModel();
        return $user->asObject()->where('id', CIAuth::id())->first();
      }else{
        return NULL;
      }
    }
  }

  if( !function_exists('get_settings') ){
   function get_settings(){
    $settings = new SettingsModel();
    $settings_data = $settings->asObject()->first();

    if( !$settings_data ){
      $data = array(
        'blog_title'=> null,
        'blog_email'=> null,
        'blog_phone'=> null,
        'blog_meta_keywords'=>null,
        'blog_meta_desc'=>null,
        'blog_logo'=>null,
        'blog_favicon'=>null
      );
      $settings->save($data);
      $new_settings_data = $settings->asObject()->first();
      return $new_settings_data;
    }else{
      return $settings_data;
    }
   } 
  }

  if ( !function_exists('get_socmed')){

    function get_socmed(){
      $result = null;
      $socialmedia = new SocialMediaModel();
      $socialmedia_data = $socialmedia->asObject()->first();

      if ( !$socialmedia_data ) {
        $data = array(
          'facebook_url'=>null, 
          'twitter_url'=>null,  
          'instagram_url'=>null,  
          'linkedin_url'=>'https://www.linkedin.com/in/leonard-james-emperado-83b13a1b6',  
          'youtube_url'=>null,  
          'github_url'=>'https://github.com/MasterLenoX',
        );
        $socialmedia->save($data);
        $new_socialmedia_data = $socialmedia->asObject()->first();
        $result = $new_socialmedia_data;
      } else {
        $result = $socialmedia_data;
      }
      return $result;
      

    }

  }
?>