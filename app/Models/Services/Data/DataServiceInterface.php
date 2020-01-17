<?php
namespace App\Models\Services\Data;

interface DataServiceInterface
{
    function create($newModel);
    function read($id);
    function readAll();
    function update($updatedModel);
    function delete($id);
}

