<?php

namespace sabas\OAuth1\Client\Server;

use League\OAuth1\Client\Credentials\TokenCredentials;
use League\OAuth1\Client\Server\Server;
use League\OAuth1\Client\Server\User;

class Openstreetmap extends Server
{
    protected $responseType = 'xml';

    public function urlTemporaryCredentials()
    {
        return 'http://www.openstreetmap.org/oauth/request_token';
    }

    public function urlAuthorization()
    {
        return 'http://www.openstreetmap.org/oauth/authorize';
    }

    public function urlTokenCredentials()
    {
        return 'http://www.openstreetmap.org/oauth/access_token';
    }

    public function urlUserDetails()
    {
        return 'http://api.openstreetmap.org/api/0.6/user/details';
    }

    public function userDetails($data, TokenCredentials $tokenCredentials)
    {
        $attributes = $data->user->attributes();

        $user = new User();
        $user->uid = (string) $attributes['id'];
        $user->nickname = (string) $attributes['display_name'];
        $user->description = (string) $data->user->description;
        $user->imageUrl = (string) $data->user->img['href'];
        $user->location = (string) $data->user->home['lon'].",".$data->user->home['lat'];
        $user->extra['accountCreated'] = (string) $attributes['account_created'];
        $user->extra['changesets'] = (string) $data->user->changesets['count'];

        return $user;
    }

    /**
    * {@inheritDoc}
    */
    public function userUid($data, TokenCredentials $tokenCredentials)
    {
        $data = $data->user->attributes();
        return $data['id'];
    }
    /**
    * {@inheritDoc}
    */
    public function userEmail($data, TokenCredentials $tokenCredentials)
    {
        return;
    }
    /**
    * {@inheritDoc}
    */
    public function userScreenName($data, TokenCredentials $tokenCredentials)
    {
        $data = $data->user->attributes();
        return $data['display_name'];
    }
}
