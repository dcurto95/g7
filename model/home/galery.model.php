<?php

/**
 * Exercici1 Model: Model that counts and stores the instriuments.

 */
class HomeGaleryModel extends Model{

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
     * @param $type_n   Type of the Instrument {corda/vent/percussio}
     * @param $url      Url of the Image on the internet.
     *
     * @return bool     Boolean: "true" when successful, "false" else.
     */
    public function addInstrument($name, $type_n, $url) {

        //Comprovem que les entrades siguin correctes

   //   if(preg_match('^[a-zA-Z]+$',$name , $output_array) == 0){
            $is_name_valid = true;
  //      } else {
  //          $is_name_valid = false;
 //       }

        $type = 0;
        if ($type_n == 'corda') {
            $type = 1;
        } elseif ($type_n == 'vent') {
            $type = 2;
        } elseif ($type_n == 'percussio') {
            $type = 3;
        }

        if ($is_name_valid && $type != 0) {
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

    /**
     * @param $type     Type of the Instrument {1 (corda)/2 (vent)/3 (percussio)}
     * @return          Array of Instruments of the selected Type if exist, NULL else.
     */
    public function getTypeInstrumentsNumeric($type){

        if($type != 0) {
            $query = <<<QUERY
        SELECT
                *
        FROM
                `Instruments`
        WHERE
                `type` = $type
QUERY;
            $instruments = $this->getAll($query);
        } else {
            $instruments = NULL;
        }

        return $instruments;

    }

    /**
     * @param $type_n   Type of the Instrument {corda/vent/percussio}
     * @return          Array of Instruments of the selected Type if exist, NULL else.
     */
    public function getTypeInstruments($type_n){

        $type = 0;
        if ($type_n == 'corda') {
            $type = 1;
        } elseif ($type_n == 'vent') {
            $type = 2;
        } elseif ($type_n == 'percussio') {
            $type = 3;
        }

        return $this->getTypeInstrumentsNumeric($type);
    }

    /**
     * @return      Integer that shows the size of the
     */
    public function getMaxSizeInstruments(){
        $max = 0;
        for($i = 1; $i <= 3; $i++){
            $instruments = $this->getTypeInstrumentsNumeric($i);
            $current = count($instruments);
            if($current > $max){
                $max = $current;
            }
        }

        return $max;
    }


    public function getAllIntrumentsSortedByName(){
        $query = <<<QUERY
        SELECT
                *
        FROM
                `Instruments`
         ORDER BY
                `name`

QUERY;
        $instruments = $this->getAll($query);

        return $instruments;

    }

}
