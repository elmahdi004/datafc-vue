<template lang="">
<Modal :modalProps="modalProps">
    <template v-slot:default>
      <div class="px-6 py-4">
        <div class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ title }}</div>
        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">{{ content }}</div>
      </div>
    </template>
    <template v-slot:footer>
      <div class="px-6 py-4 dark:bg-primary text-right">{{ footer }}</div>
    </template>
  </Modal></template>
<script setup>
import Modal from "@/Components/Modal.vue";
import {defineProps} from 'vue';
const props = defineProps(['title','content','footer','modalProps']);
</script>
<style lang=""></style>
