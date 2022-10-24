<?php
    namespace App\Entity;

    use \App\Db\Database;
    use \PDO;


    class Vaga{
        /**
         * Identificador
         * @var integer
         */
        public $id;

        /**
         * nome da vaga
         * @var string
         */
        public $titulo;

        /**
         * o que a vaga apresenta
         * @var string
         */
        public $descricao;

        /**
         * 
         * aberto ou nao
         * @var string(s/n)
         */
        public $ativo;

        /**
         * data da vaga
         * @var string
         */
        public $data;


        /**
         * cadastrar novas vagas
         * @return boolean
         */
        public function cadastrar(){
            //definição de data
            $this->data = date('Y-m-d H:i:s');
            //inserir vaga
            $obDatabase = new Database('vagas');
            $this->id = $obDatabase-> insert([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'ativo' => $this->ativo,
                'data' => $this->data

            ]);
                    //echo "<pre>"; print_r($this); echo "</pre>"; exit;
            
            //retornar success
            return true;
        }

        public static function getvagas($where = null, $order = null, $limit = null){
            return (new Database('vagas'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        }
       /**
        * Buscar vaga
        *@param integer $id
        *@return Vaga
        */
        public static function getVaga($id){
            return (new Database('vagas'))->select('id = '.$id)
                                          ->fetchObject(self::class);
        }
    }