<template lang="">
    <AdminLayout title="utilisateurs">
        <div className="lg:pr-3 w-full flex justify-center items-center">
            <div
                className="mt-2 relative w-full sm:w-8/12 text-gray-600 rounded  flex justify-center items-center"
            >
                <input
                    class="w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                    v-model="filter"
                    @input="filterUsers"
                />
                <i
                    className="fa-solid fa-magnifying-glass absolute right-0 top-0 mt-4 mr-4"
                ></i>
            </div>
        </div>
        <div
            className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-10 w-full mx-4"
        >
            <Card
                v-for="(user, index) in users"
                :user="user"
                :key="index"
            ></Card>
        </div>

        <!-- {loading?<></>:<></>}
            {data.last_page > 1 ? <RenderPaginationLinks /> : ""} -->
    </AdminLayout>
</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import Card from "./components/Card.vue";
import { onMounted, ref } from "vue";
import api from "@/axios";
const users = ref([]);
const filter = ref("");
onMounted(() => {
    api.get("/users")
        .then(({ data }) => {
            users.value = data;
        })
        .catch((e) => console.log(e));
});
const filterUsers = () => {
    users.value = users.value.filter((ele) => ele.name.includes(filter.value));
    console.log(users.value);
};
</script>
<style lang=""></style>
