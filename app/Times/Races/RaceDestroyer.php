<?php namespace Times\Races;

class RaceDestroyer
{
    public function destroy(Race $race)
    {
        foreach($race->times as $time) {
            $time->delete();
        }
        $race->delete();

        return true;
    }
}