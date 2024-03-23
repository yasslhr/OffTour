
<template>

  <div class="galerie" v-if="fetched" v-for="item in data" >


    <Galerie :lieu="item.nom" :nom="item.image"></Galerie>
    </div>


</template>

<script setup>
import {computed, onMounted, ref} from 'vue'
import Galerie from './Galerie.vue'
import axios from "axios";
import {useDefaultStore} from "../stores";

const store = useDefaultStore()
const UrlApi = computed({
  get () {
    return store.urlGalerie
  }
})
const baseUrl = ref(null)
const photos= ref( null)

const fetched = ref(false)

const data = ref({})
onMounted(()=> {
  axios.get(UrlApi.value).then ((response) =>{
    data.value = response.data['hydra:member']

    fetched.value = true
    //lien.value = data.value[props.index].image
  })
})

</script>
<style scoped>



li {
  list-style-type : none;
}

a {
  text-decoration: none;

  color: inherit;
}


* {
  box-sizing: border-box;
  margin: 0;
}

.image-container {
  display: inline-block;
}

.header {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding-top: 25px;
  padding-bottom: 50px;
  background-color: #0e0e2b;
  color: white;
  font-size: 17px;
}

.mid-header {
  display: flex;
  gap: 30px;
}

.right-header {
  display: flex;
  gap: 20px;
}
.main-content {
  display: flex;
  align-items: center;
  padding: 10%;
  gap: 30px;
}
.img {
  max-width: 600px;
}
.left-side {
  line-height: 30px;
}
.main {
  display: flex;
  justify-content: center;
  margin-top: 50px;
}
.hyper {
  width: 100%;
  max-width: 650px;
}
.image {
  width: 300px;
}
.galerie {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 40px;
}
.footer {
  background-color: #0e0e2b;
  color: white;
  display: flex;
  justify-content: space-around;
  padding: 80px 0px;
  font-size: 12px;
}

</style>