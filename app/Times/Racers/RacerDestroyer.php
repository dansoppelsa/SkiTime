<?php namespace Times\Racers;

use \Redirect as Redirect;

class RacerDestroyer
{
    public function destroy(Racer $racer)
    {
        // Get a list of races this racer owns
        // Go through each race and get a list of the times for that race
            // Delete each of the times
        foreach($racer->races as $race) {
            foreach($race->times as $time) {
                $time->delete();
            }
            // Delete the race
            $race->delete();
        }
        $racer->delete();

        return true;
    }
}