<?php
namespace CriztianiX\Cremilla\Queue;

use josegonzalez\Queuesadilla\Queue as Queuer;
use Josegonzalez\CakeQueuesadilla\Queue\Queue as JQueue;
use Cremilla\Log\Engine\CremillaLog;

class CremillaQueue extends JQueue
{
    /**
     * Fetch the queue attached to a specific engine configuration name.
     *
     * If the queue engine & configuration are missing an error will be
     * triggered.
     *
     * @param string $config The configuration name you want an engine for.
     * @return \josegonzalez\Queuesadilla\Queue
     */
    public static function queue($config)
    {
        if (isset(static::$_queuers[$config])) {
            return static::$_queuers[$config];
        }

        $engine = static::engine($config);
        $queuer = new Queuer($engine);
        $logger = new CremillaLog();
        $queuer->attachListener('Queue.afterEnqueue', function ($response) use ($logger) {
            $data = $response->data();
            $logger->log("info", "Job enqueued", []);
        });
        return static::$_queuers[$config] = $queuer;
    }
}
