<script setup>
    import { ref } from 'vue';
    const email = ref("");
    const props = defineProps(
        {
            autok:{type:Array,required:true}
        }
    );
    const selectedAuto = ref("");
    const kezdete = ref("");
    const vege = ref("");

    const emits = defineEmits(['mentes']);

    const mentes = () => {
        if (email.value && selectedAuto.value && kezdete.value && vege.value) {
            emits('mentes',{'email':email.value,'kezdet':kezdete.value,'vege':vege.value,'id':selectedAuto.value});
            email.value = "";
            selectedAuto.value = "";
            kezdete.value = "";
            vege.value = "";
        } else {
            alert("Minden adatot ki kell tölteni!");
        }
    }
</script>

<template>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" v-model="email" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-3">
        <select name="" id="" class="form-select" v-model="selectedAuto">
            <option v-for="(auto,index) in autok" :value="auto.id" >
                {{ auto.modell }}
            </option>
        </select>
        <label for="floatingInput">Autó</label>
    </div>
    
    <div class="form-floating mb-3">
        <input type="date" class="form-control" v-model="kezdete" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Kezdet</label>
    </div>
    <div class="form-floating mb-3">
        <input type="date" class="form-control" v-model="vege" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Vége</label>
    </div>
    <div class="mb-3">
        <button class="btn btn-success" @click="mentes">Mentés</button>
    </div>
</template>

<style scoped>
</style>
