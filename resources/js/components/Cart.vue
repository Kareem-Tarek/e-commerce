<template>
    <div>
        <li class="nav-item">
            <a href="/home" class="btn btn-warning btn-sm">
                Cart {{ itemCount }}
            </a>
        </li>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                itemCount: '',
            }
        },
        mounted() {
            this.$root.$on('changeInCart' ,(item) => {
                this.itemCount = item;
            })
        },
        methods:{
            async getCardItemsOnPageLoad(){
                let respons = await axios.post('/cart');
                this.itemCount = respons.data.items
            }
        },
        created(){
            this.getCartItemsOnPageLoad();
        }
    }
</script>
