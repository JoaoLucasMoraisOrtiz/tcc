<?php

use FFI\Exception;

/* CÓDIGOS COM TREIXOS DE EXEMPLO!!!! NECESSITA DE CRIAR A PARTE DE CONEXÃO COM A DB */

class CreatePlants
{

    /**
     * Variável responsável por guardar nossas folhas da esquerda
     * @var array
     */
    private $leafLeft;

    /**
     * Variável responsável por guardar nossas folhas da direita
     * @var array
     */
    private $leafRight;

    /**
     * Variável responsável por guardar nossos caules
     * @var array
     */
    private $trunk;

    /**
     * Variável responsável por guardar nossas copas ou flores
     * @var array
     */
    private $top;

    /**
     * Variável responsável por guardar nossos Ids de plantas já criadas
     * @var array
     */
    private $createdCode;

    /* Funções privadas da classe */


    /**
     * Método responsável por buscar no banco de dados as possibilidades de folhas esquerdas
     */
    private function getLeafLeft()
    {
        $this->leafLeft = [

            001 => ['001', 'FolhaEsquerda001', 'comun'],
            002 => ['002', 'FolhaEsquerda002', 'comun'],
            003 => ['003', 'FolhaEsquerda003', 'comun'],
            004 => ['004', 'FolhaEsquerda004', 'rare'],
            005 => ['005', 'FolhaEsquerda005', 'epic'],
            006 => ['006', 'FolhaEsquerda006', 'legendary']
        ];
    }

    /**
     * Método responsável por buscar no banco de dados as possibilidades de folhas direitas
     */
    private function getLeafRight()
    {
        $this->leafRight = [
            001 => ['001', 'FolhaDireita001', 'comun'],
            002 => ['002', 'FolhaDireita002', 'comun'],
            003 => ['003', 'FolhaDireita003', 'comun'],
            004 => ['004', 'FolhaDireita004', 'rare'],
            005 => ['005', 'FolhaDireita005', 'epic'],
            006 => ['006', 'FolhaDireita006', 'legendary']
        ];
    }

    /**
     * Método responsável por buscar no banco de dados as possibilidades de caule
     */
    private function getTrunk()
    {
        $this->trunk = [
            001 => ['001', 'Tronco001', 'comun'],
            002 => ['002', 'Tronco002', 'comun'],
            003 => ['003', 'Tronco003', 'comun'],
            004 => ['004', 'Tronco004', 'rare'],
            005 => ['005', 'Tronco005', 'epic'],
            006 => ['006', 'Tronco006', 'legendary']
        ];
    }

    /**
     * Método responsável por buscar no banco de dados as possibilidades de topo da planta
     */
    private function getTop()
    {
        $this->top = [
            001 => ['001', 'Topo001', 'comun'],
            002 => ['002', 'Topo002', 'comun'],
            003 => ['003', 'Topo003', 'comun'],
            004 => ['004', 'Topo004', 'rare'],
            005 => ['005', 'Topo005', 'epic'],
            006 => ['006', 'Topo006', 'legendary']
        ];
    }

    /**
     * Método responsável por buscar no banco de dados as plantas que ja foram criadas
     */
    private function getPlantsIds()
    {
        $this->createdCode = [
            001 => ['001001001001', '123']
        ];
    }

    /**
     * Método responsável por retornar as raridades das partes da planta.
     * @param array $plant
     * @return array
     */
    private function getLevels($plant)
    {
        $leafLeft = $plant['leafLeft'];
        $leafRight = $plant['leafRight'];
        $top = $plant['top'];
        $trunk = $plant['trunk'];
        $life = $plant['life'];

        if($life <= 0 ){
            return 'error!!!';
        }

        $level = ['leafLeft' => $leafLeft, 'leafRight' => $leafRight, 'top' => $top, 'trunk' => $trunk];

        $comun = [];
        $rare = [];
        $epic = [];
        $legendary = [];

        $comunPlus = 0;
        $rarePlus = 0;
        $epicPlus = 0;
        $legendaryPlus = 0;
        $total = 0;

        foreach ($level as $key => $value) {
            if ($value[1] == 'legendary') {
                $comunPlus = $comunPlus + 5;
                $rarePlus = $rarePlus + 2.5;
                $epicPlus = $epicPlus + 1.3;
                array_push($legendary, $key);
            }
        }
        foreach ($level as $key => $value) {
            if ($value[1] == 'epic') {
                //chance de 2.5%
                $possibility = 2.5 + $epicPlus;
                $comunPlus = $comunPlus + 5;
                $rarePlus = $rarePlus + 2.5;

                array_push($epic, [$key, $possibility]);
            }
        }
        foreach ($level as $key => $value) {
            if ($value[1] == 'rare') {
                //chance de 5%
                $possibility = 5 + $rarePlus;
                $comunPlus = $comunPlus + 2.5;

                array_push($rare, [$key, $possibility]);
            }
        };

        foreach ($level as $key => $value) {
            if ($value[1] == 'comun') {
                $possibility = 10 + $comunPlus;
                array_push($comun, [$key, $possibility]);
            }
        };

        return ["comun" => $comun, "rare" => $rare, "epic" => $epic, "legendary" => $legendary];
    }

    private function calcLevel($create = true, $plant = '')
    {
        if ($create) {
            while (true) {
                srand((float)microtime() * 1000000);
                shuffle($this->leafLeft);

                if ($this->leafLeft[0][2] == 'comun') {
                    break;
                }
            }

            while (true) {
                srand((float)microtime() * 1000000);
                shuffle($this->leafRight);

                if ($this->leafRight[0][2] == 'comun') {
                    break;
                }
            }

            while (true) {
                srand((float)microtime() * 1000000);
                shuffle($this->top);

                if ($this->top[0][2] == 'comun') {
                    break;
                }
            }

            while (true) {
                srand((float)microtime() * 1000000);
                shuffle($this->trunk);

                if ($this->trunk[0][2] == 'comun') {
                    break;
                }
            }

            return 'comun';
        } else {
            //da um get no banco de dados com o ID da planta mãe onde podemos pegar os dados

            $plant = [
                'id' => '003002001001',
                'userId' => '456',
                'level' => 'comun',
                'life' => '2',
                'leafLeft' => ['FolhaEsquerda001', 'comun'],
                'leafRight' => ['FolhaDireita001', 'comun'],
                'top' => ['Topo001', 'comun'],
                'trunk' => ['Tronco001', 'comun']
            ];

            $level = $this->getLevels($plant);

            $verifyUpgrade = false;

            foreach ($level as $key => $value) {
                if (count($level[$key]) > 0) {
                    foreach ($value as $position => $content) {

                        $possibility = $content[1];
                        $select = random_int(1, 100);

                        if ($select <= $possibility) {
                            //torna verdadeira a condição de que a planta foi criada
                            $verifyUpgrade = true;
                            break;
                        } else {

                            //caso a planta não tenha upado neste quisito, continua;
                            continue;
                        }
                    }
                   
                    //verifica se a planta foi upada, caso verdadeiro, para a execução do foreach
                    if ($verifyUpgrade) {
                        break;
                    }else{
                        //caso falso, continua
                        continue;
                    }
                }
            }

            //se a planta upou, vamos criar esta nova planta na DB, e retirar uma vida da planta mãe
            if ($verifyUpgrade) {
                print_r($content);
                print_r('ok / <br>');
            }else{

                //se não, vamos fazer o usuário ganhar dinheiro
                print_r('$$$');
            }
            exit;


            echo "<pre>";
            print_r($level);
            exit;
        }
    }

    /* funções públicas da classe */

    public function makePlant($idUser, $new = true, $plant = '')
    {

        $this->getLeafLeft();
        $this->getLeafRight();
        $this->getTop();
        $this->getTrunk();
        $this->getPlantsIds();

        if ($new) {
            $cond = true;
            while ($cond) {

                $this->calcLevel();

                $newPlantId = $this->leafLeft[0][0] . $this->leafRight[0][0] . $this->top[0][0] . $this->trunk[0][0];

                //verificação no banco de dados se há a planta que foi criada (será um GET no ID);
                foreach ($this->createdCode as $key => $value) {

                    if ($newPlantId == $value[0]) {
                        break;
                    } else {
                        //cria o HTML da planta
                        $plant = "<div class='plant'>" . $this->leafLeft[0][1] . "</div>..." .
                            $this->leafRight[0][1] . "..." . $this->top[0][1] . "..." .
                            $this->trunk[0][1] . "...";


                        $level = $this->calcLevel();
                        //cria a planta no banco de dados o ID desta planta, e do seu usuário;
                        array_push($this->createdCode, ["id" => $newPlantId, "userId" => $idUser, "level" => $level, "leafLeft" => [$this->leafLeft[0][1], $this->leafLeft[0][2]], "leafRight" => [$this->leafRight[0][1], $this->leafRight[0][2]], "top" => [$this->top[0][1], $this->leafRight[0][2]], "trunk" => [$this->trunk[0][1], $this->trunk[0][2]]]);

                        //o retorndo deve ser o HTML da planta expecificamente
                        return [$plant, $this->createdCode];
                    }
                }
            }
        } else {
            //criação da planta quando é por semente.
            $this->calcLevel(false, $plant);
        }
    }
}
