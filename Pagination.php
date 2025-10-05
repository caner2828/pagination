<?php

namespace App\Configs;
use Symfony\Contracts\Translation\TranslatorInterface;
class Pagination {


    private $translator;

    public function __construct(TranslatorInterface $translator){
        $this->translator = $translator;
    }

   
   public function pagination(int $totalPages,int $page,$routingParams=false,$pathName=null,$params,$pageUrl='search?'){
       $pageQuery = ($params == '' ? 'page=' : '&page='); 
       $pagination = '';
       if($page>=2) {
            $pagination.= "<li> <a href='$pageUrl$params$pageQuery".($page-1)."'>  ".$this->translator->trans('prev')." </a></li>";  
        }  
        $minPage = $page - 1 == 0 ? 1 : ( $page >= 3 ? $page -2 : $page -1);
        for($i=$minPage; $i<=$totalPages; $i++){
                if($page==$i){
                    $pagination .= '<li class="active"><a href="'.$pageUrl.$params.$pageQuery.'"></a>'.$page.'</li>';
                }
                else if( $page >= 3 ? ($i<$page+3) : ($i<$page+2)){
                    $pagination .= "<li><a href='$pageUrl$params$pageQuery$i'>$i</a></li>";
                }
        }
        if($page<$totalPages){   
            $pagination.= "<li><a href='$pageUrl$params$pageQuery".($page+1)."'> ".$this->translator->trans('next')." </a></li>";   
        }  
        if($routingParams){
            if($pathName){
                if($_ENV['APP_ENV'] == 'prod') {
                      $routingUrl = "http://tutayi.com".  ($pathName == 'mainPage' ? "/" :  "/{$pathName}/");
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
