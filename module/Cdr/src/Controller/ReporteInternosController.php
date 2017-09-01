<?php

namespace Cdr\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * ReporteInternosController
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link -
 */
class ReporteInternosController extends AbstractActionController {

    const ENTITY = '\\Cdr\\Entity\\Cdr';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public function getEm() {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function getEntityRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function diarioAction() {
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


                    if (preg_match("/^0800|^0810|^0600/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["Especial"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["Especial"]["ok"] ++;
                        }
                    } else if (preg_match("/15\d{8}|15\d{7}|15\d{6}$/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["Celular"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["Celular"]["ok"] ++;
                        }
                    } else if (preg_match("/^\d{8}$/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["Local"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["Local"]["ok"] ++;
                        }
                    } else if (preg_match("/^0?\d{10}$/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["LDN"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["LDN"]["ok"] ++;
                        }
                    } else if (preg_match("/^00\d*$/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["LDI"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["LDI"]["ok"] ++;
                        }
                    } else if (preg_match("/^\d{3}$/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["Interna"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["Interna"]["ok"] ++;
                        }
                    } else {
                        $reporte[$cdr["src"]]["Resto"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["Resto"]["ok"] ++;
                        }
                    }
                }
            }
        }


        return ["form" => $form, 'reporte' => $reporte];
    }

    public function mensualAction() {
         $form = new \Application\Form\Mes();

        $cdrs = null;
        $reporte = null;
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $form->setData($data);
            $start = new \DateTime($data["anio"]."-".$data["mes"]."-01");
            $end = clone $start;
            $end->modify('+1 month');
            $cdrs = $this->getEntityRepository()->getByDate($start, $end);
            foreach ($cdrs as $cdr) {

                //Salintes Internos
                if (strlen($cdr["src"]) == 3) {
                    //Salientes Total
                    $reporte[$cdr["src"]]["Total"]["all"] ++;

                    if ($cdr["disposition"] == "ANSWERED") {
                        $reporte[$cdr["src"]]["Total"]["ok"] ++;
                    }


                    if (preg_match("/^0800|^0810|^0600/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["Especial"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["Especial"]["ok"] ++;
                        }
                    } else if (preg_match("/15\d{8}|15\d{7}|15\d{6}$/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["Celular"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["Celular"]["ok"] ++;
                        }
                    } else if (preg_match("/^\d{8}$/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["Local"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["Local"]["ok"] ++;
                        }
                    } else if (preg_match("/^0?\d{10}$/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["LDN"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["LDN"]["ok"] ++;
                        }
                    } else if (preg_match("/^00\d*$/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["LDI"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["LDI"]["ok"] ++;
                        }
                    } else if (preg_match("/^\d{3}$/", $cdr["dst"])) {
                        $reporte[$cdr["src"]]["Interna"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["Interna"]["ok"] ++;
                        }
                    } else {
                        $reporte[$cdr["src"]]["Resto"]["all"] ++;

                        if ($cdr["disposition"] == "ANSWERED") {
                            $reporte[$cdr["src"]]["Resto"]["ok"] ++;
                        }
                    }
                }
            }
        }


        return ["form" => $form, 'reporte' => $reporte];
    }

    public function anualAction() {
        $form = new \Application\Form\Anio();

        return ["form" => $form];
    }

}
