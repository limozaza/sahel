<?php
namespace App\Normalize;


interface NormalizerInterface
{
    public function normalize(\Exception $exception);
    public function supports(\Exception $exception);
}