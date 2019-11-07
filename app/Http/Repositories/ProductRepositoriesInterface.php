<?php


namespace App\Http\Repositories;

interface ProductRepositoriesInterface extends BaseRepositoriesInterface
{
    function save($obj);
    function all($obj);
    function get($search);
    function findById($id);
    function delete($obj);
}
