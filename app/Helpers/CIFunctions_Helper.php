<?php 

  use App\Libraries\CIAuth;
  use App\Models\UsersModel;
  use App\Models\SettingsModel;



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



?>