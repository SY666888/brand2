<?php

namespace App\Admin\Actions\Grid\RowAction;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class HuifuAction  extends RowAction
{
    protected $model;
    public function __construct(string $model = null)
    {
        $this->model = $model;
    }

    /**
     * æ é¢
     *
     * @return string
     */
    public function title()
    {
        return 'ð§ï¸æ¢å¤';
    }

    /**
     * å¤çå¨ä½é»è¾
     * @return Response
     */
    public function handle(Request $request)
    {
        // è·åå½åè¡ID
         $id = $this->getKey();
        /*if (!Admin::user()->can('brand_huifu')) {
            return $this->response()
                ->error('ä½ æ²¡ææéæ§è¡æ­¤æä½ï¼')
                ->refresh();
        }*/
        // è·å parameters æ¹æ³ä¼ éçåæ°
        //$username = $request->get('username');
        $model = $request->get('model');
        $brand=$model::find($id);
        $brand->state=-1;
        $brand->untype=null;
        $brand->save();
        // è¿åååºç»æå¹¶å·æ°é¡µé¢
        return $this->response()->success("å·²å®ææ¢å¤ï¼")->refresh();
    }

    /**
     * å¯¹è¯æ¡
     * @return string[]
     */
     public function confirm(): array

    {
    return ['ç¡®è®¤è¦æ¢å¤åï¼', 'æ¢å¤çåæ¶å°ä¼å é¤æä½è®°å½ï¼'];
    }




     /**
     * è®¾ç½®è¦POSTå°æ¥å£çæ°æ®
     *
     * @return array
     */
    public function parameters()
    {
        return [
            // åéå½åè¡ username å­æ®µæ°æ®å°æ¥å£
            //'username' => $this->row->brand_username,
            // ææ¨¡åç±»åä¼ éå°æ¥å£
            'model' => $this->model,
        ];
    }

}
