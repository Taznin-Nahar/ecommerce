@extends('admin.admin_master') 
@section('admin_main_content') 




<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Advanced Table</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="icon-bullhorn"></i> Product ID</th>
                            <th class="hidden-phone"><i class="icon-question-sign"></i>Product Name</th>
        
                            <th><i class=" icon-edit"></i> Status</th>
                            <th><i class=" icon-edit"></i> Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                //         echo "<pre>";
                // print_r($all_category_info);
                // exit();
                        ?>

                        @foreach($all_product_info as $vProduct)
                        <tr>
                            <td><a href="#">{{$vProduct->product_id}}</a></td>
                            <td class="hidden-phone">{{$vProduct->product_name}}</td>
                            <td>
                                <?php
                                    if($vProduct->status==1) {
                                ?>
                                 
                                <span class="label label-success label-mini">Publish</span>

                                <?php
                                    }
                                    else{
                                 ?>
                                <span class="label label-important label-mini">Unpublish</span>
                               
                               <?php } ?>

                            </td>
                            <td>
                                <?php
                                    if ($vProduct->status==1) {
                                   
                                ?>

                                    <a style="color:#ffffff" class="btn btn-success" href="{{URL::to('/unpublished-product/'.$vProduct->product_id)}}"><i class="icon-thumbs-down"></i></a>
                                <?php
                                    }
                                    else{

                                ?>
                                <a class="btn btn-primary" href="{{URL::to('/published-product/'.$vProduct->product_id)}}"><i class="icon-thumbs-up"></i></a>
                                <?php
                                    }
                                ?>

                                <a class="btn btn-primary" href="{{URL::to('/edit-product/'.$vProduct->product_id)}}"><i class="icon-pencil "></i></a>
                                <a class="btn btn-danger" href="{{URL::to('/delete-product/'.$vProduct->product_id)}}" onclick="return checkDelete()"><i class="icon-trash "></i></a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END BASIC PORTLET-->
    </div>
</div>

@endsection