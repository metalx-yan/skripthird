@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Product</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('transaksis.update', $get[0]['customer']) }}" method="post">
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Customer</label>
                        <input type="text" name="customer" value="{{ $get[0]['customer'] }}" class="form-control {{ $errors->has('customer') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('customer', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <br>
                {{-- <div class="row">
                    <div class="col-md-3">
                        <label for="">Nama Produk</label>
                        <select name="product" id="" class="form-control">
                            @foreach (App\Product::all() as $prod)
                                <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('product', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Kuantitas</label>
                        <input type="text" name="kuantitas" class="form-control {{ $errors->has('kuantitas') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('kuantitas', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Harga</label>
                        <input type="number" name="harga" class="form-control {{ $errors->has('harga') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('harga', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Order</label>
                        <input type="number" name="order" class="form-control {{ $errors->has('order') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('order', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                  
                </div> --}}
                
                <table class="table table-bordered" id="dynamicTable">  
                    <tr>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($get as $jos)
                    <tr>  
                        <td><select name="addmore[{{ $jos->id*100 }}][product]" id="ganti_{{ $jos->id*100 }}" class="form-control"><option value="">Select Product</option>@foreach (App\Product::all() as $prod)<option value="{{$prod->id }}" {{ $jos->product == $prod->id ? 'selected' : '' }}>{{ $prod->name }}</option>@endforeach</select></td>
                        <td><input readonly type="text" id="qty_{{ $jos->id*100 }}" name="addmore[{{ $jos->id*100 }}][kuantitas]" value="{{ $jos->kuantitas }}" placeholder="Enter your Qty" class="form-control" /></td>  
                        <td><input readonly type="text" id="harga_{{ $jos->id*100 }}" name="addmore[{{ $jos->id*100 }}][harga]"  value="{{ $jos->harga }}"  placeholder="Enter your Harga" class="form-control" /></td>  
                        <td><input type="number" id="order_{{ $jos->id*100 }}" name="addmore[{{ $jos->id*100 }}][order]" placeholder="Enter your Order"  value="{{ $jos->order }}"  class="form-control" /></td>  
                        <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>  
                    </tr>      
                    @endforeach
                    <tr>  
                        <td><select name="addmore[0][product]" id="ganti_0" class="form-control"><option value="">Select Product</option>@foreach (App\Product::all() as $prod)<option value="{{$prod->id }}">{{ $prod->name }}</option>@endforeach</select></td>
                        <td><input readonly type="text" id="qty_0" name="addmore[0][kuantitas]" placeholder="Enter your Qty" class="form-control" /></td>  
                        <td><input readonly type="text" id="harga_0" name="addmore[0][harga]" placeholder="Enter your Harga" class="form-control" /></td>  
                        <td><input type="number" id="order_0" name="addmore[0][order]" placeholder="Enter your Order" class="form-control" /></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table> 
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('products.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><select name="addmore['+i+'][product]" id="ganti_'+i+'" class="form-control"><option value="">Select Product</option>@foreach (App\Product::all() as $prod)<option value="{{$prod->id }}">{{ $prod->name }}</option>@endforeach</select></td><td><input readonly type="text" id="qty_'+i+'" name="addmore['+i+'][kuantitas]" placeholder="Enter your Qty" class="form-control" /></td><td><input readonly type="text" id="harga_'+i+'" name="addmore['+i+'][harga]" placeholder="Enter your Harga" class="form-control" /></td><td><input type="number" name="addmore['+i+'][order]" id="order_'+i+'" placeholder="Enter your Order" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        $('#ganti_'+i+'').on('change', function (e) {
            var val = e.target.value
            // $.post('{{ route("searching_product") }}',val,function(data){ 
            // console.log(data);
            //     // $('.posisi').html(data);
            // });
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        /* the route pointing to the post function */
                        url: '{{ route("searching_product") }}',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN, id:val},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) { 
                            // $(".writeinfo").append(data.msg); 
                            $('#qty_'+i+'').val(data.kuantitas)
                            $('#harga_'+i+'').val(data.harga)

                            $('#order_'+i+'').keyup(function(e){
                                if(parseInt($('#order_'+i+'').val()) > parseInt(data.kuantitas)) {
                                    alert('Order lebih banyak dari pada Qty')
                                } else {
                                    
                                }
                            });
                        }
                    }); 
        });
        $('#order_'+i+'').keyup(function(e){
            // console.log(e.target.value)
            if ($('#qty_'+i+'').val() == '') {
                alert('Pilih Product Terlebih Dahulu')
            } 
        });
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
    $('#ganti_0').on('change', function (e) {
            var val = e.target.value
            // $.post('{{ route("searching_product") }}',val,function(data){ 
            // console.log(data);
            //     // $('.posisi').html(data);
            // });
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        /* the route pointing to the post function */
                        url: '{{ route("searching_product") }}',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN, id:val},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) { 
                            // $(".writeinfo").append(data.msg); 
                            console.log(data)
                            $('#qty_0').val(data.kuantitas)
                            $('#harga_0').val(data.harga)

                            $('#order_0').keyup(function(e){
                                // console.log(parseInt($('#order_0').val()) >= parseInt(data.kuantitas))
                                if(parseInt($('#order_0').val()) >= parseInt(data.kuantitas)) {
                                    alert('Order lebih banyak dari pada Qty')
                                }else {

                                }
                                
                            });
                        }
                    }); 
        });


        $('#order_0').keyup(function(e){
            if ($('#qty_0').val() == '') {
                alert('Pilih Product Terlebih Dahulu')
            } 
        });
</script>

@endsection

