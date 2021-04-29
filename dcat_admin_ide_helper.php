<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection brand_id
     * @property Grid\Column|Collection brand_username
     * @property Grid\Column|Collection brand_userid
     * @property Grid\Column|Collection state
     * @property Grid\Column|Collection untype
     * @property Grid\Column|Collection important
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection deleted_at
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection show
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection path
     * @property Grid\Column|Collection method
     * @property Grid\Column|Collection ip
     * @property Grid\Column|Collection input
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection birthday
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection wechat
     * @property Grid\Column|Collection qq
     * @property Grid\Column|Collection mobile
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection brand
     * @property Grid\Column|Collection url
     * @property Grid\Column|Collection retype
     * @property Grid\Column|Collection brandname
     * @property Grid\Column|Collection source_url
     * @property Grid\Column|Collection web_anxjm
     * @property Grid\Column|Collection web_51xxsp
     * @property Grid\Column|Collection anx_news
     * @property Grid\Column|Collection 51xx_news
     * @property Grid\Column|Collection anx_news_num
     * @property Grid\Column|Collection 51xx_news_num
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection jmlc
     * @property Grid\Column|Collection jmzc
     * @property Grid\Column|Collection jmys
     * @property Grid\Column|Collection is_make
     * @property Grid\Column|Collection lc_do
     * @property Grid\Column|Collection ys_do
     * @property Grid\Column|Collection zc_do
     * @property Grid\Column|Collection web_url
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection ip_address
     * @property Grid\Column|Collection user_agent
     * @property Grid\Column|Collection last_activity
     * @property Grid\Column|Collection beizhu
     * @property Grid\Column|Collection is_do
     * @property Grid\Column|Collection is_who
     * @property Grid\Column|Collection starttime
     * @property Grid\Column|Collection endtime
     * @property Grid\Column|Collection is_get
     * @property Grid\Column|Collection email_verified_at
     * @property Grid\Column|Collection news_num
     * @property Grid\Column|Collection time
     * @property Grid\Column|Collection num
     * @property Grid\Column|Collection type0
     * @property Grid\Column|Collection jmtj
     * @property Grid\Column|Collection gsmc
     * @property Grid\Column|Collection gsdz
     * @property Grid\Column|Collection aid
     * @property Grid\Column|Collection typeid
     * @property Grid\Column|Collection redirecturl
     * @property Grid\Column|Collection templet
     * @property Grid\Column|Collection userip
     * @property Grid\Column|Collection jmxx
     * @property Grid\Column|Collection zczj
     * @property Grid\Column|Collection type1
     * @property Grid\Column|Collection time0
     * @property Grid\Column|Collection ismake
     * @property Grid\Column|Collection userid
     * @property Grid\Column|Collection body
     * @property Grid\Column|Collection pagestyle
     * @property Grid\Column|Collection maxwidth
     * @property Grid\Column|Collection imgurls
     * @property Grid\Column|Collection col
     * @property Grid\Column|Collection isrm
     * @property Grid\Column|Collection ddmaxwidth
     * @property Grid\Column|Collection pagepicnum
     * @property Grid\Column|Collection channel
     * @property Grid\Column|Collection arcrank
     * @property Grid\Column|Collection mid
     * @property Grid\Column|Collection click
     * @property Grid\Column|Collection litpic
     * @property Grid\Column|Collection senddate
     * @property Grid\Column|Collection flag
     * @property Grid\Column|Collection lastpost
     * @property Grid\Column|Collection scores
     * @property Grid\Column|Collection goodpost
     * @property Grid\Column|Collection badpost
     * @property Grid\Column|Collection nativeplace
     * @property Grid\Column|Collection infotype
     * @property Grid\Column|Collection tel
     * @property Grid\Column|Collection address
     * @property Grid\Column|Collection linkman
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection trueprice
     * @property Grid\Column|Collection units
     * @property Grid\Column|Collection vocation
     * @property Grid\Column|Collection uptime
     * @property Grid\Column|Collection filetype
     * @property Grid\Column|Collection language
     * @property Grid\Column|Collection softtype
     * @property Grid\Column|Collection accredit
     * @property Grid\Column|Collection os
     * @property Grid\Column|Collection softrank
     * @property Grid\Column|Collection officialUrl
     * @property Grid\Column|Collection officialDemo
     * @property Grid\Column|Collection softsize
     * @property Grid\Column|Collection softlinks
     * @property Grid\Column|Collection introduce
     * @property Grid\Column|Collection daccess
     * @property Grid\Column|Collection needmoney
     * @property Grid\Column|Collection note
     * @property Grid\Column|Collection usertype
     * @property Grid\Column|Collection pwd
     * @property Grid\Column|Collection uname
     * @property Grid\Column|Collection tname
     * @property Grid\Column|Collection logintime
     * @property Grid\Column|Collection loginip
     * @property Grid\Column|Collection rank
     * @property Grid\Column|Collection typename
     * @property Grid\Column|Collection system
     * @property Grid\Column|Collection purviews
     * @property Grid\Column|Collection maintable
     * @property Grid\Column|Collection mainfields
     * @property Grid\Column|Collection addontable
     * @property Grid\Column|Collection addonfields
     * @property Grid\Column|Collection forms
     * @property Grid\Column|Collection template
     * @property Grid\Column|Collection sortid
     * @property Grid\Column|Collection att
     * @property Grid\Column|Collection attname
     * @property Grid\Column|Collection md5hash
     * @property Grid\Column|Collection cachedata
     * @property Grid\Column|Collection typeid2
     * @property Grid\Column|Collection sortrank
     * @property Grid\Column|Collection money
     * @property Grid\Column|Collection shorttitle
     * @property Grid\Column|Collection color
     * @property Grid\Column|Collection writer
     * @property Grid\Column|Collection source
     * @property Grid\Column|Collection pubdate
     * @property Grid\Column|Collection keywords
     * @property Grid\Column|Collection voteid
     * @property Grid\Column|Collection notpost
     * @property Grid\Column|Collection filename
     * @property Grid\Column|Collection dutyadmin
     * @property Grid\Column|Collection tackid
     * @property Grid\Column|Collection mtype
     * @property Grid\Column|Collection weight
     * @property Grid\Column|Collection tagid
     * @property Grid\Column|Collection innertext
     * @property Grid\Column|Collection pagesize
     * @property Grid\Column|Collection arcids
     * @property Grid\Column|Collection ordersql
     * @property Grid\Column|Collection addfieldsSql
     * @property Grid\Column|Collection addfieldsSqlJoin
     * @property Grid\Column|Collection attstr
     * @property Grid\Column|Collection membername
     * @property Grid\Column|Collection adminrank
     * @property Grid\Column|Collection reid
     * @property Grid\Column|Collection topid
     * @property Grid\Column|Collection typedir
     * @property Grid\Column|Collection isdefault
     * @property Grid\Column|Collection defaultname
     * @property Grid\Column|Collection issend
     * @property Grid\Column|Collection channeltype
     * @property Grid\Column|Collection maxpage
     * @property Grid\Column|Collection ispart
     * @property Grid\Column|Collection corank
     * @property Grid\Column|Collection tempindex
     * @property Grid\Column|Collection templist
     * @property Grid\Column|Collection temparticle
     * @property Grid\Column|Collection namerule
     * @property Grid\Column|Collection namerule2
     * @property Grid\Column|Collection modname
     * @property Grid\Column|Collection seotitle
     * @property Grid\Column|Collection moresite
     * @property Grid\Column|Collection sitepath
     * @property Grid\Column|Collection siteurl
     * @property Grid\Column|Collection ishidden
     * @property Grid\Column|Collection cross
     * @property Grid\Column|Collection crossid
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection smalltypes
     * @property Grid\Column|Collection disorder
     * @property Grid\Column|Collection nid
     * @property Grid\Column|Collection addtable
     * @property Grid\Column|Collection addcon
     * @property Grid\Column|Collection mancon
     * @property Grid\Column|Collection editcon
     * @property Grid\Column|Collection useraddcon
     * @property Grid\Column|Collection usermancon
     * @property Grid\Column|Collection usereditcon
     * @property Grid\Column|Collection fieldset
     * @property Grid\Column|Collection listfields
     * @property Grid\Column|Collection allfields
     * @property Grid\Column|Collection issystem
     * @property Grid\Column|Collection isshow
     * @property Grid\Column|Collection arcsta
     * @property Grid\Column|Collection sendrank
     * @property Grid\Column|Collection needdes
     * @property Grid\Column|Collection needpic
     * @property Grid\Column|Collection titlename
     * @property Grid\Column|Collection onlyone
     * @property Grid\Column|Collection dfcid
     * @property Grid\Column|Collection dtime
     * @property Grid\Column|Collection isdown
     * @property Grid\Column|Collection isexport
     * @property Grid\Column|Collection result
     * @property Grid\Column|Collection hash
     * @property Grid\Column|Collection tofile
     * @property Grid\Column|Collection channelid
     * @property Grid\Column|Collection notename
     * @property Grid\Column|Collection sourcelang
     * @property Grid\Column|Collection cotime
     * @property Grid\Column|Collection pnum
     * @property Grid\Column|Collection isok
     * @property Grid\Column|Collection usemore
     * @property Grid\Column|Collection listconfig
     * @property Grid\Column|Collection itemconfig
     * @property Grid\Column|Collection issource
     * @property Grid\Column|Collection lang
     * @property Grid\Column|Collection rule
     * @property Grid\Column|Collection diyid
     * @property Grid\Column|Collection posttemplate
     * @property Grid\Column|Collection viewtemplate
     * @property Grid\Column|Collection listtemplate
     * @property Grid\Column|Collection table
     * @property Grid\Column|Collection info
     * @property Grid\Column|Collection public
     * @property Grid\Column|Collection dtype
     * @property Grid\Column|Collection dltime
     * @property Grid\Column|Collection referrer
     * @property Grid\Column|Collection downloads
     * @property Grid\Column|Collection errtxt
     * @property Grid\Column|Collection oktxt
     * @property Grid\Column|Collection sendtime
     * @property Grid\Column|Collection arctitle
     * @property Grid\Column|Collection ischeck
     * @property Grid\Column|Collection bad
     * @property Grid\Column|Collection good
     * @property Grid\Column|Collection ftype
     * @property Grid\Column|Collection face
     * @property Grid\Column|Collection msg
     * @property Grid\Column|Collection webname
     * @property Grid\Column|Collection logo
     * @property Grid\Column|Collection listdir
     * @property Grid\Column|Collection defaultpage
     * @property Grid\Column|Collection nodefault
     * @property Grid\Column|Collection edtime
     * @property Grid\Column|Collection listtag
     * @property Grid\Column|Collection position
     * @property Grid\Column|Collection showmod
     * @property Grid\Column|Collection keyword
     * @property Grid\Column|Collection sta
     * @property Grid\Column|Collection rpurl
     * @property Grid\Column|Collection lid
     * @property Grid\Column|Collection adminid
     * @property Grid\Column|Collection query
     * @property Grid\Column|Collection cip
     * @property Grid\Column|Collection sex
     * @property Grid\Column|Collection exptime
     * @property Grid\Column|Collection matt
     * @property Grid\Column|Collection spacesta
     * @property Grid\Column|Collection safequestion
     * @property Grid\Column|Collection safeanswer
     * @property Grid\Column|Collection jointime
     * @property Grid\Column|Collection joinip
     * @property Grid\Column|Collection checkmail
     * @property Grid\Column|Collection company
     * @property Grid\Column|Collection product
     * @property Grid\Column|Collection place
     * @property Grid\Column|Collection cosize
     * @property Grid\Column|Collection fax
     * @property Grid\Column|Collection checked
     * @property Grid\Column|Collection comface
     * @property Grid\Column|Collection fid
     * @property Grid\Column|Collection floginid
     * @property Grid\Column|Collection funame
     * @property Grid\Column|Collection addtime
     * @property Grid\Column|Collection groupid
     * @property Grid\Column|Collection groupname
     * @property Grid\Column|Collection gid
     * @property Grid\Column|Collection buyid
     * @property Grid\Column|Collection pname
     * @property Grid\Column|Collection mtime
     * @property Grid\Column|Collection pid
     * @property Grid\Column|Collection oldinfo
     *
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection brand_id(string $label = null)
     * @method Grid\Column|Collection brand_username(string $label = null)
     * @method Grid\Column|Collection brand_userid(string $label = null)
     * @method Grid\Column|Collection state(string $label = null)
     * @method Grid\Column|Collection untype(string $label = null)
     * @method Grid\Column|Collection important(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection deleted_at(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection show(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection path(string $label = null)
     * @method Grid\Column|Collection method(string $label = null)
     * @method Grid\Column|Collection ip(string $label = null)
     * @method Grid\Column|Collection input(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection birthday(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection wechat(string $label = null)
     * @method Grid\Column|Collection qq(string $label = null)
     * @method Grid\Column|Collection mobile(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection brand(string $label = null)
     * @method Grid\Column|Collection url(string $label = null)
     * @method Grid\Column|Collection retype(string $label = null)
     * @method Grid\Column|Collection brandname(string $label = null)
     * @method Grid\Column|Collection source_url(string $label = null)
     * @method Grid\Column|Collection web_anxjm(string $label = null)
     * @method Grid\Column|Collection web_51xxsp(string $label = null)
     * @method Grid\Column|Collection anx_news(string $label = null)
     * @method Grid\Column|Collection 51xx_news(string $label = null)
     * @method Grid\Column|Collection anx_news_num(string $label = null)
     * @method Grid\Column|Collection 51xx_news_num(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection jmlc(string $label = null)
     * @method Grid\Column|Collection jmzc(string $label = null)
     * @method Grid\Column|Collection jmys(string $label = null)
     * @method Grid\Column|Collection is_make(string $label = null)
     * @method Grid\Column|Collection lc_do(string $label = null)
     * @method Grid\Column|Collection ys_do(string $label = null)
     * @method Grid\Column|Collection zc_do(string $label = null)
     * @method Grid\Column|Collection web_url(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection ip_address(string $label = null)
     * @method Grid\Column|Collection user_agent(string $label = null)
     * @method Grid\Column|Collection last_activity(string $label = null)
     * @method Grid\Column|Collection beizhu(string $label = null)
     * @method Grid\Column|Collection is_do(string $label = null)
     * @method Grid\Column|Collection is_who(string $label = null)
     * @method Grid\Column|Collection starttime(string $label = null)
     * @method Grid\Column|Collection endtime(string $label = null)
     * @method Grid\Column|Collection is_get(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     * @method Grid\Column|Collection news_num(string $label = null)
     * @method Grid\Column|Collection time(string $label = null)
     * @method Grid\Column|Collection num(string $label = null)
     * @method Grid\Column|Collection type0(string $label = null)
     * @method Grid\Column|Collection jmtj(string $label = null)
     * @method Grid\Column|Collection gsmc(string $label = null)
     * @method Grid\Column|Collection gsdz(string $label = null)
     * @method Grid\Column|Collection aid(string $label = null)
     * @method Grid\Column|Collection typeid(string $label = null)
     * @method Grid\Column|Collection redirecturl(string $label = null)
     * @method Grid\Column|Collection templet(string $label = null)
     * @method Grid\Column|Collection userip(string $label = null)
     * @method Grid\Column|Collection jmxx(string $label = null)
     * @method Grid\Column|Collection zczj(string $label = null)
     * @method Grid\Column|Collection type1(string $label = null)
     * @method Grid\Column|Collection time0(string $label = null)
     * @method Grid\Column|Collection ismake(string $label = null)
     * @method Grid\Column|Collection userid(string $label = null)
     * @method Grid\Column|Collection body(string $label = null)
     * @method Grid\Column|Collection pagestyle(string $label = null)
     * @method Grid\Column|Collection maxwidth(string $label = null)
     * @method Grid\Column|Collection imgurls(string $label = null)
     * @method Grid\Column|Collection col(string $label = null)
     * @method Grid\Column|Collection isrm(string $label = null)
     * @method Grid\Column|Collection ddmaxwidth(string $label = null)
     * @method Grid\Column|Collection pagepicnum(string $label = null)
     * @method Grid\Column|Collection channel(string $label = null)
     * @method Grid\Column|Collection arcrank(string $label = null)
     * @method Grid\Column|Collection mid(string $label = null)
     * @method Grid\Column|Collection click(string $label = null)
     * @method Grid\Column|Collection litpic(string $label = null)
     * @method Grid\Column|Collection senddate(string $label = null)
     * @method Grid\Column|Collection flag(string $label = null)
     * @method Grid\Column|Collection lastpost(string $label = null)
     * @method Grid\Column|Collection scores(string $label = null)
     * @method Grid\Column|Collection goodpost(string $label = null)
     * @method Grid\Column|Collection badpost(string $label = null)
     * @method Grid\Column|Collection nativeplace(string $label = null)
     * @method Grid\Column|Collection infotype(string $label = null)
     * @method Grid\Column|Collection tel(string $label = null)
     * @method Grid\Column|Collection address(string $label = null)
     * @method Grid\Column|Collection linkman(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection trueprice(string $label = null)
     * @method Grid\Column|Collection units(string $label = null)
     * @method Grid\Column|Collection vocation(string $label = null)
     * @method Grid\Column|Collection uptime(string $label = null)
     * @method Grid\Column|Collection filetype(string $label = null)
     * @method Grid\Column|Collection language(string $label = null)
     * @method Grid\Column|Collection softtype(string $label = null)
     * @method Grid\Column|Collection accredit(string $label = null)
     * @method Grid\Column|Collection os(string $label = null)
     * @method Grid\Column|Collection softrank(string $label = null)
     * @method Grid\Column|Collection officialUrl(string $label = null)
     * @method Grid\Column|Collection officialDemo(string $label = null)
     * @method Grid\Column|Collection softsize(string $label = null)
     * @method Grid\Column|Collection softlinks(string $label = null)
     * @method Grid\Column|Collection introduce(string $label = null)
     * @method Grid\Column|Collection daccess(string $label = null)
     * @method Grid\Column|Collection needmoney(string $label = null)
     * @method Grid\Column|Collection note(string $label = null)
     * @method Grid\Column|Collection usertype(string $label = null)
     * @method Grid\Column|Collection pwd(string $label = null)
     * @method Grid\Column|Collection uname(string $label = null)
     * @method Grid\Column|Collection tname(string $label = null)
     * @method Grid\Column|Collection logintime(string $label = null)
     * @method Grid\Column|Collection loginip(string $label = null)
     * @method Grid\Column|Collection rank(string $label = null)
     * @method Grid\Column|Collection typename(string $label = null)
     * @method Grid\Column|Collection system(string $label = null)
     * @method Grid\Column|Collection purviews(string $label = null)
     * @method Grid\Column|Collection maintable(string $label = null)
     * @method Grid\Column|Collection mainfields(string $label = null)
     * @method Grid\Column|Collection addontable(string $label = null)
     * @method Grid\Column|Collection addonfields(string $label = null)
     * @method Grid\Column|Collection forms(string $label = null)
     * @method Grid\Column|Collection template(string $label = null)
     * @method Grid\Column|Collection sortid(string $label = null)
     * @method Grid\Column|Collection att(string $label = null)
     * @method Grid\Column|Collection attname(string $label = null)
     * @method Grid\Column|Collection md5hash(string $label = null)
     * @method Grid\Column|Collection cachedata(string $label = null)
     * @method Grid\Column|Collection typeid2(string $label = null)
     * @method Grid\Column|Collection sortrank(string $label = null)
     * @method Grid\Column|Collection money(string $label = null)
     * @method Grid\Column|Collection shorttitle(string $label = null)
     * @method Grid\Column|Collection color(string $label = null)
     * @method Grid\Column|Collection writer(string $label = null)
     * @method Grid\Column|Collection source(string $label = null)
     * @method Grid\Column|Collection pubdate(string $label = null)
     * @method Grid\Column|Collection keywords(string $label = null)
     * @method Grid\Column|Collection voteid(string $label = null)
     * @method Grid\Column|Collection notpost(string $label = null)
     * @method Grid\Column|Collection filename(string $label = null)
     * @method Grid\Column|Collection dutyadmin(string $label = null)
     * @method Grid\Column|Collection tackid(string $label = null)
     * @method Grid\Column|Collection mtype(string $label = null)
     * @method Grid\Column|Collection weight(string $label = null)
     * @method Grid\Column|Collection tagid(string $label = null)
     * @method Grid\Column|Collection innertext(string $label = null)
     * @method Grid\Column|Collection pagesize(string $label = null)
     * @method Grid\Column|Collection arcids(string $label = null)
     * @method Grid\Column|Collection ordersql(string $label = null)
     * @method Grid\Column|Collection addfieldsSql(string $label = null)
     * @method Grid\Column|Collection addfieldsSqlJoin(string $label = null)
     * @method Grid\Column|Collection attstr(string $label = null)
     * @method Grid\Column|Collection membername(string $label = null)
     * @method Grid\Column|Collection adminrank(string $label = null)
     * @method Grid\Column|Collection reid(string $label = null)
     * @method Grid\Column|Collection topid(string $label = null)
     * @method Grid\Column|Collection typedir(string $label = null)
     * @method Grid\Column|Collection isdefault(string $label = null)
     * @method Grid\Column|Collection defaultname(string $label = null)
     * @method Grid\Column|Collection issend(string $label = null)
     * @method Grid\Column|Collection channeltype(string $label = null)
     * @method Grid\Column|Collection maxpage(string $label = null)
     * @method Grid\Column|Collection ispart(string $label = null)
     * @method Grid\Column|Collection corank(string $label = null)
     * @method Grid\Column|Collection tempindex(string $label = null)
     * @method Grid\Column|Collection templist(string $label = null)
     * @method Grid\Column|Collection temparticle(string $label = null)
     * @method Grid\Column|Collection namerule(string $label = null)
     * @method Grid\Column|Collection namerule2(string $label = null)
     * @method Grid\Column|Collection modname(string $label = null)
     * @method Grid\Column|Collection seotitle(string $label = null)
     * @method Grid\Column|Collection moresite(string $label = null)
     * @method Grid\Column|Collection sitepath(string $label = null)
     * @method Grid\Column|Collection siteurl(string $label = null)
     * @method Grid\Column|Collection ishidden(string $label = null)
     * @method Grid\Column|Collection cross(string $label = null)
     * @method Grid\Column|Collection crossid(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection smalltypes(string $label = null)
     * @method Grid\Column|Collection disorder(string $label = null)
     * @method Grid\Column|Collection nid(string $label = null)
     * @method Grid\Column|Collection addtable(string $label = null)
     * @method Grid\Column|Collection addcon(string $label = null)
     * @method Grid\Column|Collection mancon(string $label = null)
     * @method Grid\Column|Collection editcon(string $label = null)
     * @method Grid\Column|Collection useraddcon(string $label = null)
     * @method Grid\Column|Collection usermancon(string $label = null)
     * @method Grid\Column|Collection usereditcon(string $label = null)
     * @method Grid\Column|Collection fieldset(string $label = null)
     * @method Grid\Column|Collection listfields(string $label = null)
     * @method Grid\Column|Collection allfields(string $label = null)
     * @method Grid\Column|Collection issystem(string $label = null)
     * @method Grid\Column|Collection isshow(string $label = null)
     * @method Grid\Column|Collection arcsta(string $label = null)
     * @method Grid\Column|Collection sendrank(string $label = null)
     * @method Grid\Column|Collection needdes(string $label = null)
     * @method Grid\Column|Collection needpic(string $label = null)
     * @method Grid\Column|Collection titlename(string $label = null)
     * @method Grid\Column|Collection onlyone(string $label = null)
     * @method Grid\Column|Collection dfcid(string $label = null)
     * @method Grid\Column|Collection dtime(string $label = null)
     * @method Grid\Column|Collection isdown(string $label = null)
     * @method Grid\Column|Collection isexport(string $label = null)
     * @method Grid\Column|Collection result(string $label = null)
     * @method Grid\Column|Collection hash(string $label = null)
     * @method Grid\Column|Collection tofile(string $label = null)
     * @method Grid\Column|Collection channelid(string $label = null)
     * @method Grid\Column|Collection notename(string $label = null)
     * @method Grid\Column|Collection sourcelang(string $label = null)
     * @method Grid\Column|Collection cotime(string $label = null)
     * @method Grid\Column|Collection pnum(string $label = null)
     * @method Grid\Column|Collection isok(string $label = null)
     * @method Grid\Column|Collection usemore(string $label = null)
     * @method Grid\Column|Collection listconfig(string $label = null)
     * @method Grid\Column|Collection itemconfig(string $label = null)
     * @method Grid\Column|Collection issource(string $label = null)
     * @method Grid\Column|Collection lang(string $label = null)
     * @method Grid\Column|Collection rule(string $label = null)
     * @method Grid\Column|Collection diyid(string $label = null)
     * @method Grid\Column|Collection posttemplate(string $label = null)
     * @method Grid\Column|Collection viewtemplate(string $label = null)
     * @method Grid\Column|Collection listtemplate(string $label = null)
     * @method Grid\Column|Collection table(string $label = null)
     * @method Grid\Column|Collection info(string $label = null)
     * @method Grid\Column|Collection public(string $label = null)
     * @method Grid\Column|Collection dtype(string $label = null)
     * @method Grid\Column|Collection dltime(string $label = null)
     * @method Grid\Column|Collection referrer(string $label = null)
     * @method Grid\Column|Collection downloads(string $label = null)
     * @method Grid\Column|Collection errtxt(string $label = null)
     * @method Grid\Column|Collection oktxt(string $label = null)
     * @method Grid\Column|Collection sendtime(string $label = null)
     * @method Grid\Column|Collection arctitle(string $label = null)
     * @method Grid\Column|Collection ischeck(string $label = null)
     * @method Grid\Column|Collection bad(string $label = null)
     * @method Grid\Column|Collection good(string $label = null)
     * @method Grid\Column|Collection ftype(string $label = null)
     * @method Grid\Column|Collection face(string $label = null)
     * @method Grid\Column|Collection msg(string $label = null)
     * @method Grid\Column|Collection webname(string $label = null)
     * @method Grid\Column|Collection logo(string $label = null)
     * @method Grid\Column|Collection listdir(string $label = null)
     * @method Grid\Column|Collection defaultpage(string $label = null)
     * @method Grid\Column|Collection nodefault(string $label = null)
     * @method Grid\Column|Collection edtime(string $label = null)
     * @method Grid\Column|Collection listtag(string $label = null)
     * @method Grid\Column|Collection position(string $label = null)
     * @method Grid\Column|Collection showmod(string $label = null)
     * @method Grid\Column|Collection keyword(string $label = null)
     * @method Grid\Column|Collection sta(string $label = null)
     * @method Grid\Column|Collection rpurl(string $label = null)
     * @method Grid\Column|Collection lid(string $label = null)
     * @method Grid\Column|Collection adminid(string $label = null)
     * @method Grid\Column|Collection query(string $label = null)
     * @method Grid\Column|Collection cip(string $label = null)
     * @method Grid\Column|Collection sex(string $label = null)
     * @method Grid\Column|Collection exptime(string $label = null)
     * @method Grid\Column|Collection matt(string $label = null)
     * @method Grid\Column|Collection spacesta(string $label = null)
     * @method Grid\Column|Collection safequestion(string $label = null)
     * @method Grid\Column|Collection safeanswer(string $label = null)
     * @method Grid\Column|Collection jointime(string $label = null)
     * @method Grid\Column|Collection joinip(string $label = null)
     * @method Grid\Column|Collection checkmail(string $label = null)
     * @method Grid\Column|Collection company(string $label = null)
     * @method Grid\Column|Collection product(string $label = null)
     * @method Grid\Column|Collection place(string $label = null)
     * @method Grid\Column|Collection cosize(string $label = null)
     * @method Grid\Column|Collection fax(string $label = null)
     * @method Grid\Column|Collection checked(string $label = null)
     * @method Grid\Column|Collection comface(string $label = null)
     * @method Grid\Column|Collection fid(string $label = null)
     * @method Grid\Column|Collection floginid(string $label = null)
     * @method Grid\Column|Collection funame(string $label = null)
     * @method Grid\Column|Collection addtime(string $label = null)
     * @method Grid\Column|Collection groupid(string $label = null)
     * @method Grid\Column|Collection groupname(string $label = null)
     * @method Grid\Column|Collection gid(string $label = null)
     * @method Grid\Column|Collection buyid(string $label = null)
     * @method Grid\Column|Collection pname(string $label = null)
     * @method Grid\Column|Collection mtime(string $label = null)
     * @method Grid\Column|Collection pid(string $label = null)
     * @method Grid\Column|Collection oldinfo(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection id
     * @property Show\Field|Collection brand_id
     * @property Show\Field|Collection brand_username
     * @property Show\Field|Collection brand_userid
     * @property Show\Field|Collection state
     * @property Show\Field|Collection untype
     * @property Show\Field|Collection important
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection deleted_at
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection show
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection path
     * @property Show\Field|Collection method
     * @property Show\Field|Collection ip
     * @property Show\Field|Collection input
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection birthday
     * @property Show\Field|Collection email
     * @property Show\Field|Collection wechat
     * @property Show\Field|Collection qq
     * @property Show\Field|Collection mobile
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection brand
     * @property Show\Field|Collection url
     * @property Show\Field|Collection retype
     * @property Show\Field|Collection brandname
     * @property Show\Field|Collection source_url
     * @property Show\Field|Collection web_anxjm
     * @property Show\Field|Collection web_51xxsp
     * @property Show\Field|Collection anx_news
     * @property Show\Field|Collection 51xx_news
     * @property Show\Field|Collection anx_news_num
     * @property Show\Field|Collection 51xx_news_num
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection jmlc
     * @property Show\Field|Collection jmzc
     * @property Show\Field|Collection jmys
     * @property Show\Field|Collection is_make
     * @property Show\Field|Collection lc_do
     * @property Show\Field|Collection ys_do
     * @property Show\Field|Collection zc_do
     * @property Show\Field|Collection web_url
     * @property Show\Field|Collection token
     * @property Show\Field|Collection ip_address
     * @property Show\Field|Collection user_agent
     * @property Show\Field|Collection last_activity
     * @property Show\Field|Collection beizhu
     * @property Show\Field|Collection is_do
     * @property Show\Field|Collection is_who
     * @property Show\Field|Collection starttime
     * @property Show\Field|Collection endtime
     * @property Show\Field|Collection is_get
     * @property Show\Field|Collection email_verified_at
     * @property Show\Field|Collection news_num
     * @property Show\Field|Collection time
     * @property Show\Field|Collection num
     * @property Show\Field|Collection type0
     * @property Show\Field|Collection jmtj
     * @property Show\Field|Collection gsmc
     * @property Show\Field|Collection gsdz
     * @property Show\Field|Collection aid
     * @property Show\Field|Collection typeid
     * @property Show\Field|Collection redirecturl
     * @property Show\Field|Collection templet
     * @property Show\Field|Collection userip
     * @property Show\Field|Collection jmxx
     * @property Show\Field|Collection zczj
     * @property Show\Field|Collection type1
     * @property Show\Field|Collection time0
     * @property Show\Field|Collection ismake
     * @property Show\Field|Collection userid
     * @property Show\Field|Collection body
     * @property Show\Field|Collection pagestyle
     * @property Show\Field|Collection maxwidth
     * @property Show\Field|Collection imgurls
     * @property Show\Field|Collection col
     * @property Show\Field|Collection isrm
     * @property Show\Field|Collection ddmaxwidth
     * @property Show\Field|Collection pagepicnum
     * @property Show\Field|Collection channel
     * @property Show\Field|Collection arcrank
     * @property Show\Field|Collection mid
     * @property Show\Field|Collection click
     * @property Show\Field|Collection litpic
     * @property Show\Field|Collection senddate
     * @property Show\Field|Collection flag
     * @property Show\Field|Collection lastpost
     * @property Show\Field|Collection scores
     * @property Show\Field|Collection goodpost
     * @property Show\Field|Collection badpost
     * @property Show\Field|Collection nativeplace
     * @property Show\Field|Collection infotype
     * @property Show\Field|Collection tel
     * @property Show\Field|Collection address
     * @property Show\Field|Collection linkman
     * @property Show\Field|Collection price
     * @property Show\Field|Collection trueprice
     * @property Show\Field|Collection units
     * @property Show\Field|Collection vocation
     * @property Show\Field|Collection uptime
     * @property Show\Field|Collection filetype
     * @property Show\Field|Collection language
     * @property Show\Field|Collection softtype
     * @property Show\Field|Collection accredit
     * @property Show\Field|Collection os
     * @property Show\Field|Collection softrank
     * @property Show\Field|Collection officialUrl
     * @property Show\Field|Collection officialDemo
     * @property Show\Field|Collection softsize
     * @property Show\Field|Collection softlinks
     * @property Show\Field|Collection introduce
     * @property Show\Field|Collection daccess
     * @property Show\Field|Collection needmoney
     * @property Show\Field|Collection note
     * @property Show\Field|Collection usertype
     * @property Show\Field|Collection pwd
     * @property Show\Field|Collection uname
     * @property Show\Field|Collection tname
     * @property Show\Field|Collection logintime
     * @property Show\Field|Collection loginip
     * @property Show\Field|Collection rank
     * @property Show\Field|Collection typename
     * @property Show\Field|Collection system
     * @property Show\Field|Collection purviews
     * @property Show\Field|Collection maintable
     * @property Show\Field|Collection mainfields
     * @property Show\Field|Collection addontable
     * @property Show\Field|Collection addonfields
     * @property Show\Field|Collection forms
     * @property Show\Field|Collection template
     * @property Show\Field|Collection sortid
     * @property Show\Field|Collection att
     * @property Show\Field|Collection attname
     * @property Show\Field|Collection md5hash
     * @property Show\Field|Collection cachedata
     * @property Show\Field|Collection typeid2
     * @property Show\Field|Collection sortrank
     * @property Show\Field|Collection money
     * @property Show\Field|Collection shorttitle
     * @property Show\Field|Collection color
     * @property Show\Field|Collection writer
     * @property Show\Field|Collection source
     * @property Show\Field|Collection pubdate
     * @property Show\Field|Collection keywords
     * @property Show\Field|Collection voteid
     * @property Show\Field|Collection notpost
     * @property Show\Field|Collection filename
     * @property Show\Field|Collection dutyadmin
     * @property Show\Field|Collection tackid
     * @property Show\Field|Collection mtype
     * @property Show\Field|Collection weight
     * @property Show\Field|Collection tagid
     * @property Show\Field|Collection innertext
     * @property Show\Field|Collection pagesize
     * @property Show\Field|Collection arcids
     * @property Show\Field|Collection ordersql
     * @property Show\Field|Collection addfieldsSql
     * @property Show\Field|Collection addfieldsSqlJoin
     * @property Show\Field|Collection attstr
     * @property Show\Field|Collection membername
     * @property Show\Field|Collection adminrank
     * @property Show\Field|Collection reid
     * @property Show\Field|Collection topid
     * @property Show\Field|Collection typedir
     * @property Show\Field|Collection isdefault
     * @property Show\Field|Collection defaultname
     * @property Show\Field|Collection issend
     * @property Show\Field|Collection channeltype
     * @property Show\Field|Collection maxpage
     * @property Show\Field|Collection ispart
     * @property Show\Field|Collection corank
     * @property Show\Field|Collection tempindex
     * @property Show\Field|Collection templist
     * @property Show\Field|Collection temparticle
     * @property Show\Field|Collection namerule
     * @property Show\Field|Collection namerule2
     * @property Show\Field|Collection modname
     * @property Show\Field|Collection seotitle
     * @property Show\Field|Collection moresite
     * @property Show\Field|Collection sitepath
     * @property Show\Field|Collection siteurl
     * @property Show\Field|Collection ishidden
     * @property Show\Field|Collection cross
     * @property Show\Field|Collection crossid
     * @property Show\Field|Collection content
     * @property Show\Field|Collection smalltypes
     * @property Show\Field|Collection disorder
     * @property Show\Field|Collection nid
     * @property Show\Field|Collection addtable
     * @property Show\Field|Collection addcon
     * @property Show\Field|Collection mancon
     * @property Show\Field|Collection editcon
     * @property Show\Field|Collection useraddcon
     * @property Show\Field|Collection usermancon
     * @property Show\Field|Collection usereditcon
     * @property Show\Field|Collection fieldset
     * @property Show\Field|Collection listfields
     * @property Show\Field|Collection allfields
     * @property Show\Field|Collection issystem
     * @property Show\Field|Collection isshow
     * @property Show\Field|Collection arcsta
     * @property Show\Field|Collection sendrank
     * @property Show\Field|Collection needdes
     * @property Show\Field|Collection needpic
     * @property Show\Field|Collection titlename
     * @property Show\Field|Collection onlyone
     * @property Show\Field|Collection dfcid
     * @property Show\Field|Collection dtime
     * @property Show\Field|Collection isdown
     * @property Show\Field|Collection isexport
     * @property Show\Field|Collection result
     * @property Show\Field|Collection hash
     * @property Show\Field|Collection tofile
     * @property Show\Field|Collection channelid
     * @property Show\Field|Collection notename
     * @property Show\Field|Collection sourcelang
     * @property Show\Field|Collection cotime
     * @property Show\Field|Collection pnum
     * @property Show\Field|Collection isok
     * @property Show\Field|Collection usemore
     * @property Show\Field|Collection listconfig
     * @property Show\Field|Collection itemconfig
     * @property Show\Field|Collection issource
     * @property Show\Field|Collection lang
     * @property Show\Field|Collection rule
     * @property Show\Field|Collection diyid
     * @property Show\Field|Collection posttemplate
     * @property Show\Field|Collection viewtemplate
     * @property Show\Field|Collection listtemplate
     * @property Show\Field|Collection table
     * @property Show\Field|Collection info
     * @property Show\Field|Collection public
     * @property Show\Field|Collection dtype
     * @property Show\Field|Collection dltime
     * @property Show\Field|Collection referrer
     * @property Show\Field|Collection downloads
     * @property Show\Field|Collection errtxt
     * @property Show\Field|Collection oktxt
     * @property Show\Field|Collection sendtime
     * @property Show\Field|Collection arctitle
     * @property Show\Field|Collection ischeck
     * @property Show\Field|Collection bad
     * @property Show\Field|Collection good
     * @property Show\Field|Collection ftype
     * @property Show\Field|Collection face
     * @property Show\Field|Collection msg
     * @property Show\Field|Collection webname
     * @property Show\Field|Collection logo
     * @property Show\Field|Collection listdir
     * @property Show\Field|Collection defaultpage
     * @property Show\Field|Collection nodefault
     * @property Show\Field|Collection edtime
     * @property Show\Field|Collection listtag
     * @property Show\Field|Collection position
     * @property Show\Field|Collection showmod
     * @property Show\Field|Collection keyword
     * @property Show\Field|Collection sta
     * @property Show\Field|Collection rpurl
     * @property Show\Field|Collection lid
     * @property Show\Field|Collection adminid
     * @property Show\Field|Collection query
     * @property Show\Field|Collection cip
     * @property Show\Field|Collection sex
     * @property Show\Field|Collection exptime
     * @property Show\Field|Collection matt
     * @property Show\Field|Collection spacesta
     * @property Show\Field|Collection safequestion
     * @property Show\Field|Collection safeanswer
     * @property Show\Field|Collection jointime
     * @property Show\Field|Collection joinip
     * @property Show\Field|Collection checkmail
     * @property Show\Field|Collection company
     * @property Show\Field|Collection product
     * @property Show\Field|Collection place
     * @property Show\Field|Collection cosize
     * @property Show\Field|Collection fax
     * @property Show\Field|Collection checked
     * @property Show\Field|Collection comface
     * @property Show\Field|Collection fid
     * @property Show\Field|Collection floginid
     * @property Show\Field|Collection funame
     * @property Show\Field|Collection addtime
     * @property Show\Field|Collection groupid
     * @property Show\Field|Collection groupname
     * @property Show\Field|Collection gid
     * @property Show\Field|Collection buyid
     * @property Show\Field|Collection pname
     * @property Show\Field|Collection mtime
     * @property Show\Field|Collection pid
     * @property Show\Field|Collection oldinfo
     *
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection brand_id(string $label = null)
     * @method Show\Field|Collection brand_username(string $label = null)
     * @method Show\Field|Collection brand_userid(string $label = null)
     * @method Show\Field|Collection state(string $label = null)
     * @method Show\Field|Collection untype(string $label = null)
     * @method Show\Field|Collection important(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection deleted_at(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection show(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection path(string $label = null)
     * @method Show\Field|Collection method(string $label = null)
     * @method Show\Field|Collection ip(string $label = null)
     * @method Show\Field|Collection input(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection birthday(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection wechat(string $label = null)
     * @method Show\Field|Collection qq(string $label = null)
     * @method Show\Field|Collection mobile(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection brand(string $label = null)
     * @method Show\Field|Collection url(string $label = null)
     * @method Show\Field|Collection retype(string $label = null)
     * @method Show\Field|Collection brandname(string $label = null)
     * @method Show\Field|Collection source_url(string $label = null)
     * @method Show\Field|Collection web_anxjm(string $label = null)
     * @method Show\Field|Collection web_51xxsp(string $label = null)
     * @method Show\Field|Collection anx_news(string $label = null)
     * @method Show\Field|Collection 51xx_news(string $label = null)
     * @method Show\Field|Collection anx_news_num(string $label = null)
     * @method Show\Field|Collection 51xx_news_num(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection jmlc(string $label = null)
     * @method Show\Field|Collection jmzc(string $label = null)
     * @method Show\Field|Collection jmys(string $label = null)
     * @method Show\Field|Collection is_make(string $label = null)
     * @method Show\Field|Collection lc_do(string $label = null)
     * @method Show\Field|Collection ys_do(string $label = null)
     * @method Show\Field|Collection zc_do(string $label = null)
     * @method Show\Field|Collection web_url(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection ip_address(string $label = null)
     * @method Show\Field|Collection user_agent(string $label = null)
     * @method Show\Field|Collection last_activity(string $label = null)
     * @method Show\Field|Collection beizhu(string $label = null)
     * @method Show\Field|Collection is_do(string $label = null)
     * @method Show\Field|Collection is_who(string $label = null)
     * @method Show\Field|Collection starttime(string $label = null)
     * @method Show\Field|Collection endtime(string $label = null)
     * @method Show\Field|Collection is_get(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     * @method Show\Field|Collection news_num(string $label = null)
     * @method Show\Field|Collection time(string $label = null)
     * @method Show\Field|Collection num(string $label = null)
     * @method Show\Field|Collection type0(string $label = null)
     * @method Show\Field|Collection jmtj(string $label = null)
     * @method Show\Field|Collection gsmc(string $label = null)
     * @method Show\Field|Collection gsdz(string $label = null)
     * @method Show\Field|Collection aid(string $label = null)
     * @method Show\Field|Collection typeid(string $label = null)
     * @method Show\Field|Collection redirecturl(string $label = null)
     * @method Show\Field|Collection templet(string $label = null)
     * @method Show\Field|Collection userip(string $label = null)
     * @method Show\Field|Collection jmxx(string $label = null)
     * @method Show\Field|Collection zczj(string $label = null)
     * @method Show\Field|Collection type1(string $label = null)
     * @method Show\Field|Collection time0(string $label = null)
     * @method Show\Field|Collection ismake(string $label = null)
     * @method Show\Field|Collection userid(string $label = null)
     * @method Show\Field|Collection body(string $label = null)
     * @method Show\Field|Collection pagestyle(string $label = null)
     * @method Show\Field|Collection maxwidth(string $label = null)
     * @method Show\Field|Collection imgurls(string $label = null)
     * @method Show\Field|Collection col(string $label = null)
     * @method Show\Field|Collection isrm(string $label = null)
     * @method Show\Field|Collection ddmaxwidth(string $label = null)
     * @method Show\Field|Collection pagepicnum(string $label = null)
     * @method Show\Field|Collection channel(string $label = null)
     * @method Show\Field|Collection arcrank(string $label = null)
     * @method Show\Field|Collection mid(string $label = null)
     * @method Show\Field|Collection click(string $label = null)
     * @method Show\Field|Collection litpic(string $label = null)
     * @method Show\Field|Collection senddate(string $label = null)
     * @method Show\Field|Collection flag(string $label = null)
     * @method Show\Field|Collection lastpost(string $label = null)
     * @method Show\Field|Collection scores(string $label = null)
     * @method Show\Field|Collection goodpost(string $label = null)
     * @method Show\Field|Collection badpost(string $label = null)
     * @method Show\Field|Collection nativeplace(string $label = null)
     * @method Show\Field|Collection infotype(string $label = null)
     * @method Show\Field|Collection tel(string $label = null)
     * @method Show\Field|Collection address(string $label = null)
     * @method Show\Field|Collection linkman(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection trueprice(string $label = null)
     * @method Show\Field|Collection units(string $label = null)
     * @method Show\Field|Collection vocation(string $label = null)
     * @method Show\Field|Collection uptime(string $label = null)
     * @method Show\Field|Collection filetype(string $label = null)
     * @method Show\Field|Collection language(string $label = null)
     * @method Show\Field|Collection softtype(string $label = null)
     * @method Show\Field|Collection accredit(string $label = null)
     * @method Show\Field|Collection os(string $label = null)
     * @method Show\Field|Collection softrank(string $label = null)
     * @method Show\Field|Collection officialUrl(string $label = null)
     * @method Show\Field|Collection officialDemo(string $label = null)
     * @method Show\Field|Collection softsize(string $label = null)
     * @method Show\Field|Collection softlinks(string $label = null)
     * @method Show\Field|Collection introduce(string $label = null)
     * @method Show\Field|Collection daccess(string $label = null)
     * @method Show\Field|Collection needmoney(string $label = null)
     * @method Show\Field|Collection note(string $label = null)
     * @method Show\Field|Collection usertype(string $label = null)
     * @method Show\Field|Collection pwd(string $label = null)
     * @method Show\Field|Collection uname(string $label = null)
     * @method Show\Field|Collection tname(string $label = null)
     * @method Show\Field|Collection logintime(string $label = null)
     * @method Show\Field|Collection loginip(string $label = null)
     * @method Show\Field|Collection rank(string $label = null)
     * @method Show\Field|Collection typename(string $label = null)
     * @method Show\Field|Collection system(string $label = null)
     * @method Show\Field|Collection purviews(string $label = null)
     * @method Show\Field|Collection maintable(string $label = null)
     * @method Show\Field|Collection mainfields(string $label = null)
     * @method Show\Field|Collection addontable(string $label = null)
     * @method Show\Field|Collection addonfields(string $label = null)
     * @method Show\Field|Collection forms(string $label = null)
     * @method Show\Field|Collection template(string $label = null)
     * @method Show\Field|Collection sortid(string $label = null)
     * @method Show\Field|Collection att(string $label = null)
     * @method Show\Field|Collection attname(string $label = null)
     * @method Show\Field|Collection md5hash(string $label = null)
     * @method Show\Field|Collection cachedata(string $label = null)
     * @method Show\Field|Collection typeid2(string $label = null)
     * @method Show\Field|Collection sortrank(string $label = null)
     * @method Show\Field|Collection money(string $label = null)
     * @method Show\Field|Collection shorttitle(string $label = null)
     * @method Show\Field|Collection color(string $label = null)
     * @method Show\Field|Collection writer(string $label = null)
     * @method Show\Field|Collection source(string $label = null)
     * @method Show\Field|Collection pubdate(string $label = null)
     * @method Show\Field|Collection keywords(string $label = null)
     * @method Show\Field|Collection voteid(string $label = null)
     * @method Show\Field|Collection notpost(string $label = null)
     * @method Show\Field|Collection filename(string $label = null)
     * @method Show\Field|Collection dutyadmin(string $label = null)
     * @method Show\Field|Collection tackid(string $label = null)
     * @method Show\Field|Collection mtype(string $label = null)
     * @method Show\Field|Collection weight(string $label = null)
     * @method Show\Field|Collection tagid(string $label = null)
     * @method Show\Field|Collection innertext(string $label = null)
     * @method Show\Field|Collection pagesize(string $label = null)
     * @method Show\Field|Collection arcids(string $label = null)
     * @method Show\Field|Collection ordersql(string $label = null)
     * @method Show\Field|Collection addfieldsSql(string $label = null)
     * @method Show\Field|Collection addfieldsSqlJoin(string $label = null)
     * @method Show\Field|Collection attstr(string $label = null)
     * @method Show\Field|Collection membername(string $label = null)
     * @method Show\Field|Collection adminrank(string $label = null)
     * @method Show\Field|Collection reid(string $label = null)
     * @method Show\Field|Collection topid(string $label = null)
     * @method Show\Field|Collection typedir(string $label = null)
     * @method Show\Field|Collection isdefault(string $label = null)
     * @method Show\Field|Collection defaultname(string $label = null)
     * @method Show\Field|Collection issend(string $label = null)
     * @method Show\Field|Collection channeltype(string $label = null)
     * @method Show\Field|Collection maxpage(string $label = null)
     * @method Show\Field|Collection ispart(string $label = null)
     * @method Show\Field|Collection corank(string $label = null)
     * @method Show\Field|Collection tempindex(string $label = null)
     * @method Show\Field|Collection templist(string $label = null)
     * @method Show\Field|Collection temparticle(string $label = null)
     * @method Show\Field|Collection namerule(string $label = null)
     * @method Show\Field|Collection namerule2(string $label = null)
     * @method Show\Field|Collection modname(string $label = null)
     * @method Show\Field|Collection seotitle(string $label = null)
     * @method Show\Field|Collection moresite(string $label = null)
     * @method Show\Field|Collection sitepath(string $label = null)
     * @method Show\Field|Collection siteurl(string $label = null)
     * @method Show\Field|Collection ishidden(string $label = null)
     * @method Show\Field|Collection cross(string $label = null)
     * @method Show\Field|Collection crossid(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection smalltypes(string $label = null)
     * @method Show\Field|Collection disorder(string $label = null)
     * @method Show\Field|Collection nid(string $label = null)
     * @method Show\Field|Collection addtable(string $label = null)
     * @method Show\Field|Collection addcon(string $label = null)
     * @method Show\Field|Collection mancon(string $label = null)
     * @method Show\Field|Collection editcon(string $label = null)
     * @method Show\Field|Collection useraddcon(string $label = null)
     * @method Show\Field|Collection usermancon(string $label = null)
     * @method Show\Field|Collection usereditcon(string $label = null)
     * @method Show\Field|Collection fieldset(string $label = null)
     * @method Show\Field|Collection listfields(string $label = null)
     * @method Show\Field|Collection allfields(string $label = null)
     * @method Show\Field|Collection issystem(string $label = null)
     * @method Show\Field|Collection isshow(string $label = null)
     * @method Show\Field|Collection arcsta(string $label = null)
     * @method Show\Field|Collection sendrank(string $label = null)
     * @method Show\Field|Collection needdes(string $label = null)
     * @method Show\Field|Collection needpic(string $label = null)
     * @method Show\Field|Collection titlename(string $label = null)
     * @method Show\Field|Collection onlyone(string $label = null)
     * @method Show\Field|Collection dfcid(string $label = null)
     * @method Show\Field|Collection dtime(string $label = null)
     * @method Show\Field|Collection isdown(string $label = null)
     * @method Show\Field|Collection isexport(string $label = null)
     * @method Show\Field|Collection result(string $label = null)
     * @method Show\Field|Collection hash(string $label = null)
     * @method Show\Field|Collection tofile(string $label = null)
     * @method Show\Field|Collection channelid(string $label = null)
     * @method Show\Field|Collection notename(string $label = null)
     * @method Show\Field|Collection sourcelang(string $label = null)
     * @method Show\Field|Collection cotime(string $label = null)
     * @method Show\Field|Collection pnum(string $label = null)
     * @method Show\Field|Collection isok(string $label = null)
     * @method Show\Field|Collection usemore(string $label = null)
     * @method Show\Field|Collection listconfig(string $label = null)
     * @method Show\Field|Collection itemconfig(string $label = null)
     * @method Show\Field|Collection issource(string $label = null)
     * @method Show\Field|Collection lang(string $label = null)
     * @method Show\Field|Collection rule(string $label = null)
     * @method Show\Field|Collection diyid(string $label = null)
     * @method Show\Field|Collection posttemplate(string $label = null)
     * @method Show\Field|Collection viewtemplate(string $label = null)
     * @method Show\Field|Collection listtemplate(string $label = null)
     * @method Show\Field|Collection table(string $label = null)
     * @method Show\Field|Collection info(string $label = null)
     * @method Show\Field|Collection public(string $label = null)
     * @method Show\Field|Collection dtype(string $label = null)
     * @method Show\Field|Collection dltime(string $label = null)
     * @method Show\Field|Collection referrer(string $label = null)
     * @method Show\Field|Collection downloads(string $label = null)
     * @method Show\Field|Collection errtxt(string $label = null)
     * @method Show\Field|Collection oktxt(string $label = null)
     * @method Show\Field|Collection sendtime(string $label = null)
     * @method Show\Field|Collection arctitle(string $label = null)
     * @method Show\Field|Collection ischeck(string $label = null)
     * @method Show\Field|Collection bad(string $label = null)
     * @method Show\Field|Collection good(string $label = null)
     * @method Show\Field|Collection ftype(string $label = null)
     * @method Show\Field|Collection face(string $label = null)
     * @method Show\Field|Collection msg(string $label = null)
     * @method Show\Field|Collection webname(string $label = null)
     * @method Show\Field|Collection logo(string $label = null)
     * @method Show\Field|Collection listdir(string $label = null)
     * @method Show\Field|Collection defaultpage(string $label = null)
     * @method Show\Field|Collection nodefault(string $label = null)
     * @method Show\Field|Collection edtime(string $label = null)
     * @method Show\Field|Collection listtag(string $label = null)
     * @method Show\Field|Collection position(string $label = null)
     * @method Show\Field|Collection showmod(string $label = null)
     * @method Show\Field|Collection keyword(string $label = null)
     * @method Show\Field|Collection sta(string $label = null)
     * @method Show\Field|Collection rpurl(string $label = null)
     * @method Show\Field|Collection lid(string $label = null)
     * @method Show\Field|Collection adminid(string $label = null)
     * @method Show\Field|Collection query(string $label = null)
     * @method Show\Field|Collection cip(string $label = null)
     * @method Show\Field|Collection sex(string $label = null)
     * @method Show\Field|Collection exptime(string $label = null)
     * @method Show\Field|Collection matt(string $label = null)
     * @method Show\Field|Collection spacesta(string $label = null)
     * @method Show\Field|Collection safequestion(string $label = null)
     * @method Show\Field|Collection safeanswer(string $label = null)
     * @method Show\Field|Collection jointime(string $label = null)
     * @method Show\Field|Collection joinip(string $label = null)
     * @method Show\Field|Collection checkmail(string $label = null)
     * @method Show\Field|Collection company(string $label = null)
     * @method Show\Field|Collection product(string $label = null)
     * @method Show\Field|Collection place(string $label = null)
     * @method Show\Field|Collection cosize(string $label = null)
     * @method Show\Field|Collection fax(string $label = null)
     * @method Show\Field|Collection checked(string $label = null)
     * @method Show\Field|Collection comface(string $label = null)
     * @method Show\Field|Collection fid(string $label = null)
     * @method Show\Field|Collection floginid(string $label = null)
     * @method Show\Field|Collection funame(string $label = null)
     * @method Show\Field|Collection addtime(string $label = null)
     * @method Show\Field|Collection groupid(string $label = null)
     * @method Show\Field|Collection groupname(string $label = null)
     * @method Show\Field|Collection gid(string $label = null)
     * @method Show\Field|Collection buyid(string $label = null)
     * @method Show\Field|Collection pname(string $label = null)
     * @method Show\Field|Collection mtime(string $label = null)
     * @method Show\Field|Collection pid(string $label = null)
     * @method Show\Field|Collection oldinfo(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
