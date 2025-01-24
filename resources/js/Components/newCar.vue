<script setup>
    import { ref } from 'vue';
    const modell = ref("");
    const kaucio = ref(0);
    const kilometerdij = ref(0);
    const napidij = ref(0);
    const leiras = ref("");    
    const emits = defineEmits(['mentes']);

    const mentes = () => {
        if (modell.value && leiras.value && napidij.value > 0 && kilometerdij.value > 0 && kaucio.value > 0) {
            emits('mentes',{'modell':modell.value,'kaucio':kaucio.value,'kilometerdij':kilometerdij.value,'napidij':napidij.value,'leiras':leiras.value});
            modell.value = "";
            kaucio.value = 0;
            kilometerdij.value = 0;
            napidij.value = 0;
            leiras.value = "";
        } else {
            alert("Minden adatot ki kell tölteni!");
        }
    }
</script>

<template>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" v-model="modell" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Modell</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" v-model="kaucio" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Kaució</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" v-model="kilometerdij" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Kilométerdíj</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" v-model="napidij" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Napidíj</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" v-model="leiras" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Leírás</label>
    </div>
    <div class="mb-3">
        <button class="btn btn-success" @click="mentes">Mentés</button>
    </div>
</template>

<style scoped>
</style>
