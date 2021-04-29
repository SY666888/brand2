<div class="ft">
<?php
$kw=$brandname.'加盟';
$url="https://mbd.baidu.com/suggest?ctl=sug&query=".$kw."&cfrom=1099a&from=1099a&network=1_0&osbranch=i0&osname=baiduboxapp&puid=gPvgiguH-iqIC&service=bdbox&sid=1549_3643-571_1173-695_1443-2088_5191-965_2041-1024_2182-1073_2310-1156_2488-1175_2539-1472_3437-1583_3735-2391_6087-1615_3814-1621_3829-1630_3855-1664_3937-1725_5550-1756_4144-1768_6301-1769_4181-1793_4296-1804_4326-1849_4461-1869_4508-1913_4682-1927_4756-1935_4781-1960_4829-1967_4841-1968_4842-1975_5296-2009_4971-2010_4977-2129_5292-2050_5093-2067_5128-2120_5269-2281_5785-2104_5231-2114_5253-2121_5271-2119_5265-2132_5301-2144_5354-2163_5390-2187_5456-2202_5486-2222_5585-2227_5608-2293_5846-2302_5866-2316_5904-2331_5937-2338_5964-2355_5993-2357_6000-2364_6015-2429_6181-2437_6203-2440_6219-2447_6231-2457_6246-2470_6286-2477_6342-1013325_1-1013401_3-1014033_2-1014751_5-1014788_1-1014831_2-1014886_2-1014907_2-1014923_2-1014961_4-1014970_1-1015073_1-1015075_2-1015089_1-1015222_1-1015242_2-1015266_5-1015348_2-1015365_3-1015393_1-1015406_1-1015424_2-1015469_6-1015533_2-1015541_2-1015563_2&ua=1242_2208_iphone_11.9.0.16_0&uid=078FE55CAB1997CB41AF67C3605D168B5673B1B81FRBSAQAQHK&ut=iPhone8%2C2_12.3.1&zid=_LY43PiNJgLC4YGasn_1paUnxRSy-Lqa3-HbIlh5P-dKYJPdXyHeliUCIOWis3yalYEh2cmoOs9xzDvdr9XlVcA&bdid=8D747007984CE387E51F7A2D57E74B84%3AFG%3D1&wise_csor=3&v=3&lid=15616935620372801447&qq-pf-to=pcqq.c2c";
$result=file_get_contents($url);
$toutiao="https://is.snssdk.com/2/wap/search/extra/related_search/?&query=".$kw;
$toutiao=file_get_contents($toutiao);
$s360="https://sug.so.360.cn/suggest?encodein=utf-8&encodeout=utf-8&format=json&fields=word&word=".$kw;
$s360=file_get_contents($s360);
$sogou="http://www.sogou.com/suggnew/ajajjson?&key=".$kw."&type=web";
$sogou=file_get_contents($sogou);
//$sogou=file_get_contents("compress.zlib://".$sogou);
$shenma="https://sugs.m.sm.cn/web?t=w&uc_param_str=dnnwnt&scheme=https&fr=android&q=".$kw;
// 百度
$r =json_decode($result, true);
    $i=0;
    foreach($r['data'] as $data){
	   $k = strstr($data['word'], '加盟');
	    if($k!=false){
	     echo '<p>', $data['word'], '</p>';
         $i=$i+1;		 
	   }	
}
//360
$r1=json_decode($s360, true);
 foreach($r1['result'] as $result){
	 $k = strstr($result['word'], '加盟');
	 if($k!=false){
      echo '<p>', $result['word'], '</p>';
	  $i=$i+1;
       }
   }
   
   if($i==0)
   {
	   echo  '没有找到对应的长尾词！！';
   }

?>


       
</div>





<style>
    .timeline-item, .timeline-header  {
        font-size: 10;
        padding-top: 20px;
        background: none !important;
        color: #a8a9bb !important;
    }
    .ft{color: green;}
</style>
