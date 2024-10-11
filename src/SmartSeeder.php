<?php

namespace Alive2212\LaravelSmartModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmartSeeder extends Seeder
{
    protected $records = [];

    protected $baseModel = null;

    public function runTransaction()
    {
        echo get_called_class();
        echo PHP_EOL;
        DB::beginTransaction();
        foreach ($this->records as $record) {
            if ($this->baseModel instanceof Model) {
//                dd($record);
                (new SmartSeederController())->deepAssociation($this->baseModel, $record);
            }
        }
        DB::commit();
    }
}
