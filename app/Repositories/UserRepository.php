<?php

namespace App\Repositories;

use App\Email;

class UserRepository
{

    protected $user;

    public function __construct(Email $user)
    {
        $this->user = $user;
    }

    private function save(Email $user, Array $inputs)
    {
        $user->nameSalarie = $inputs['nom'];
        $user->prenomSalarie = $inputs['prenom'];


        $user->save();
    }

    private function save2(Email $user, Array $inputs)
    {
        $user->etat= $inputs['etat'];
        $user->dateArret= $inputs['arret'];


        $user->save();
    }

    public function getPaginate($n)
    {
        return $this->user->paginate($n);
    }

    public function store(Array $inputs)
    {
        $user = new $this->user;
        $user->password = bcrypt($inputs['password']);

        $this->save($user, $inputs);

        return $user;
    }

    public function getById($id)
    {
        return $this->user->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    public function update2($id, Array $inputs)
    {
        $this->save2($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

}