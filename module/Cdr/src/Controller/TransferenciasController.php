<?php

namespace Cdr\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * TransferenciasController
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link -
 */
class TransferenciasController extends AbstractActionController
{

    const ENTITY = '\\Cdr\\Entity\\Cdr';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public function getEm()
    {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function diarioAction()
    {
        $form = new \Application\Form\Dia();

        $cdrs = null;
        $reporte = null;
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
              $form->setData($data);
            $start = new \DateTime($data["fecha"]);
            $end = clone $start;
            $end->modify('+1 day');
            $cdrs = $this->getEntityRepository()->getByDate($start, $end);
            foreach ($cdrs as $cdr) {

                //Salintes Internos
                if (strlen($cdr["src"]) == 3) {
                    //Salientes Total
                    $reporte[$cdr["src"]]["Total"]["all"] ++;

                    if ($cdr["disposition"] == "ANSWERED") {
                        $reporte[$cdr["src"]]["Total"]["ok"] ++;
                    }


                    
                }
            }
        }


        return ["form" => $form, 'reporte' => $reporte];
    }


}

