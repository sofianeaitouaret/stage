<?php

namespace App\Repositories;

use App\Absence;

class AbsenceRepository
{

    protected $absence;

    public function __construct(Absence $absence)
    {
        $this->absence = $absence;
    }

    private function save(Absence $absence, Array $inputs)
    {
        $absence->dateDebut = $inputs['debut'];
        $absence->duree = $inputs['duree'];

        $absence->save();

    }




    public function getPaginate($n)
    {
        return $this->absence->paginate($n);
    }

    public function store()
    {

    }

    public function getById($id)
    {
        return $this->absence->findOrFail($id);
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