<?php

/**
 * Exercici1 Model: Model that counts and stores the instriuments.

 */
class HomeExercici1Model extends Model
{

    /**
     * PRE:     ---
     *
     * POST:    ---
     *
     * @return  Array that is the table "Instruments" in the DB.
     */
    public function getAllInstruments(){
        $query = <<<QUERY
        SELECT
                *
        FROM
                `Instruments`
QUERY;
        $instruments = $this->getAll($query);

        return $instruments;
    }

    /**
     * @param $name     Name of the Instrument.
     * @param $type_n   Type of the Instrument.
     * @param $url
     * @return bool
     */
    public function addInstrument($name, $type_n, $url)
    {
        $type = 0;
        if ($type_n == 'corda') {
            $type = 1;
        } elseif ($type_n == 'vent') {
            $type = 2;
        } elseif ($type_n == 'percusio') {
            $type = 3;
        }

        if ($type != 0) {

            // Inserim l'instrument
            $query = <<<QUERY
            INSERT
                    INTO `G7DB`.`Instruments`
                            (`id`, `name`, `type`, `url`)
                    VALUES
                            (NULL, '$name', $type, '$url')
QUERY;

            $this->execute($query);

            return true;
        } else {
            return false;
        }

    }

}