<?php  

    $output;
    if($_POST['language'] == 'EN'){
    
            

        $output='   <a href="#" class="dropdown-item" onclick="change_currency('."'KIP'".');" > KIP</a>
                    <a href="#" class="dropdown-item" onclick="change_currency('."'THB'".');" > THB </a>
                    <a href="#" class="dropdown-item" onclick="change_currency('."'USD'".');" > USD </a>';
                

    }else{
        
        $output='   <a href="#" class="dropdown-item" onclick="change_currency('."'KIP'".');" > ສະກຸນເງີນກີບ</a>
                    <a href="#" class="dropdown-item" onclick="change_currency('."'THB'".');" > ສະກຸນເງີນບາດ </a>
                    <a href="#" class="dropdown-item" onclick="change_currency('."'USD'".');" > ສະກຸນເງີນໂດລາ </a>';
    }
    echo $output;  
 
 ?>