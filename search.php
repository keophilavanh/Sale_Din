<?php



   
    

    $menu = '
                <div class="sidebar sidebar-dark bg-dark toggled">
                    <ul class="list-unstyled">
                
                    
                        <li ><a href="#" >   <h4 id="search_text"> ຄຳຄົ້ນຫາ </h4>
                                <textarea class="form-control" rows="3" id="keyword" ></textarea> <br/>
                            </a>
                        </li>
                        <li>
                            <a href="#sm_examples" data-toggle="collapse" >
                                <h4 id="price_all_text" > ຂອບເຂດລາຄາ </h4>  <span class="badge badge-success"></span>
                            </a>
                            <ul id="sm_examples" class="list-unstyled collapse">
                                <li>
                                    <div class=" col-sm-12  text-light">
                                        <div class="row  p-3">
                                                <input type="number" class="form-control col-sm-6" id="price_min"  />
                                                <input type="text" class="form-control col-sm-6" id="price_max"  />
                                        </div>  
                                    </div>
                                </li>
                                
                                
                            
                            </ul>
                        </li>

                        <li>
                            <a href="#price_to" data-toggle="collapse" >
                                <h4 id="price_to_m_text" > ລາຄາຕໍ່ແມັດ </h4>  <span class="badge badge-success"></span>
                            </a>
                            <ul id="price_to" class="list-unstyled collapse">
                                <li>
                                    <div class=" col-sm-12  text-light">
                                       
                                               
                                            <input type="number" class="form-control" id="price_to_m"  />
                                    </div>
                                </li>
                                
                                
                            
                            </ul>
                        </li>
                        <li>
                            <a href="#sm_local" data-toggle="collapse" >
                                <h4 id="localtion_text" > ພື້ນທີ </h4> 
                                <div type="button" class="btn btn-primary btn-sm d-none" id="sect_provin">ແຂວງນະຄອນຫລວງ <span class="badge">X</span></div>
                                <div type="button" class="btn btn-primary btn-sm d-none" id="seclt_city">ເມືອງສີສັດຕະນາກ <span class="badge">X</span></div>
                            </a>
                            <ul id="sm_local" class="list-unstyled collapse">
                                <li>
                                    <div id="list_provint">
                                       
                                    </div>
                                </li>
                                
                                
                            
                            </ul>
                        </li>

                            <div class="col-sm-12 text-light">
                                <br/>
                                <button id="btn_search" data-provin="" data-city=""  type="button" class="btn btn-primary  btn-lg form-control"> <i class="fas fa-search fa-lg"></i> ຄົ້ນຫາ </button> <br/><br/>
                            </div>
                        <li >
                        </li>
                        
                       
                    
                    </ul>
                 
                   <!-- <div class="col-sm-12 text-light">
                        <br/>
                        <button id="btn_search" data-provin="" data-city=""  type="button" class="btn btn-primary  btn-lg form-control"> <i class="fas fa-search fa-lg"></i> ຄົ້ນຫາ </button> <br/><br/>
                    </div> -->
                </div>';
        echo $menu;





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
    
    //   echo $modle;
    

?>