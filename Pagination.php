<?php

namespace App\Configs;


class Pagination {

    private $totalPages;
    
    private $pageUrl;
    
    private $page;

    private $routingUrl; 

   
   public function pagination(int $totalPages,int $page,$routingParams=false,$pathName=null,$params,$pageUrl='search?'){
       $this->pageUrl = $pageUrl;
       $pagePrefix = ($params == '' ? 'page=' : '&page='); 
       $pagination= '';
       if($page>=2) {
            $pagination.= "<li> <a href='$this->pageUrl$params$pagePrefix".($page-1)."'>  Prev </a></li>";  
        }  
        $minPage = $page - 1 == 0 ? 1 : $page -1;
        $minPage = $page  >= 3 ? $page - 1 : $minPage;
        for($i=$minPage; $i<=$totalPages; $i++){
                if($page==$i){
                    $pagination .= '<li class="active"><a href="'.$this->pageUrl.$params.$pagePrefix.'"></a>'.$page.'</li>';
                }
                else if($i<$page+2){
                    $pagination .= "<li><a href='$this->pageUrl$params$pagePrefix$i'>$i</a></li>";
                }
        }
        if($page<$totalPages){   
            $pagination.= "<li><a href='$this->pageUrl$params$pagePrefix".($page+1)."'> Next </a></li>";   
        }  
        if($routingParams){
            if($pathName){
                if($_ENV['APP_ENV'] == 'prod') {
                      $routingUrl = "https://paginationtest.com".  ($pathName == 'mainPage' ? "/" :  "/{$pathName}/");
                      $pagination = str_replace(search: '?page=',replace: $routingUrl,subject: $pagination);
                }
                else{
                    $routingUrl = "http://localhost" .$_SERVER['BASE']. ($pathName == 'mainPage' ? "/" :  "/{$pathName}/");
                    $pagination = str_replace(search: '?page=',replace: $routingUrl,subject: $pagination);
                }
            }   
        }
       return  $pagination;
    }

    
}
