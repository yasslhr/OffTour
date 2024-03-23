<template>

  <div class="galerie">

      <a href="#" class="point" :title="lieu">
        <img class="image" :src="`/uploads/images/lieu/` + nom" :alt="lieu"></a>

  </div>

</template>


<script setup>

import {computed, onMounted, ref} from 'vue'
import {useDefaultStore} from "../stores";

const props = defineProps({
  lieu: {
    type: String,
    required: true
  },
  nom : String,
})
const data = ref(null)
const lien = ref('')

console.log(props.nom)

const store = useDefaultStore()

const UrlApi = computed({
  get () {
    return store.urlGalerie
  }
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
.galerie {
  display: flex;
}

.galerie-image {
  margin-right: 10px;
}

</style>