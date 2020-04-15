@extends('backend.layouts.master')

@section('content')

    <h1>Inventory Summary By UPC</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover col-md-10" style="background-color: #fff;">
           <!-- <thead>
                <tr>
                    <th>ID.</th> <th>Upc</th><th>Name</th><th>Type Id</th>
                </tr>
            </thead> -->
            <tbody>
            <tr>
                <td class="col-md-3"><h5>UPC </h5></td> <td class="col-md-5"> {{ $wine->upc }} </td>
            </tr>


            <tr>
                <td class="col-md-3"><h5>Name</h5></td> <td class="col-md"> {{ $wine->name }} </td>

            </tr>


            <tr>
                <td class="col-md-3"><h5>Wine Type</h5></td> <td class="col-md-5"> {{ $wine_type->wine_type }} {{-- $wine->type_id --}} </td>
            </tr>

            <tr>
                <td class="col-md-3"><h5>Vintage</h5></td> <td class="col-md"> {{ $wine->vintage }} </td>

            </tr>


            <tr>
                <td class="col-md-3"><h5>Regular Cost</h5></td> <td class="col-md"> {{ $wine->cost }} </td>

            </tr>

            <tr>
                <td class="col-md-3"><h5>Regular Selling Price</h5></td> <td class="col-md"> {{ $wine->regular_sell_price }} </td>

            </tr>

                   @if ($inventory_locations)
                       <tr>
                           <td class="col-md-3"><h5>Location:</h5></td>
                           <td class="col-md-5">
                               <ul style="background-color:#ecf0f5">
                                   <?php $total = 0; ?>
                                       @foreach ($inventory_locations as $location)
                                           <li>{{ $location['location'] }} : {{ $location['quantity'] }}</li>
                                           <?php
                                            $total = $total + $location['quantity'];
                                           ?>
                                       @endforeach
                               </ul>
                           </td>
                       </tr>

                       <tr>

                           <td class="col-md-3"><h5>Current Inventory</h5></td> <td class="col-md-5">  {{ $total }} </td>

                       </tr>
                   @endif


            <tr>
                <td class="col-md-3"> <button class="btn btn-success">EDIT</button> &nbsp; &nbsp; <button class="btn btn-success">INVENTORY</button></td>


            </tr>

            </tbody>    
        </table>
    </div>

@endsection