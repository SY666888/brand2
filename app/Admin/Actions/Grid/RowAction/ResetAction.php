<?php

namespace App\Admin\Actions\Grid\RowAction;
use  App\Models\Kehuxiansuo;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;

class ResetAction extends RowAction
{
    protected $title = 'ð¨ æ¢å¤';

    /**
     * å¤çå¨ä½é»è¾
     * @return Response
     */
    public function handle()
    {
        // è·åå½åè¡ID
         $id = $this->getKey();
        if (!Admin::user()->can('phone_genzong.reset')) {
            return $this->response()
                ->error('ä½ æ²¡ææéæ§è¡æ­¤æä½ï¼')
                ->refresh();
        }
        // è·åå½åè¡ID
        $valid = Kehuxiansuo::where('id',$id)->first();
         if (isset($valid))
         {
             $valid->update([
                 'valid'=>-1,
                 'remark_type'=>' ',
                 'remark'=>' ',
                 'num'=>0,
         ]);
         }
        return $this->response()
            ->success('æ¢å¤æåï¼')
            ->refresh();

    }


    /**
     * å¯¹è¯æ¡
     * @return string[]
     */
    public function confirm(): array
    {
        return ['ç¡®è®¤è¦æ¢å¤åï¼', 'æ¢å¤çåæ¶å°ä¼å é¤ææè·è¿è®°å½ï¼'];
    }
}
