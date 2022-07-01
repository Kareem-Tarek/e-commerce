<template>
    <div>
         <!-- <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li> -->

        <i class="fa fa-shopping-cart btn"
            v-on:click.prevent="addProductToCart()">

        </i>
    </div>
</template>

<script>
    export default {
        data(){
            return{

            }
        },
        props:['productId','userId'],
        methods:{
            async addProductToCart(){

                // checking if user logged in,
                if(this.userId == 0){
                    this.$toastr.e('You Need To Login, To Add This Product To Cart');
                    return;
                }

                // if user logged in then add item to cart.

                let response = await axios.post('/cart', {
                    'product_id': this.productId
                });
                console.log(response.data);
                this.$root.$emit('changeInCart', response.data.items)
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
