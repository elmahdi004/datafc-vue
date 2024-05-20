<template lang="">
    <AdminLayout title="utilisateurs">
        <div className="lg:pr-3 w-full flex justify-center items-center">
            <div
                className="mt-2 relative w-full sm:w-8/12 text-gray-600 rounded  flex justify-center items-center"
            >
                <TextInput
                    type="text"
                    :value="query || ''"
                    @change=""
                    placeholder="Search"
                    className="shadow w-full px-5 pe-[40px] py-3 text-sm focus:outline-none"
                />
                <i
                    className="fa-solid fa-magnifying-glass absolute right-0 top-0 mt-4 mr-4"
                ></i>
            </div>
        </div>
        <div
            className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-4 w-full"
        >
            <Card
                v-for="(user, index) in users"
                :user="user"
                :key="index"
            ></Card>
            <!-- {data?.data?.map((user, i) =>
                    <Card key={i} user={user} />
                )} -->
        </div>

        <!-- {loading?<></>:<></>}
            {data.last_page > 1 ? <RenderPaginationLinks /> : ""} -->
    </AdminLayout>
</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import Card from "./components/Card.vue";
const users = [
    {
        profile_photo_url: "",
        name: "elmahdi bellaziz",
        is_admin: false,
        email: "elmahdibellaziz@gmail.com",
        tel: "23456789",
    },
    {
        profile_photo_url: "",
        name: "elmahdi bellaziz",
        is_admin: false,
        email: "elmahdibellaziz@gmail.com",
        tel: "23456789",
    },
    {
        profile_photo_url: "",
        name: "elmahdi bellaziz",
        is_admin: false,
        email: "elmahdibellaziz@gmail.com",
        tel: "23456789",
    },
    {
        profile_photo_url: "",
        name: "elmahdi bellaziz",
        is_admin: false,
        email: "elmahdibellaziz@gmail.com",
        tel: "23456789",
    },
];
</script>
<style lang=""></style>
