<template lang="">
<Link :href="href" className="flex items-center relative p-4 w-full bg-white rounded-lg overflow-hidden shadow hover:shadow-md">
    <div className="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-lg text-white" >
      <i :class="icon" />
    </div>

    <div className="ml-3">
      <p className="font-medium text-primary">{{title}}</p>
      <p className="text-sm text-gray-600">{{nbr}}</p>
    </div>
  </Link>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
import {defineProps} from 'vue';
// onMounted(()=>{
//     console.log(props.title,props.nbr);
// });
const props = defineProps(['title','nbr','icon','href']);
// const props = defineProps({
//     title:{
//         default:''
//     },
//     nbr:{
//         default:0
//     },
//     icon:{
//         default:""
//     },
//     href:{
//         default:"/admin"
//     }
// }
  
// );
</script>
<style lang="">
    
</style>