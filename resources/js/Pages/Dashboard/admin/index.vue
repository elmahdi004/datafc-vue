<template lang="">
    <AdminLayout title="Dashboard">
        <div
            className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-4 w-full"
        >
            <Card
                v-for="(item, index) in datast"
                :key="index"
                :nbr="item.nbr"
                :icon="item.icon"
                :title="item.title"
                :href="item.href"
            />
        </div>
        <div className="bg-white mt-10">
            <TableDashboard  :latsetDemandes="latsetDemandes"/>
        </div>
        <div className="bg-white mt-10">
            <TableDashboardFormation :latsetMessages="latsetMessages" />
        </div>
    </AdminLayout>
</template>
<script setup>
import TableDashboard from "../ComponantsDashboard/TableDashboard.vue";
import TableDashboardFormation from "../ComponantsDashboard/TableDashboardFormation.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Card from "@/Layouts/Card.vue";
import { defineProps } from "vue";
const props = defineProps(["demandesCount","formationsCount","usersCount","messagesCount","latsetDemandes","latsetMessages"]);
const datast = [
    {
        title: "Demandes",
        nbr: props.demandesCount,
        icon: "fa-solid fa-hand",
        href: "/admin/Demande",
    },
    {
        title: "Formtions",
        nbr: props.formationsCount,
        icon: "fa-solid fa-graduation-cap",
        href: "/admin/Formtion",
    },
    {
        title: "Utilisateurs",
        nbr: props.usersCount,
        icon: "fa-solid fa-users",
        href: "/admin/users",
    },
    {
        title: "Messages",
        nbr: props.messagesCount,
        icon: "fa-regular fa-envelope",
        href: "/admin/message",
    },
];
</script>
<style lang=""></style>
