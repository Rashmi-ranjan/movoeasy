@extends('layouts.admin-layout')
@section('home-title')
MovoEasy | User List
@endsection
@section('admin-content')
<?php 
use App\Http\Controllers\Controller;
?>
<div class="page-title">
    <div class="title_left">
        <h3>User Setting</h3>
    </div>
</div>
<div class="clearfix"></div>	
<div class="x_panel">
    <div class="x_title">
        <h2>{{ $layoutArr['pageTitle'] }}</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </li>
        </ul>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div role="alert" class="alert alert-success alert-dismissible fade in" style="display:none;" id="sucMsgDiv">
            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            <span class="sucmsgdiv"></span>
        </div>
        <div role="alert" class="alert alert-danger alert-dismissible fade in" style="display:none;" id="failMsgDiv">
            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            <span class="failmsgdiv"></span>
        </div>
        
        <div id= "listingTable">
            @if(isset($layoutArr['orderListCnt']) && $layoutArr['orderListCnt'] != 0)
                <table class="table table-border">
                    <thead>
                        <tr>
                            <td>Sl</td>
                            <td>Date</td>
                            <td>Name</td>
                            <td>Phone Number</td>
                            <td>From</td>
                            <td>To</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $slNo =1; ?>
                        @foreach($layoutArr['orderListArr'] as $orders)
                        <?php 
                            
                            if($orders->status == "A"){
                                $status = "New Arrive";
                            }else if($orders->status == "O"){
                                $status = "Assigned";
                            }
                        ?>
                        <tr>
                            <td>{{ $slNo }}</td>
                            <td>{{ date("d-m-Y",strtotime($orders->mover_date)) }}</td>
                            <td>{{ $orders->name }}</td>
                            <td>{{ $orders->mobile }}</td>
                            <td>{{ $orders->trans_from }}</td>
                            <td>{{ $orders->trans_to }}</td>
                            <td>
                                @if($orders->status == "A")
                                    <span class='label label-success'>{{ $status }}<span>
                                @elseif($orders->status == "O")
                                    <span class='label label-danger'>{{ $status }}<span>
                                @endif
                            </td>
                        </tr>
                        <?php 
                            $slNo++;
                        ?>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info margine10top">
                    <i class="fa fa-info"></i>					
                    No data found.
                </div>
            @endif
        </div>
    </div>
</div>

@endsection