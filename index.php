
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <?php include 'src.php';   ?>

  
</head>


<body class="bg-light">

<?php include 'header.php'; ?>


<div class="d-flex">
    
   
<?php include 'search.php'; ?>
    <div class="content p-4 ">
        
   
        <div class="container">
            <div class="row" id="itemlist">
                

            </div>
            <div class="container text-center" id="pagination"> 
                <a href="#" class="btn btn-dark btn-lg btn-square">Previous</a>
                <a href="#" class="btn btn-dark btn-lg btn-square">1</a>
                <a href="#" class="btn btn-dark btn-lg btn-square">2</a>
                <a href="#" class="btn btn-dark btn-lg btn-square">3</a>
                <a href="#" class="btn btn-dark btn-lg btn-square">4</a>
                <a href="#" class="btn btn-dark btn-lg btn-square">5</a>
                <a href="#" class="btn btn-dark btn-lg btn-square">Next</a>
            </div>

        </div>
    </div>
</div>





</body>
</html>

<script>

        $(document).ready(function () {

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

            function load_category(){
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const category = urlParams.get('category');
                if(category){
                    return category;
                }else{
                    return 0;
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
                var category = load_category();
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
                    url:"php/pagination/pagination.php",
                    method:"POST",
                    dataType:"json",
                    data:{page:page,category:category,currency:currency},  
                    success:function(data){
                        console.log(data);
                        $('#itemlist').html(data.itemlist);
                        $('#pagination').html(data.pagination);
                       

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



