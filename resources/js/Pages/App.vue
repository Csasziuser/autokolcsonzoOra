<script setup>
  import { onMounted, ref } from 'vue';
  import NewCar from '@/Components/newCar.vue';
  import newRent from '@/Components/newRent.vue';
  import showRents from '@/Components/showRents.vue';
  import axios from 'axios';
  
  const autok = ref([]);
  const kolcsonzesek = ref([]);

  const reciveData = async (data) => {
    try {
      const response = await axios.post('/api/car/save',{
        'modell':data.modell,
        'kaucio':data.kaucio,
        'kilometerdij':data.kilometerdij,
        'napidij':data.napidij,
        'leiras':data.leiras
      });
      getCar();
    } catch (error) {
      console.log(error);
    }
  }
  const getCar = async () => {
    try {
      const response = await axios.get('/api/car/index');
      autok.value = response.data;
    } catch (error) {
      console.log(error);
    }
  }
  const getRents = async () => {
    try {
      const response = await axios.get('/api/rent/index');
      kolcsonzesek.value = response.data;
    } catch (error) {
      console.log(error);
    }
  }
  const reciveDataFromRents = async (data) => {
    try {
      const response = await axios.post('/api/rent/save',{
        'car_id':data.id,
        'email':data.email,
        'kezdet':data.kezdet,
        'vege':data.vege,
      });
      console.log(response);
    } catch (error) {
      console.log(error);
    }
  }
  const megjelenit = ref(false);
  getCar();
  getRents();
</script>

<template>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <button class="btn btn-info" @click="megjelenit = !megjelenit">Autó hozzáadása</button>
        <NewCar v-if="megjelenit"
          @mentes="reciveData"
        />
      </div>
      <div class="col-6">
        <newRent
          @mentes="reciveDataFromRents"
          :autok="autok"
        />
      </div>
    </div>
    <div class="row">
      <showRents
        :kolcsonzesek="kolcsonzesek"
      />
    </div>
  </div>
</template>

<style scoped>
</style>
