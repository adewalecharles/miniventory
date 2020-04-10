@extends('layouts.dashboard')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a> <i class="fa fa-angle-right"></i>Products</li>
</ol>
<div id="checkout">
    <div class="container">
        <div class="col-md-6 col-sm-4 agile-info-stat">
            @csrf
            <div class="form-group">
                <label for="customer_name" class="col-sm-2 control-label">Customer Name</label>
                <input class="form-control1" type="text" v-model="name" id="customer_name">
            </div>

            <div class="form-group">
                <label for="customer_phone" class="col-sm-2 control-label">Customer Phone</label>
                <input class="form-control1" type="tel" v-model="phone" id="customer_phone">
            </div>

            <div class="form-group">
                <label for="customer_address" class="col-sm-2 control-label">Customer Address</label>
                <input class="form-control1" type="text" v-model="address" name="customer_address"
                    id="customer_address">
            </div>

        </div>

        <div class="col-md-5 col-sm-4">
            <div class="row">
                <div v-for="(product, index) in products" :key="index">
                    <div class="col-md-8 col-sm-6">
                        <div class="form-group">
                            <label :for="`p${index}`" class="col-sm-2 control-label">Product</label>
                            {{-- v-model="products[index].object" --}}
                            <select class="form-control1" @change="updateObject($event, index)" :id="`p${index}`">
                                <option value="NULL">
                                    <-- Please choose an option -->
                                </option>
                                @foreach ($products as $product)
                                {{-- :disabled="shouldDisable({!! json_encode($product->id) !!})" --}}
                                <option value="{{$product}}">
                                    {{$product->name}}</option>
                                @endforeach
                            </select>

                            <p> @{{ products[index].object.amount * products[index].quantity }} </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-2">
                        <div class="form-group">
                            <label :for="`q${index}`" class="col-sm-2 control-label">Quantity</label>
                            <input class="form-control1" :id="`q${index}`" type="number"
                                v-model="products[index].quantity" :id="`qty${index}`">
                        </div>

                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div @click="addProduct()" class="d-flex justify-content-end"><button class="btn btn-success"
                        id="addProduct"><i class="fa fa-plus"> Add</i></button></div>
            </div>

        </div>


    </div>

    <div class="mt-4 d-flex justify-content-center">
        <button @click="checkout()" class="btn btn-success" type="submit"> Checkout</button>
    </div>


    <div class="clearfix"></div>
</div>

@endsection

@section('extra-js')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>
    new Vue ({
            el: "#checkout",
            computed: {
                getValue() {
                    return (index) => parseFloat(this.products[index].object.amount * parseInt(this.products[index].quantity))
                },
            //     shouldDisable() {
            //         return value => this.products.find(function (product) {
            //             return product.object.id == value ? true: false
            //     })
            // }
            },
            methods: {
                updateObject($event, index) {
                    this.products[index] = Object.assign({}, this.products[index], event.target.value)
                },
                checkout() {
                    console.log(this.name)
                    console.log(this.products);
                },
                addProduct() {
                    this.products.push(
                        {
                        quantity: 1,
                        object: {}
                    }
                    )
                }
            },
            data: function () {
                return {
                    name: '',
                    phone:'',
                    address: '',
                    products: [
                        {
                            quantity: '',
                            object: {}
                        }
                    ],
                    selectedProducts: [],
                    product: {
                        quantity:  1,
                    }
                }
            },
            mounted () {
                console.log("Yeah Babe");
                // this.products.push(this.product)
            }
        })
</script>
@endsection
