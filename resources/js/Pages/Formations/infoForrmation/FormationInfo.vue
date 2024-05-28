<template lang="">
      <ClientLayout>
      <div class=' pb-14'>
        <HeroFormationInfo v-if="categoryWithFormations != null" :title="categoryWithFormations.Titre"/>
        <div class=' mt-20 ' v-if="categoryWithFormations != null">
          <AccordionBasicExample v-for="(formation, index) in categoryWithFormations.formation" :formation="formation" :title="categoryWithFormations.Titre" :key="index"/>
        </div>
      </div>
      </ClientLayout>
</template>
<script setup>
import { defineProps, onMounted, ref } from 'vue';
import ClientLayout from '@/Layouts/ClientLayout.vue';
import HeroFormationInfo from '@/Pages/Hero/HeroFormationInfo.vue';
import api from '@/axios';
import AccordionBasicExample from '@/Pages/Dashboard/admin/components/AccordionBasicExample.vue';
const props = defineProps(['idf']);
const categoryWithFormations = ref();
onMounted(()=>{
    api.get(`/categorie/${props.idf}`).then(({data})=>{
        categoryWithFormations.value = data;
        console.log(categoryWithFormations.value);
    })
})
</script>
<style lang=""></style>
