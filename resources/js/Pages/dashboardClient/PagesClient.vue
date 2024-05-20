<template lang="">
    <div>
        <ClientLayout title="Mes Demandess">
            <div className='mt-32 container mx-auto' >
                <ClientTable/>
            </div>
        </ClientLayout>
    </div>
</template>
<script setup>
import ClientLayout from "@/Layouts/ClientLayout.vue";
import ClientTable from './ClientTable.vue';
</script>
<style lang="">
    
</style>