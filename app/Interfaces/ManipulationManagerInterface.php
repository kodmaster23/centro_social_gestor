<?php


namespace App\Interfaces;


interface ManipulationManagerInterface
{
    public function storeOrUpdate($values, int $id = null);
    public function destroy(int $id);
}