

   

  var language_name = localStorage.getItem("language");
    

    load_language();
    load_currency();
    load_from();
    function logout(){

        var language = localStorage.getItem("language");
        var text = 'ທ່ານຕ້ອງການອອກຈາກລະບົບຫຼືບໍ່ ?';
        if(language == 'EN' ){
           
            text = 'EN'
  
        }

        swal({
            title: text,
            text: "Message Confirm",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                
                $.ajax({  
                    url:"php/logout.php",  
                    method:"POST",  
                    data:{},  
                    dataType:"json",  
                    success:function(data){  
                       
                        window.location.replace("index.php");
                        
                        
                    }
                });
                window.location.replace("index.php");

            } else {
                
                return false                        
            }
        });

       
        
      }
     


    function msg(la,en){

      var language = localStorage.getItem("language");
      if(language == 'EN' ){
          swal({
                  title: en,
                  text:   "Alert !",
                  icon: "warning",
              }); 

      }else{

          swal({
                  title: la,
                  text:   "ແຈ້ງເຕືອນ !",
                  icon: "warning",
              }); 
      }

      
    }

    $.ajax({
        url:"php/category/select_category.php",
        method:"POST",
        dataType:"text",
        success:function(data){
        $('#category_list').html(data);
        }
    });

    $.ajax({
        url:"php/location/select_provint.php",
        method:"POST",
        dataType:"text",
        success:function(data){
        $('#list_provint').html(data);
        }
    });

    

    $(document).on('click', '.select_provin', function(){  
        var provin_id = $(this).attr("id"); 
        var provin_text = $(this).attr("data-text"); 
        
        console.log(provin_id);
        console.log(provin_text);
        document.getElementById("sect_provin").innerHTML = provin_text+' <span class="badge provin_close">X</span>';
        document.getElementById("sect_provin").classList.remove("d-none");

        document.getElementById("btn_search").setAttribute('data-provin', provin_text);

        //window.location.replace('search_page.php?keyword=&price_min=&price_max=&localtion='+provin_text+'&parent='+provin_id);


        
        $.ajax({  
            url:"php/sub_location/select_city.php",  
            method:"POST",  
            data:{provin_id:provin_id},  
            dataType:"text",  
            success:function(data){
                //console.log(data);  
                $('#list_provint').html(data);
              
            }  
        });  
        
      
    });

    function load_city(provin_id){
       
        
        $.ajax({  
            url:"php/sub_location/select_city.php",  
            method:"POST",  
            data:{provin_id:provin_id},  
            dataType:"text",  
            success:function(data){
                //console.log(data);  
                $('#list_provint').html(data);
              
            }  
        });  
    }

    

    $(document).on('click', '.select_city', function(){  
        var provin_id = $(this).attr("id"); 
        var provin_text = $(this).attr("data-text"); 
        
        console.log(provin_id);
        console.log(provin_text);
        document.getElementById("seclt_city").innerHTML = provin_text+' <span class="badge city_close">X</span>';
        document.getElementById("seclt_city").classList.remove("d-none");
        document.getElementById("btn_search").setAttribute('data-city', provin_text);

        //window.location.replace('search_page.php?keyword=&price_min=&price_max=&localtion='+provin_text+'&parent=');

        

    });

    $(document).on('click', '.city_close', function(){  
        document.getElementById("seclt_city").classList.add("d-none");
        document.getElementById("btn_search").setAttribute('data-city', '');
    });

    $(document).on('click', '.provin_close', function(){  
        document.getElementById("sect_provin").classList.add("d-none");
        document.getElementById("seclt_city").classList.add("d-none");
        document.getElementById("btn_search").setAttribute('data-provin', '');
        document.getElementById("btn_search").setAttribute('data-city', '');

        $.ajax({
            url:"php/location/select_provint.php",
            method:"POST",
            dataType:"text",
            success:function(data){
            $('#list_provint').html(data);
            }
        });
    });


    function load_currency(){
        var language = localStorage.getItem("language");
        $.ajax({
            url:"php/currency/currency.php",
            method:"POST",
            data:{language:language},  
            dataType:"text",
            success:function(data){
            $('#Currency_list').html(data);
            }
        });
    }

    function change_currency($currency){
        console.log('change_currency');
        localStorage.setItem("currency",$currency);
        location.reload();
    }

 
   

    function load_from(){

        console.log('load_from....');
        var language = localStorage.getItem("language");
        $.ajax({  
                url:"php/load_system.php",  
                method:"POST",  
                data:{},
                dataType:"json",  
                success:function(data){  

                    console.log('load_from');
                    // console.log(data);

                    try {  document.getElementById("image_logo").src = "img/logo/"+data.image;}catch(err) {console.log(err.message);}
                    try {  document.getElementById("logo").src = "img/logo/"+data.image;}catch(err) {console.log(err.message);}
                    try {  document.getElementById("icon").href = "img/logo/"+data.image;}catch(err) {console.log(err.message);}
                    try { $('#Name_System').val(data.Name_LA);}catch(err) {console.log(err.message);}
                    try { $('#Name_System_EN').val(data.Name_EN);}catch(err) {console.log(err.message);}
                    try { $('#token_bot').val(data.token_bot);}catch(err) {console.log(err.message);}
                    try { $('#chat_id').val(data.chat_id);}catch(err) {console.log(err.message);}

                    if(language == 'EN' ){
                        try {document.getElementById("title_web").innerHTML = data.Name_EN}catch(err) {console.log(err.message);}

                    }else{
                        try {document.getElementById("title_web").innerHTML = data.Name_LA}catch(err) {console.log(err.message);}
                     
                    }
                

                }
            });
    }

    function msg_confrim(la,en){

        var language = localStorage.getItem("language");
        if(language == 'EN' ){

                swal({
                    title: en,
                    text: "Message Confirm",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        
                        return true
        
        
                    } else {
                        
                        return false                        
                    }
                }); 

        }else{

            swal({
                title: la,
                text: "ກະລຸນາຢືນຢັນ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    
                    return true
    
    
                } else {

                    return false                        
                }
            }); 
        }
      
    }

    function change_language() {
        console.log('change_language');
        var language = localStorage.getItem("language");
        if(language == 'EN' ){

            localStorage.setItem("language", 'LAO');
            var image = document.getElementById("img_language");
            image.src = "https://f.ptcdn.info/842/045/000/od8z68jkkuXB1zo7A3U-o.png";
            console.log('LAO')
            load_language();
           
          
        }else if(language == 'LAO' ){
                localStorage.setItem("language", 'THAI');
                var image = document.getElementById("img_language");
                
                image.src = "https://upload.wikimedia.org/wikipedia/commons/a/a9/Flag_of_Thailand.svg";
                //console.log('EN')
                load_language();
           
          
        }
        else if(language == 'THAI' ){
            localStorage.setItem("language", 'EN');
            var image = document.getElementById("img_language");
            
            image.src = "https://upload.wikimedia.org/wikipedia/commons/5/56/Flag_of_Laos.svg";
            //console.log('EN')
            load_language();
       
      
        }

       
        else{
            // localStorage.setItem("language", 'LAO');
            // var image = document.getElementById("img_language");
            // image.src = "https://f.ptcdn.info/842/045/000/od8z68jkkuXB1zo7A3U-o.png";
            // console.log('LAO')
            // load_language();

            localStorage.setItem("language", 'THAI');
            var image = document.getElementById("img_language");
            
            image.src = "https://upload.wikimedia.org/wikipedia/commons/a/a9/Flag_of_Thailand.svg";
            //console.log('EN')
            load_language();
        }

        location.reload();
      }

      
    function change_img() {
        console.log('change_language');
        var language = localStorage.getItem("language");
        if(language == 'EN' ){
         
           
            var image = document.getElementById("img_language");
            image.src = "https://upload.wikimedia.org/wikipedia/commons/5/56/Flag_of_Laos.svg";

          
        }else if(language == 'LAO'){
            var image = document.getElementById("img_language");
            image.src = "https://upload.wikimedia.org/wikipedia/commons/a/a9/Flag_of_Thailand.svg";
        }
        
        else if(language == 'THAI'){
            
            var image = document.getElementById("img_language");
            image.src = "https://f.ptcdn.info/842/045/000/od8z68jkkuXB1zo7A3U-o.png";

 
        }
      }

      $(document).on('click', '#btn_search', function(){  

        console.log('search_btn');
        var provin = $(this).attr("data-provin"); 
        var city = $(this).attr("data-city"); 
        var keyword = $('#keyword').val().split(' ').join('+');
        var price_min = $('#price_min').val();
        var price_max = $('#price_max').val();
        var price_to_m = $('#price_to_m').val();

        var localtion ='';
        if(provin){

            if(city){
                localtion = city;
            }else{
                localtion = provin;
            }
        }

        console.log( ' localtion',localtion);
        console.log( ' keyword',keyword);
        console.log( ' price_min',price_min);
        console.log( ' price_max',price_max);
        if(keyword == ''&& price_min == '' && price_max == '' && price_to_m == '' && localtion == ''){
            
            msg('ບໍ່ມີຄຳຄົ້ນຫາ','No word for Search');
        }else{
             window.location.replace('search_page.php?keyword='+keyword+'&price_min='+price_min+'&price_max='+price_max+'&price_to_m='+price_to_m+'&localtion='+localtion);
        }

        //window.location.replace('search_page.php?keyword='+keyword+'&price_min='+price_min+'&price_max='+price_max);

      });

     



      function load_language() {
        var language_name = localStorage.getItem("language");
        console.log('load_language')
        $.ajax({  
            url:"translate.php", 
            method:"POST",  
            data:{language:language_name},  
            dataType:"json",  
            success:function(language_translate){  
                
              
    
                // from index 
    
                document.getElementById("home").innerHTML = language_translate.home;
               // document.getElementById("category").innerHTML = language_translate.category;
                document.getElementById("information").innerHTML = language_translate.infomation;
                document.getElementById("about").innerHTML = language_translate.about;

                
                try {document.getElementById("login").innerHTML = ' <i class="fas fa-user-circle fa-lg"></i> '+language_translate.login;}catch(err) {console.log(err.message);}
                try {document.getElementById("profile").innerHTML = language_translate.profile;}catch(err) {console.log(err.message);}
                try {document.getElementById("logout").innerHTML = language_translate.logout;}catch(err) {console.log(err.message);}
                try {document.getElementById("Currency").innerHTML = language_translate.currency;}catch(err) {console.log(err.message);}
                try {document.getElementById("search").innerHTML = language_translate.search;}catch(err) {console.log(err.message);}
              

                try {document.getElementById("titel_login").innerHTML = language_translate.titel_login;}catch(err) {console.log(err.message);}
                try {document.getElementById("button_login").innerHTML = language_translate.button_login;}catch(err) {console.log(err.message);}
                try {document.getElementById("button_Register").innerHTML = language_translate.button_Register;}catch(err) {console.log(err.message);}

                try {document.getElementById("menu_inbox").innerHTML = '<i class="fa fa-envelope"></i> '+language_translate.menu_inbox+' ';}catch(err) {console.log(err.message);}
                try {document.getElementById("menu_product_list").innerHTML = '<i class="fab fa-product-hunt "></i> '+language_translate.menu_product_list;}catch(err) {console.log(err.message);}
                try {document.getElementById("menu_category_list").innerHTML = '<i class="fas fa-copyright"></i> '+language_translate.menu_category_list;}catch(err) {console.log(err.message);}
                try {document.getElementById("menu_information").innerHTML = '<i class="fas fa-file"></i> '+language_translate.menu_information;}catch(err) {console.log(err.message);}
                try {document.getElementById("menu_localtion").innerHTML = '<i class="fas fa-map-marker-alt"></i> '+language_translate.menu_localtion;}catch(err) {console.log(err.message);}
                try {document.getElementById("menu_user_active").innerHTML = '<i class="fas fa-user"></i> '+language_translate.menu_user_active;}catch(err) {console.log(err.message);}
                try {document.getElementById("menu_change_password").innerHTML = '<i class="fas fa-key"></i> '+language_translate.menu_change_password;}catch(err) {console.log(err.message);}
                try {document.getElementById("menu_setting").innerHTML = '<i class="fas fa-cog"></i> '+language_translate.menu_setting;}catch(err) {console.log(err.message);}
                try {document.getElementById("menu_config").innerHTML = language_translate.menu_config;}catch(err) {console.log(err.message);}

                try {document.getElementById("user_titel_card").innerHTML = language_translate.user_titel_card;}catch(err) {console.log(err.message);}
                try {document.getElementById("user_table_code").innerHTML = language_translate.user_table_code;}catch(err) {console.log(err.message);}
                try {document.getElementById("user_table_name").innerHTML = language_translate.user_table_name;}catch(err) {console.log(err.message);}
                try {document.getElementById("user_table_phone").innerHTML = language_translate.user_table_phone;}catch(err) {console.log(err.message);}
                try {document.getElementById("user_table_address").innerHTML = language_translate.user_table_address;}catch(err) {console.log(err.message);}
                try {document.getElementById("user_table_menber").innerHTML = language_translate.user_table_menber;}catch(err) {console.log(err.message);}
                try {document.getElementById("user_table_status").innerHTML = language_translate.user_table_status;}catch(err) {console.log(err.message);}

                try {document.getElementById("category_titel_card").innerHTML = language_translate.category_titel_card;}catch(err) {console.log(err.message);}
                try {document.getElementById("insert_category_titel").innerHTML = language_translate.category_titel_card;}catch(err) {console.log(err.message);}
                try {document.getElementById("category_table_code").innerHTML = language_translate.category_table_code;}catch(err) {console.log(err.message);}
                try {document.getElementById("category_table_name").innerHTML = language_translate.category_table_name;}catch(err) {console.log(err.message);}
                try {document.getElementById("category_table_status").innerHTML = language_translate.category_table_status;}catch(err) {console.log(err.message);}
                try {document.getElementById("category_add").innerHTML = language_translate.category_add;}catch(err) {console.log(err.message);}

                try {document.getElementById("category_label_name").innerHTML = language_translate.category_table_name;}catch(err) {console.log(err.message);}
                try {document.getElementById("category_label_name_en").innerHTML = language_translate.category_table_name_en;}catch(err) {console.log(err.message);}
                try {document.getElementById("category_label_status").innerHTML = language_translate.category_table_status;}catch(err) {console.log(err.message);}
                try {document.getElementById("category_save").innerHTML = language_translate.category_save;}catch(err) {console.log(err.message);}
                try {document.getElementById("category_table_name_en").innerHTML = language_translate.category_table_name_en;}catch(err) {console.log(err.message);}
                try {document.getElementById("category_table_name_thai").innerHTML = language_translate.category_table_name_thai;}catch(err) {console.log(err.message);}
                try {document.getElementById("category_label_name_thai").innerHTML = language_translate.category_table_name_thai;}catch(err) {console.log(err.message);}

                try {document.getElementById("localtion_titel_card").innerHTML = language_translate.localtion_titel_card;}catch(err) {console.log(err.message);}
                try {document.getElementById("insert_localtion_titel").innerHTML = language_translate.localtion_titel_card;}catch(err) {console.log(err.message);}
                try {document.getElementById("localtion_table_code").innerHTML = language_translate.localtion_table_code;}catch(err) {console.log(err.message);}
                try {document.getElementById("localtion_table_name").innerHTML = language_translate.localtion_table_name;}catch(err) {console.log(err.message);}
                try {document.getElementById("localtion_table_status").innerHTML = language_translate.localtion_table_status;}catch(err) {console.log(err.message);}
                try {document.getElementById("localtion_add").innerHTML = language_translate.localtion_add;}catch(err) {console.log(err.message);}

                try {document.getElementById("localtion_label_name").innerHTML = language_translate.localtion_table_name;}catch(err) {console.log(err.message);}
                try {document.getElementById("localtion_label_name_en").innerHTML = language_translate.localtion_table_name_en;}catch(err) {console.log(err.message);}
                try {document.getElementById("localtion_label_status").innerHTML = language_translate.localtion_table_status;}catch(err) {console.log(err.message);}
                try {document.getElementById("localtion_save").innerHTML = language_translate.localtion_save;}catch(err) {console.log(err.message);}
                try {document.getElementById("localtion_table_name_en").innerHTML = language_translate.localtion_table_name_en;}catch(err) {console.log(err.message);}
                

                try {document.getElementById("city_titel_card").innerHTML = language_translate.city_titel_card;}catch(err) {console.log(err.message);}
                try {document.getElementById("insert_city_titel").innerHTML = language_translate.city_titel_card;}catch(err) {console.log(err.message);}
                try {document.getElementById("city_table_code").innerHTML = language_translate.city_table_code;}catch(err) {console.log(err.message);}
                try {document.getElementById("city_table_name").innerHTML = language_translate.city_table_name;}catch(err) {console.log(err.message);}
                try {document.getElementById("city_table_status").innerHTML = language_translate.city_table_status;}catch(err) {console.log(err.message);}
                try {document.getElementById("city_add").innerHTML = language_translate.city_add;}catch(err) {console.log(err.message);}

                try {document.getElementById("city_label_name").innerHTML = language_translate.city_table_name;}catch(err) {console.log(err.message);}
                try {document.getElementById("city_label_name_en").innerHTML = language_translate.city_table_name_en;}catch(err) {console.log(err.message);}
                try {document.getElementById("city_label_status").innerHTML = language_translate.city_table_status;}catch(err) {console.log(err.message);}
                try {document.getElementById("city_save").innerHTML = language_translate.city_save;}catch(err) {console.log(err.message);}
                try {document.getElementById("city_table_name_en").innerHTML = language_translate.city_table_name_en;}catch(err) {console.log(err.message);}
                

            
                try {document.getElementById("search_text").innerHTML = language_translate.search_text;}catch(err) {console.log(err.message);}
                try {document.getElementById("price_min_text").innerHTML = language_translate.price_min_text;}catch(err) {console.log(err.message);}
                try {document.getElementById("price_max_text").innerHTML = language_translate.price_max_text;}catch(err) {console.log(err.message);}
                try {document.getElementById("localtion_text").innerHTML = language_translate.localtion_text;}catch(err) {console.log(err.message);}
                try {document.getElementById("price_all_text").innerHTML = language_translate.price_all_text;}catch(err) {console.log(err.message);}
                try {document.getElementById("btn_search").innerHTML = language_translate.btn_search;}catch(err) {console.log(err.message);}


                try {document.getElementById("message_total").innerHTML = language_translate.dashbord_message;}catch(err) {console.log(err.message);}
                try {document.getElementById("view_total").innerHTML = language_translate.dashbord_view_total;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_total").innerHTML = language_translate.dashbord_product_total;}catch(err) {console.log(err.message);}

                try {document.getElementById("inbox_titel_card").innerHTML = language_translate.inbox_titel_card;}catch(err) {console.log(err.message);}
                try {document.getElementById("inbox_table_code").innerHTML = language_translate.inbox_table_code;}catch(err) {console.log(err.message);}
                try {document.getElementById("inbox_table_name").innerHTML = language_translate.inbox_table_name;}catch(err) {console.log(err.message);}
                try {document.getElementById("inbox_table_message").innerHTML = language_translate.inbox_table_message;}catch(err) {console.log(err.message);}
                try {document.getElementById("inbox_table_phone").innerHTML = language_translate.inbox_table_phone;}catch(err) {console.log(err.message);}


                try {document.getElementById("contect_item").innerHTML = language_translate.contect_item;}catch(err) {console.log(err.message);}
                try {document.getElementById("name_item").innerHTML = language_translate.name_item;}catch(err) {console.log(err.message);}
                try {document.getElementById("phone_item").innerHTML = language_translate.phone_item;}catch(err) {console.log(err.message);}
                try {document.getElementById("message_item").innerHTML = language_translate.message_item;}catch(err) {console.log(err.message);}
                try {document.getElementById("send_inbox").innerHTML = language_translate.send_inbox;}catch(err) {console.log(err.message);}


                try {document.getElementById("product_list_titel_card").innerHTML = language_translate.product_list_titel_card;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_list_table_code").innerHTML = language_translate.product_list_table_code;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_list_table_name").innerHTML = language_translate.product_list_table_name;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_list_table_description").innerHTML = language_translate.product_list_table_description;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_list_table_localtion").innerHTML = language_translate.product_list_table_localtion;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_list_table_price").innerHTML = language_translate.product_list_table_price;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_list_btn_add_product").innerHTML = language_translate.product_list_btn_add_product;}catch(err) {console.log(err.message);}

                try {document.getElementById("add_product").innerHTML = language_translate.add_product;}catch(err) {console.log(err.message);}
                try {document.getElementById("edit_product").innerHTML = language_translate.edit_product;}catch(err) {console.log(err.message);}

                try {document.getElementById("product_text_name_la").innerHTML = language_translate.product_text_name_la;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_text_description_la").innerHTML = language_translate.product_text_description_la;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_text_localtion_la").innerHTML = language_translate.product_text_localtion_la;}catch(err) {console.log(err.message);}

                try {document.getElementById("product_text_name_en").innerHTML = language_translate.product_text_name_en;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_text_discription_en").innerHTML = language_translate.product_text_discription_en;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_text_localtion_en").innerHTML = language_translate.product_text_localtion_en;}catch(err) {console.log(err.message);}

                try {document.getElementById("product_text_price_kip").innerHTML = language_translate.product_text_price_kip;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_text_price_thb").innerHTML = language_translate.product_text_price_thb;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_text_price_usd").innerHTML = language_translate.product_text_price_usd;}catch(err) {console.log(err.message);}

                try {document.getElementById("product_category").innerHTML = language_translate.product_category;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_text_file").innerHTML = language_translate.product_text_file;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_save").innerHTML = language_translate.product_save;}catch(err) {console.log(err.message);}
                try {document.getElementById("product_close").innerHTML = language_translate.product_close;}catch(err) {console.log(err.message);}

               
                
                try {document.getElementById("change_password_titel").innerHTML = language_translate.change_password_titel;}catch(err) {console.log(err.message);}
                try {document.getElementById("change_password_old_Password").innerHTML = language_translate.change_password_old_Password;}catch(err) {console.log(err.message);}
                try {document.getElementById("change_password_new_Password").innerHTML = language_translate.change_password_new_Password;}catch(err) {console.log(err.message);}
                try {document.getElementById("change_password_Confirm_Password").innerHTML = language_translate.change_password_Confirm_Password;}catch(err) {console.log(err.message);}
                try {document.getElementById("change_password_button").innerHTML = language_translate.change_password_button;}catch(err) {console.log(err.message);}

                try {document.getElementById("information_titel_card").innerHTML = language_translate.information_titel_card;}catch(err) {console.log(err.message);}
                try {document.getElementById("information_add").innerHTML = language_translate.information_add;}catch(err) {console.log(err.message);}
                try {document.getElementById("information_table_image").innerHTML = language_translate.information_table_image;}catch(err) {console.log(err.message);}
                try {document.getElementById("information_table_titel").innerHTML = language_translate.information_table_titel;}catch(err) {console.log(err.message);}
                try {document.getElementById("information_table_Description").innerHTML = language_translate.information_table_Description;}catch(err) {console.log(err.message);}
                try {document.getElementById("information_save").innerHTML = language_translate.information_save;}catch(err) {console.log(err.message);}
                try {document.getElementById("information_close").innerHTML = language_translate.information_close;}catch(err) {console.log(err.message);}

                try {document.getElementById("description_titel").innerHTML = language_translate.description;}catch(err) {console.log(err.message);}
              
                try {
                    document.getElementById("Username").placeholder = language_translate.username;
                    document.getElementById("Password").placeholder = language_translate.passsword;
                } catch (error) {
                    console.log(error.message);
                }

         

                
                
            }  
        }); 
      }

     
    

    