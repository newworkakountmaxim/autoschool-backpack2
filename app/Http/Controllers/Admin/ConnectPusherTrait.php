<?php
namespace App\Http\Controllers\Admin;

use Pusher\Pusher;

trait ConnectPusherTrait {
  public function connectPusher()
  {
    $options = array(
        'cluster' => 'eu',
        'encrypted' => true
      );
      $this->pusher = new Pusher(
        '02f850e8b',
        'eb040ae18',
        '534',
        $options
      );
  }

}
