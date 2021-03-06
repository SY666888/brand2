<?php
namespace App\Admin\Actions\Grid\RowAction;
use  App\Models\Brand;
use  App\Models\AnxjmBrand;
use  App\Models\AnxjmNew;
use App\Models\W51xxspNew;
use App\Models\W51xxspBrand;
use  App\Models\AnxjmPaizi;
use App\Models\W51xxspPaizi;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class GetnewsAction  extends RowAction
{
    protected $title = 'ðèµè®¯é¢å';
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
        if($model==AnxjmNew::class)
        {
            $web = AnxjmPaizi::class;
            $web_news='anx_news';
            $web_news_num='anx_news_num';
        }
        elseif ($model==W51xxspNew::class)
        {
            $web = W51xxspPaizi::class;
            $web_news='51xx_news';
            $web_news_num='51xx_news_num';
        }
        // è·åå½åè¡ID
        $brand = $model::where('brand_id',$id)->first();
        $brandname = Brand::find($id);
        $brand_web = $web::where('brand','like','%'.$brandname->brandname.'%')->first();
                        
        //æ°æ®æ¯è¾
        $userid=Admin::user()->id;
        $username=Admin::user()->name;
         if ($brand=== null) {
                 $brandname->$web_news=-1;
                 $brandname->$web_news_num=$brand->news_num??'-1';
                 $brandname->save();
                 $brand_get = new $model();
                 $brand_get->brand_id = $id;
                 $brand_get->brand_userid = $userid;
                 $brand_get->brand_username = $username;
                 $brand_get->save();
                 return $this->response()
                     ->success('èµè®¯åçé¢åæå!ï¼')
                     ->refresh();
            
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
