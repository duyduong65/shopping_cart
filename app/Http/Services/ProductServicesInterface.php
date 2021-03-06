<?php


namespace App\Http\Services;


interface ProductServicesInterface extends BaseServicesInterface
{
    function getAll();
    function addProduct($request);
    function search($request);
    function destroy($id);
    function edit($id);
    function update($request,$id);
}
