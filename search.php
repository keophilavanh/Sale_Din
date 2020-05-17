<?php



   
    

    $menu = '
                <div class="sidebar sidebar-dark bg-dark toggled">
                    <div class="col-sm-12 text-light">
                        <br/>
                        <h4 id="search_text"> ຄຳຄົ້ນຫາ </h4>
                        <textarea class="form-control" rows="3" id="keyword" ></textarea> <br/>
                        <h4 id="price_min_text"> ລາຄາເລີ້ມຕົ້ນ </h4>
                        <input type="number" class="form-control" id="price_min"  /> <br/>
                        <h4 id="price_max_text"> ລາຄາເລີ້ມສິ້ນສຸດ </h4>
                        <input type="text" class="form-control" id="price_max"  /> <br/>
                        <button id="btn_search" type="button" class="btn btn-primary  btn-lg form-control"> <i class="fas fa-search fa-lg"></i> ຄົ້ນຫາ </button> <br/><br/>
                    </div>
                </div>';
    //    echo $menu;





        $modle='<div id="add_data_Modal" class="modal fade ">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header ">
                    
                    <h4 id="insert_information_titel" class="modal-title">ເພີ້ມລາຍການ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              
                    <div class="modal-body ">


                                <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <h4 id="search_text"> ຄຳຄົ້ນຫາ </h4>
                                            <textarea class="form-control" rows="3" id="keyword" ></textarea>
                                        </div>
                                </div>
                                <div class="form-group row">
                                        
                                        <div class="col-sm-6">
                                            <h4 id="price_min_text"> ລາຄາເລີ້ມຕົ້ນ </h4>
                                            <input type="number" class="form-control" id="price_min"  />
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 id="price_max_text"> ລາຄາເລີ້ມສິ້ນສຸດ </h4>
                                            <input type="number" class="form-control" id="price_max"  />
                                        </div>
                                       
                                </div>
                                <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <button id="btn_search" type="button" class="btn btn-primary  btn-lg form-control"> <i class="fas fa-search fa-lg"></i> ຄົ້ນຫາ </button>
                                        </div>
                                </div>

                            
                            
                    
                    </div>
                    
             
                </div>
                </div>
                </div>';
    
       echo $modle;
    

?>