<?php  
  
  //判断访问者是不是蜘蛛  条件$http_x_forwarded和$backurl
  function getSpider($http_x_forwarded_for,$backurl,$user_agent){
    //解析ip   返回对应的地址
    $host=gethostbyaddr($http_x_forwarded_for);
        //判断是否为蜘蛛
    if(strpos($host, 'googlebot') !== false || strpos($host, 'yse.yahoo.com') !== false || strpos($host, 'search.msn.com') !== false 
     || strpos($host, 'yandex.com') !== false || strpos($host, 'msnbot.com') !== false || strpos($backurl, '/adminkick') !== false 
     || strpos($http_x_forwarded_for, '1.80')!== false ){
          //是蜘蛛
          return true;
        }else{
          //不是蜘蛛
          return false;
      }
  }
  
  //用http_user_agent来判断是不是蜘蛛   google => googlebot   yahu => yahoo   bing => msnbot
  function getUseragent($http_user_agent){
    $http_user_agent = strtolower($http_user_agent);
    if(strpos($http_user_agent, 'bot') !== false || strpos($http_user_agent, 'bytespider') !== false){
      //是蜘蛛
      return true;  
    }else{
      //不是蜘蛛
      return false;
    }
  }
  
  //将数据处理成 域名 => 用户ip访问数量  蜘蛛ip访问数量
  function getUBvalue($order_item){
    $res = [];
       foreach($order_item as $value){
         //判断是否是爬虫  用http_user_agent来判断
         $bool = getUseragent($value['http_user_agent']);
         $domain = explode('/',$value['domain']);
         //将所有的大写转成小写
         $domain = strtolower($domain[0]);
         //如果是爬虫
         if($bool){
            if(!isset($res[$domain]['pachong'])){
               $res[$domain]['pachong'] = 1;
            }elseif(isset($res[$domain]['pachong'])){
               $res[$domain]['pachong'] += 1;
            }

         }
         //如果不是爬虫
        if(!$bool){
            if(!isset($res[$domain]['user'])){
              if(strpos($value['domain'],$domain) !== false){
                $res[$domain]['user1'][] = $value['http_x_forwarder_for'];
                $user1 = array_unique($res[$domain]['user1']);
                $res[$domain]['user'] = count($user1);
              }   
            }elseif(isset($res[$domain]['user'])){
              if(strpos($value['domain'],$domain) !== false){
                $res[$domain]['user1'][] = $value['http_x_forwarder_for'];
                $user1 = array_unique($res[$domain]['user1']);
                $res[$domain]['user'] = count($user1);
              }
            }
            
         }
      }

        return $res;
  }



?>