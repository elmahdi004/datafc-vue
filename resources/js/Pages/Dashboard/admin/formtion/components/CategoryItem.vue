<template lang="">
    <div
        class="shadow-sm my-3 p-3 bg-white text-xl border py-5 rounded-md mx-5"
    >
        <div class="flex justify-between">
            <div class="flex">
                <h3>{{ formation.CodeFormation }}</h3>
                <h3 class="mx-10">{{ formation.Titre }}</h3>
            </div>
            <div class="flex">
                <div
                    @click=""
                    className="text-white absolute right-28 bg-primary hover:bg-primary/70 focus:ring-4 focus:ring-cyan-200 me-4 font-medium rounded text-sm inline-flex items-center px-3 py-2 text-center"
                >
                    <i className="fas fa-pen-square"></i>
                </div>
                <button
                    @click="toggleOpen"
                    class="toggler bg-transparent border-0 mx-10"
                >
                    <i class="fa-solid fa-chevron-down text-md"></i>
                </button>
            </div>
        </div>
        <div
            class="grid grid-cols-3 sm:grid-cols-3 max-sm:grid-cols-1"
            v-if="open"
        >
            <FormationItem
                v-for="(item, index) in formation.formation"
                :key="index"
                :formation="item"
                @update-formations="updateFormationsHandle"
            />
        </div>
    </div>
    <Modal :show="show" />
</template>
<script setup>
import { ref, defineProps } from "vue";
import { Link } from "@inertiajs/vue3";
import FormationItem from "./FormationItem.vue";
import Modal from "@/components/Modal.vue";

const show = ref(false);
const open = ref(false);

const props = defineProps(["formation"]);

const toggleOpen = () => {
    open.value = !open.value;
};

const updateFormationsHandle = (id) => {
    props.formation.formation = props.formation.formation.filter((ele) => {
        return ele.id != id;
    });
};
</script>
<style lang=""></style>
