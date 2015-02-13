<?php 
Event::listen('user.confirm', function($user)
{
    $config = Config::get('videoengine.madmimi');
    $mimi = new Madmimi($config['email'], $config['api_key']);
    $country = isset($_SERVER["HTTP_CF_IPCOUNTRY"]) ? $_SERVER["HTTP_CF_IPCOUNTRY"] : 'XX';

    $user = array('email' => $user->email, 'username' => $user->username, 'add_list' => $config['list_name'] . ' ' . $country);
    $status = $mimi->addUser($user);
});