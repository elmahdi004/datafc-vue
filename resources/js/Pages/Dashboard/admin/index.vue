<template lang="">
<AdminLayout title="Dashboard">
    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-4 w-full">
 <Card v-for="(item,index) in datast" :key="index" :nbr="item.nbr" :icon="item.icon" :title="item.title" :href="item.href"/>
    </div>
    <div className='bg-white mt-10'>
      <TableDashboard/>
    </div>
    <div className='bg-white mt-10'>
      <TableDashboardFormation/>
    </div>
</AdminLayout>
</template>
<script setup>
import TableDashboard from '../ComponantsDashboard/TableDashboard.vue'
import TableDashboardFormation from '../ComponantsDashboard/TableDashboardFormation.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Card from '@/Layouts/Card.vue';
  const datast = [
    { title: "Demandes", nbr:0, icon: "fa-solid fa-hand" ,href:"/admin/Demande" },
    { title: "Formtions", nbr: 0, icon: "fa-solid fa-graduation-cap",href:"/admin/Formtion" },
    { title: "Utilisateurs", nbr: 0, icon: "fa-solid fa-users" ,href:"/admin/users"},
    { title: "Messages", nbr:0, icon: "fa-regular fa-envelope",href:"/admin/message" },
  ]
</script>
<style lang="">
    
</style>