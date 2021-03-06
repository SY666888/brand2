<?php
namespace App\Admin\Actions\Post;
use App\Models\TeshuBrand;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Carbon\Carbon;
use Dcat\Admin\Grid\BatchAction;
use Illuminate\Http\Request;
class Getteshubrand  extends BatchAction
{
    protected $title = 'ð¨â é¢å';
    protected $model;
    // æ³¨ææé æ¹æ³çåæ°å¿é¡»è¦æé»è®¤å¼
    public function __construct(string $model = null)
    {
        $this->model = $model;
    }

    /**
     * å¤çå¨ä½é»è¾
     * @return Response
     */

    public function  handle (Request  $request)
    {

        // è·åéä¸­çæç« IDæ°ç»
        $keys = $this->getKey();
        //è·åä¼ éçæ¨¡å
        $model = $request->get('model');
        $user_id=Admin::user()->id;
        //https://www.jianshu.com/p/37084f1f7cc1
        $num=TeshuBrand::where('brand_userid',$user_id)->where('is_get',1)->whereDate('updated_at', Carbon::now()->toDateString())->count();
        if(in_array(Admin::user()->id,[1,21]))
        {
            $max_num=2000;
        }
        else
            {
                $max_num=300;
            }

        foreach ($keys as $id)
        {
            $lc = TeshuBrand::find($id);
            //æ°æ®æ¯è¾
            if ($lc->count()>0)
                if($num>$max_num)
                {return $this->response()->warning("ä½ å·²ç»è¶è¿å½å¤©é¢åæå¤§æ¬¡æ°ï¼ ".$max_num." è¯·ç¡®å®æ¯å¦å·²ç»å®æé¢åçæ°éï¼")->refresh();}
                else{
                    $lc->is_get=1;
                    $lc->state=-1;
                    $lc->brand_userid=Admin::user()->id;
                    $lc->brand_username=Admin::user()->name;
                    $lc->save();    }
            else
            {
                return $this->response()->error('æ°æ®ä¸ºç©ºï¼è¯·éæ©æ°æ®ï¼')->refresh();
            }

        }
        return  $this->response()->success('åçé¢åæå!ï¼')->refresh();
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

