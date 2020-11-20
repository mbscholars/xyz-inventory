<template>
  <div>
  <b-card no-body md="4" class="overflow-hidden" style="" v-for="(product,index)  in products" :key="index">
    <b-row no-gutters>
      <b-col md="6">
        <b-card-img :src="config.url + '/' + product.src" alt="Image" class="rounded-0"></b-card-img>
      </b-col>
      <b-col md="6">
        <b-card-body :title="product.title">
          <b-card-text>
           {{product.price | naira}} | {{product.category}}
          </b-card-text>
          <b-button href="#" variant="primary">Buy</b-button>
          <b-button href="#" variant="default">Learn More</b-button>
        </b-card-body>
      </b-col>
    </b-row>
  </b-card>
</div>
</template>

<script>
export default {
    props:{
        products: {
            type: Object
        }
    },
    data(){
        return{

        }
        
    }
}
</script>

<style>

</style>