
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <?php include 'src.php';   ?>

  
</head>


<body class="bg-light">

<?php 
 $fix="fixed-top";
    include 'header.php'; 

?>


<div class="d-flex">
    
   
<?php //include 'search.php'; ?>
    <div class="content p-4  mt-5">
        
   
        <div class="container">
            <div class="row" id="itemlist">
                

            </div>
            <div class="container text-center" id="pagination"> 
               
            </div>

        </div>
        <?php include 'search.php'; ?>
    </div>
</div>





</body>
</html>

<script>

        $(document).ready(function () {

            $('#search').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert_form')[0].reset();
            
                 
           });

            function load_parameter(){
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const product = urlParams.get('page');
                if(product){
                    return product;
                }else{
                    return 1;
                }
            }

         

            function load_keyword(){
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const keyword = urlParams.get('keyword');
                if(keyword){
                    return keyword;
                }else{
                    return 0;
                }
            }

            function load_price_min(){
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const price_min = urlParams.get('price_min');
                if(price_min){
                    return price_min;
                }else{
                    return 0;
                }
            }

            function load_price_max(){
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const price_max = urlParams.get('price_max');
                if(price_max){
                    return price_max;
                }else{
                    return 0;
                }
            }

           

            function load_list(){
                

                var page = load_parameter();
              
                var keyword;
                try {
                    keyword = load_keyword().split(' ').join('+');
                } catch (error) {
                    keyword = load_keyword();
                }
                
                var url_search = load_keyword();
                var price_min = load_price_min();
                var price_max = load_price_max();
                var currency = localStorage.getItem("currency");
                if(!currency){
                    currency = 'KIP';
                }

                console.log(keyword);

                $.ajax({
                    url:"php/search/pagination.php",
                    method:"POST",
                    dataType:"json",
                    data:{page:page,currency:currency,keyword:keyword,price_min:price_min,price_max:price_max,url_search:url_search},  
                    success:function(data){
                        console.log(data);
                        $('#itemlist').html(data.itemlist);
                        $('#pagination').html(data.pagination);
                        if(data.total_rows == 0){
                            msg('ບໍ່ພົບຂໍ້ມູນທີຄົ້ນຫາ','EN')
                        }
                       

                    }
                });

            }

            load_list();
               


                $(document).on('click', '.item_detell', function(){  
               

                    var product_id = $(this).attr("id");  

                    console.log(product_id);
                    window.location.replace('item.php?item_id='+product_id);

                });
            
           

        });

</script>



