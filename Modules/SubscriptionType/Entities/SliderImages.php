<?php

namespace Modules\SubscriptionType\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
// use App;

class SliderImages extends Model
{
    protected $table = 'SliderImages';
    protected $primaryKey = 'SliderImages_id';
    protected $fillable = [ 'name' ];

    public function listAll(){

        $dataRow = self::select('SliderImages_id',
        'name')->get()->toArray();
        $data =[];

        // echo URL::to(''); // Base URL
        foreach ($dataRow as $key => $value) {
            $data[] = array('id'=>$value['SliderImages_id'],'path'=>URL::to('public/SliderImages/'.$value['name']));
        }

        return $data;
                            }
}
