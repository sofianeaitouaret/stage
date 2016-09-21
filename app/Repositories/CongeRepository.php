<?php

namespace App\Repositories;

use App\Conge;

class CongeRepository
{

    protected $conge;

    public function __construct(Conge $Conge)
    {
        $this->conge = $Conge;
    }

    private function save(Conge $conge, Array $inputs)
    {
        $conge->dateDebut = $inputs['debut'];
        $conge->dateFin = $inputs['fin'];
        $conge->duree = $inputs['duree'];

        $conge->save();

    }

    public function getPaginate($n)
    {
        return $this->conge->paginate($n);
    }

    public function store()
    {

    }

    public function getById($id)
    {
        return $this->conge->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }






}