<template>
    <div
        :class="[
            'relative p-4 w-full rounded-lg overflow-hidden shadow hover:shadow-md',
            user.block ? 'bg-gray-200' : 'bg-white',
        ]"
    >
        <div class="flex items-center p-4 h-16">
            <div
                class="h-14 w-14 min-w-14 min-h-14 max-w-14 max-h-14 py-4 flex items-center justify-center text-primary rounded-full border-2 bg-[#e1fdff]"
            >{{ user.name.slice(0,2) }}</div>
            <div class="ml-4 flex-auto">
                <div class="font-medium">
                    {{ user.name }}
                    <span class="text-slate-500"
                        >({{ user.is_admin ? "Admin" : "Client" }})</span
                    >
                </div>
                <div class="mt-1 text-slate-500 text-sm">{{ user.email }}</div>
                <div class="mt-1 text-slate-500 text-sm">{{ user.tel }}</div>
            </div>
        </div>
        <div class="flex items-center justify-between w-full pt-4">
            <PrimaryButton @click="toggleBlock(1)" v-if="user.block == 0"
                >blocage</PrimaryButton
            >
            <SecondaryButton @click="toggleBlock(0)" v-else
                >Déblocage</SecondaryButton
            >
            <Toggle :block="user.block" :idu="user.id" :user="user" />
        </div>
    </div>
</template>
<script setup>
// import Toggle from '../components/Tog'
import api from "@/axios";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
const props = defineProps(["user"]);
const toggleBlock = (value) => {
    console.log("Done");
    api.post(`/user/${props.user.id}/block`, { block: value })
        .then(() => (props.user.block = value))
        .catch((e) => console.log(e));
};
</script>
<style lang=""></style>
