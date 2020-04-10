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
                <div v-for="(item, index) in cart" :key="index">
                    <div class="col-md-8 col-sm-6">
                        <div class="form-group">
                            <label :for="`item${index}`" class="col-sm-2 control-label">Product</label>
                            {{-- v-model="products[index].object" --}}
                            {{-- @change="updateAmount(index)" --}}
                            <select class="form-control1" v-model="cart[index].product" :id="`item${index}`">
                                <option value="NULL">
                                    <-- Please choose an option -->
                                </option>
                                {{-- disabled="shouldDisable(p_index)" --}}
                                <option v-for="(product, p_index) in products" :key="p_index" :value="product">
                                    @{{ product.name }} </option>
                            </select>


                            <p :id="'amount'+index">
                                @{{ cart[index].product ?  formattedAmount(cart[index].product.amount * cart[index].quantity) : ''  }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-2">
                        <div class="form-group">
                            <label :for="`q${index}`" class="col-sm-2 control-label">Quantity</label>
                            <input class="form-control1" :id="`q${index}`" type="number" v-model="cart[index].quantity"
                                :id="`qty${index}`">
                        </div>

                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div @click="addProduct()" class="d-flex justify-content-end"><button class="btn btn-success"
                        id="addProduct"><i class="fa fa-plus"> Add</i></button></div>
            </div>

        </div>

        Total: @{{ formattedAmount(getTotal) }}


    </div>

    <div class="mt-4 d-flex justify-content-center">
        <button @click="checkout()" class="btn btn-success" type="submit"> Checkout</button>
    </div>


    <div class="clearfix"></div>
</div>

@endsection

@section('extra-js')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>

<script>
    new Vue ({
            el: "#checkout",
            computed: {
                formattedAmount(x) {
                return (x) => x.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                },
                getValue() {
                    return (index) => parseFloat(this.products[index].object.amount * parseInt(this.products[index].quantity))
                },
                getTotal() {
                    let total = 0
                    this.cart.forEach(function(item) {
                        if (item.product && item.quantity) {
                            total +=item.product.amount * item.quantity
                        }
                    })
                    return total;
                }
                // shouldDisable() {
                //     return index => this.cart.find(function (item) {
                //             return item.product.id == 1 ? true: false
                // })
            // }
            },
            methods: {
                updateObject($event, index) {
                    this.products[index] = Object.assign({}, this.products[index], event.target.value)
                },
                updateAmount (index) {
                    console.log(this.cart[index].product.amount * this.cart[index].quantity)
                },
                checkout() {
                    if (this.name == '' || this.address == '' ||  this.phone == '') {
                        toastr.warning ("Please fill all Fields");
                        return;
                    }

                    let data = {
                        customer_address: this.address,
                        customer_name: this.name,
                        customer_phone: this.phone,
                        cart: this.cart
                    }
                    axios.post('', data).then (response => {
                        console.log(response)
                    }).catch(error => {
                        toastr.error ("OOPS SERVER ERROR")
                    })

                },
                addProduct() {
                    this.cart.push({
                        quantity: 1
                    })
                }
            },
            data: function () {
                return {
                    name: '',
                    phone:'',
                    address: '',
                    products: {!! json_encode($products) !!},
                    cart: [],
                    selectedProducts: [],
                    product: {
                        quantity:  1,
                    }
                }
            },
            mounted () {
                console.log("Yeah Babe");
                this.cart.push({
                    quantity: 1
                })
                // this.products.push(this.product)
            }
        })
</script>
@endsection
