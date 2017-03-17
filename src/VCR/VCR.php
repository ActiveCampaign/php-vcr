<?php

namespace VCR;

/**
 * Singleton interface to a Videorecorder.
 *
 * @method static Configuration configure()
 * @method static void insertCassette(string $cassetteName)
 * @method static void turnOn()
 * @method static void turnOff()
 * @method static void eject()
 */
class VCR
{
    /**
     * Always allow to do HTTP requests and add to the cassette. Default mode.
     */
    const MODE_NEW_EPISODES = 'new_episodes';

    /**
     * Only allow new HTTP requests when the cassette is newly created.
     */
    const MODE_ONCE = 'once';

    /**
     * Treat the fixtures as read only and never allow new HTTP requests.
     */
    const MODE_NONE = 'none';

    /**
     * Behaves like MODE_ONCE with the exception that it will only allow making new recordings if the cassette is new
     * and it will only allow playback if the cassette is already created. The cassette must play entirely for
     * strict mode to be fulfilled
     */
    const MODE_STRICT = 'strict';

    public static function __callStatic($method, $parameters)
    {
        $instance = VCRFactory::get('VCR\Videorecorder');

        return call_user_func_array(array($instance, $method), $parameters);
    }
}
