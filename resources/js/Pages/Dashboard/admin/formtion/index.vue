<template lang="">
    <AdminLayout title="Toutes les formations" :renderTrigger="renderTrigger">
        <main className=" p-8 mx-auto ">
            <div className="py-6 ">
                <Link
                    href="/admin/Formtion/add"
                    className="relative rounded px-5 py-2.5 overflow-hidden group bg-primary  hover:bg-gradient-to-r hover:from-primary hover:to-primary/75 text-white hover:ring-2 hover:ring-offset-2 hover:ring-primary transition-all ease-out duration-300"
                >
                    <!-- <span className="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span> -->
                    <span className="relative">Ajouter Formation</span>
                </Link>
            </div>
        </main>
        <div v-if="formations.length > 0">
            <CategoryItem
                v-for="(formation, index) in formations"
                :key="index"
                :formation="formation"
            />
        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";
import CategoryItem from "./components/CategoryItem.vue";
import { onMounted, ref } from "vue";
import api from "@/axios";
import { useStore } from "vuex";
const formations = ref([]);
const renderTrigger = ref();
const store = useStore();
onMounted(async () => {
    // await api.get('/user').then(({data})=>console.log(data)).catch((e) => console.log(e));
    await store.dispatch("fetchUser");
    renderTrigger.value = store.state.auth;
    await api
        .get("/formations")
        .then(({ data }) => (formations.value = data))
        .catch((e) => console.log(e));
    console.log(formations.value);
});
</script>
<style lang=""></style>
