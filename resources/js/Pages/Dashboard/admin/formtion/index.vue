<template lang="">



 <AdminLayout title="Toutes les formations">
            <main className=" p-8 mx-auto ">
                <div className='py-6 '>
                    <Link href="/admin/Formtion/add" className="relative rounded px-5 py-2.5 overflow-hidden group bg-primary  hover:bg-gradient-to-r hover:from-primary hover:to-primary/75 text-white hover:ring-2 hover:ring-offset-2 hover:ring-primary transition-all ease-out duration-300">
                        <!-- <span className="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span> -->
                        <span className="relative">Ajouter Formation</span>
                    </Link>
                </div>


            </main>
        </AdminLayout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>
<style lang="">
    
</style>