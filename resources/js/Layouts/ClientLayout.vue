<template>
    <div>
      <Head :title="title" />
      <Header/>
      <slot></slot>
      <Footer />
      <ToastContainer
        style="z-index: 20000000;"
        position="bottom-right"
        autoClose="5000"
        hideProgressBar="false"
        newestOnTop="false"
        closeOnClick
        rtl="false"
        pauseOnFocusLoss
        draggable
        pauseOnHover
        theme="colored"
      />
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted ,defineProps} from 'vue';
  import Footer from './../Pages/footer/Footer.vue';
  import Header from './../Pages/header/Header.vue';
//   import { Head } from '@inertiajs/inertia-vue3';
import {Head} from '@inertiajs/vue3'
//   import AOS from 'aos';
//   import { ToastContainer } from 'vue-toastification';
//   import 'vue-toastification/dist/index.css';
//   import 'aos/dist/aos.css';
  
    const props = defineProps({
      title: String,
    },) 

    //   ToastContainer,
    // setup(props) {
    //   onMounted(() => {
    //     AOS.init();
    //     AOS.refresh();
    //   });
    //   return {
    //     title: props.title,
    //   };
    // },
  
  </script>
  
  <style scoped>
  /* Add your scoped styles here */
  </style>
  