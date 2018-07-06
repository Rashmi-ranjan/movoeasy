@extends('layouts.home-layout')
@section('home-title')
MovoEasy | Services
@endsection
@section('home-content')
<div class="banner1">
</div>
<div class="about-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="index.html">Home</a><i>></i></li>
            <li>Order List</li>
        </ul>
    </div>
</div>
<!-- services section -->
    <div class="services" id="services">
        <div class="heading">
            <h2>Order List</h2>
        </div>
        <div class="container">
            <div class="servicegrids">
                @if(isset($orderListCnt) && $orderListCnt != 0)
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
                        @foreach($orderListArr as $orders)
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
<!-- //services section -->



@endsection

