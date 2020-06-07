<?php

/**
 * @link: http://www.Awcore.com/dev
 */
 
   function pagination($total, $per_page = 12,$page = 1, $url = 'search_page.php?',$keyword='',$price_min=0,$price_max=0,$localtion='',$parent=''){        
    	// $query = "SELECT COUNT(*) as `num` FROM {$query}";
		// $row = mysql_fetch_array(mysql_query($query));
		

    	$total = $total;
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
		$lpm1 = $lastpage - 1;
		

		// if($category > 0){
		// 	$where_category='&category='.$category;
		// }else{
		// 	$where_category='';
		// }

	
		$where_search="&keyword=$keyword&price_min=$price_min&price_max=$price_max";

		if($localtion){
			$where_search.="&localtion=$localtion&parent=$parent";

		}
		
    	
    	$pagination = "";
    	if($lastpage > 1)
    	{	
			//$pagination .= "<ul class='pagination'>";
			$pagination .= "<a  href='{$url}page=1$where_search' class='btn btn-dark btn-lg btn-square'>Previous</a> ";
                  //  $pagination .= "<li class='details' style='margin-top:2px'>Page $page of $lastpage</li>";
    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $page)
    					$pagination.= '<a href="#" class="btn btn-primary btn-lg btn-square">'.$counter.'</a> ';
    				else
    					$pagination.= "<a href='{$url}page=$counter$where_search' class='btn btn-dark btn-lg btn-square' >$counter</a> ";					
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= '<a href="#" class="btn btn-primary btn-lg btn-square">'.$counter.'</a> ';
    					else
    						$pagination.= "<a href='{$url}page=$counter$where_search' class='btn btn-dark btn-lg btn-square' >$counter</a> ";					
    				}
    				$pagination.= "<a  href='#' class='btn btn-dark btn-lg btn-square'>...</a> ";
    				$pagination.= "<a href='{$url}page=$lpm1$where_search' class='btn btn-dark btn-lg btn-square'>$lpm1</a> ";
    				$pagination.= "<a href='{$url}page=$lastpage$where_search' class='btn btn-dark btn-lg btn-square'>$lastpage</a> ";		
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "<a href='{$url}page=1$where_search' class='btn btn-dark btn-lg btn-square'>1</a> ";
    				$pagination.= "<a href='{$url}page=2$where_search' class='btn btn-dark btn-lg btn-square'>2</a> ";
    				$pagination.= "<a  href='#' class='btn btn-dark btn-lg btn-square'>...</a> ";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<a href='#' class='btn btn-primary btn-lg btn-square'>$counter</a> ";
    					else
    						$pagination.= "<a href='{$url}page=$counter$where_search' class='btn btn-dark btn-lg btn-square'>$counter</a> ";					
    				}
    				$pagination.= "<a href='#' class='btn btn-dark btn-lg btn-square'>...</a> ";
    				$pagination.= "<a href='{$url}page=$lpm1$where_search' class='btn btn-dark btn-lg btn-square'>$lpm1</a> ";
    				$pagination.= "<a href='{$url}page=$lastpage$where_search' class='btn btn-dark btn-lg btn-square'>$lastpage</a> ";		
    			}
    			else
    			{
    				$pagination.= "<a href='{$url}page=1$where_search' class='btn btn-dark btn-lg btn-square'>1</a> ";
    				$pagination.= "<a href='{$url}page=2$where_search' class='btn btn-dark btn-lg btn-square'>2</a> ";
    				$pagination.= "<a href='#' class='btn btn-dark btn-lg btn-square'>...</a> ";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<a href='#'  class='btn btn-primary btn-lg btn-square'>$counter</a> ";
    					else
    						$pagination.= "<a href='{$url}page=$counter$where_search' class='btn btn-dark btn-lg btn-square' >$counter</a> ";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$pagination.= "<a href='{$url}page=$next$where_search' class='btn btn-dark btn-lg btn-square' >Next</a> ";
                $pagination.= "<a href='{$url}page=$lastpage$where_search'  class='btn btn-dark btn-lg btn-square'>Last</a> ";
    		}else{
    			$pagination.= "<a  class='btn btn-dark btn-lg btn-square'>Next</a> ";
                $pagination.= "<a  class='btn btn-dark btn-lg btn-square'>Last</a> ";
            }
    		//$pagination.= "</ul>\n";		
    	}
    
    
        return $pagination;
    } 
?>