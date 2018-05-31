<?php
namespace App\Http\Traits;

use Pusher\Pusher;

/**
 * Trait ConnectPusherTrait
 * @package App\Http\Traits
 */
trait ConnectPusherTrait {

  public function connectPusher()
  {
      $auth_key = env('PUSHER_APP_KEY');
      $secret = env('PUSHER_APP_SECRET');
      $app_id = env('PUSHER_APP_ID');

      $options = array(
          'cluster' => 'eu',
          'encrypted' => true
      );
      $this->pusher = new \Pusher($auth_key, $secret, $app_id, $options);
  }

}
