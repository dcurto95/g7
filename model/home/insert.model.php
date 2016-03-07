<?php

class HomeInsertModel extends Model
{
    public function addInstrument($name, $type_n, $url)
    {
        //Comprovem que les entrades siguin correctes

        $flag=false;
        if(!(strpos($name,'0')!==false)){
            if(!(strpos($name,'1')!==false)){
                if(!(strpos($name,'2')!==false)){
                    if(!(strpos($name,'3')!==false)){
                        if(!(strpos($name,'4')!==false)){
                            if(!(strpos($name,'5')!==false)){
                                if(!(strpos($name,'6')!==false)){
                                    if(!(strpos($name,'7')!==false)){
                                        if(!(strpos($name,'8')!==false)){
                                            if(!(strpos($name,'9')!==false)){
                                                //echo "all ok!!";
                                                $flag=true;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $type = 0;
        switch ($type_n) {
            case 'corda':
                $type = 1;
                break;
            case 'vent':
                $type = 2;
                break;
            case 'percussio';
                $type = 3;
                break;
        }

        if ($type != 0 && filter_var($url, FILTER_VALIDATE_URL) && $flag) {

            // Inserim l'instrument
            $query = "INSERT INTO `instruments` (`name`, `type`, `url`) VALUES ('$name', '$type', '$url');";

            $this->execute($query);

            return true;
        } else {
            return false;
        }


    }
}
