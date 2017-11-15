<?php
require_once '..\IFilter.php';  
class ArticleDateFilter implements IFilter
{
    private $dateLo, $dateHi;
    
    function __construct($dateLo, $dateHi) 
    {
        $this->dateLo = $dateLo;
        $this->dateHi = $dateHi;
    }
    public function matches($article) 
    {
        return (($article->getDate() >= $this->dateLo)
                && ($article->getDate() <= $this->dateHi));
    }
}