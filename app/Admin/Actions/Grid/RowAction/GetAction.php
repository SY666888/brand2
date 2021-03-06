<?php

namespace App\Admin\Actions\Grid\RowAction;
use  App\Models\AnxjmPaizi;
use  App\Models\Brand;
use  App\Models\AnxjmBrand;
use App\Models\W51xxspPaizi;
use App\Models\W51xxspBrand;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class GetAction  extends RowAction
{
    protected $title = 'ð¨â é¢å';
    public function __construct(string $model = null)
    {
        $this->model = $model;
    }

    /**
     * å¤çå¨ä½é»è¾
     * @return Response
     */
    public function handle(Request $request)
    {
        // è·åå½åè¡ID
         $id = $this->getKey();
         //è·åä¼ éçæ¨¡å
        $model = $request->get('model');
        if (!Admin::user()->can('pinpai_get')) {
            return $this->response()
                ->error('ä½ æ²¡ææéæ§è¡æ­¤æä½ï¼')
                ->refresh();
        }
        if($model==AnxjmPaizi::class)
        {
            $web=AnxjmBrand::class;
            $web_name='web_anxjm';
        }
        elseif ($model==W51xxspPaizi::class)
        {
            $web=W51xxspBrand::class;
            $web_name='web_51xxsp';
        }
        // è·åå½åè¡ID
        $brand = $web::where('brand_id',$id)->first();
        $brandname = Brand::find($id);
        //æ°æ®æ¯è¾
        $userid=Admin::user()->id;
        $username=Admin::user()->name;
         if ($brand=== null) {
             $a =$model::where('brand', 'like', '%' . $brandname->brandname . '%')->count();
             if ($a>0)
             {
                 $brandname->$web_name=0;
                 $brandname->save();
                 return $this->response()
                     ->error('è¯¥åçå·²ç»åå¸è¿ï¼')
                     ->refresh();

             }
             else {
                 $brandname->$web_name=-1;
                 $brandname->save();
                 $brand_get = new $web();
                 $brand_get->brand_id = $id;
                 $brand_get->brand_userid = $userid;
                 $brand_get->brand_username = $username;
                 $brand_get->save();
                 return $this->response()
                     ->success('åçé¢åæå!ï¼')
                     ->refresh();
             }
         }
         else
         {
             if($brand->brand_userid==$userid)
             {
                 return $this->response()
                     ->error('è¯¥åçå·²ç»è¢«ä½ é¢åï¼æ ééæ°é¢åï¼ï¼')->refresh();
             }
             else
             { return $this->response()
                 ->error('è¯¥åçå·²ç»è¢«å¶å®äººé¢åï¼ä¸è½é¢åï¼ï¼')->refresh();
             }
         }
    }

    /**
     * å¯¹è¯æ¡
     * @return string[]
     * public function confirm(): array
    {
    return ['ç¡®è®¤è¦æ¢å¤åï¼', 'æ¢å¤çåæ¶å°ä¼å é¤ææè·è¿è®°å½ï¼'];
    }
     */
    /**
     * è®¾ç½®è¦POSTå°æ¥å£çæ°æ®
     *
     * @return array
     */
    public function parameters()
    {
        return [
            // ææ¨¡åç±»åä¼ éå°æ¥å£
            'model' => $this->model,
        ];
    }

}
