<template>
    <AdminLayout title="Ajouter une Formation">
        <div class="container mx-auto">
            <div class="w-full p-4">
                <div class="relative w-full mb-3">
                    <InputLabel value="Category" />
                    <select
                        id="countries_multiple"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="formationCatId"
                    >
                        <!-- <option selected>Choose a category</option> -->
                        <option
                            v-for="(item, index) in categories"
                            :key="index"
                            :value="item.id"
                        >
                            {{ item.CodeFormation }} : {{ item.Titre }}
                        </option>
                    </select>
                    <InputError :message="dataFormation.errors.formationCatId" class="mt-2" />
                </div>
            </div>
            <hr />
            <div class="flex">
                <div class="w-full lg:w-3/12 px-4">
                    <div class="relative w-full mb-3">
                        <InputLabel value="Code" />
                        <TextInput
                            type="text"
                            name="Code"
                            v-model="dataFormation.Code"
                            @change="
                                updateDataFormation('Code', $event.target.value)
                            "
                            :class="[
                                'w-full',
                                errors?.Code
                                    ? 'border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500'
                                    : '',
                            ]"
                        />
                        <InputError :message="dataFormation.errors.Code" class="mt-2" />
                    </div>
                </div>
                <div class="w-full lg:w-9/12 px-4">
                    <div class="relative w-full mb-3">
                        <InputLabel value="Titre" />
                        <TextInput
                            type="text"
                            name="Titre"
                            v-model="dataFormation.Titre"
                            @change="
                                updateDataFormation(
                                    'Titre',
                                    $event.target.value
                                )
                            "
                            :class="[
                                'w-full',
                                errors?.Titre
                                    ? 'border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500'
                                    : '',
                            ]"
                        />
                        <InputError :message="dataFormation.errors.Titre" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="w-full lg:w-9/12 px-4">
                    <div class="relative w-full mb-3">
                        <InputLabel value="Population Cible" />
                        <TextInput
                            type="text"
                            name="Population_cible"
                            v-model="dataFormation.Population_cible "
                            @change="
                                updateDataFormation(
                                    'Population_cible',
                                    $event.target.value
                                )
                            "
                            :class="[
                                'w-full',
                                errors?.Population_cible
                                    ? 'border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500'
                                    : '',
                            ]"
                        />
                        <InputError
                            :message="dataFormation.errors.Population_cible"
                            class="mt-2"
                        />
                    </div>
                </div>
                <div class="w-full lg:w-3/12 px-4">
                    <div class="relative w-full mb-3">
                        <InputLabel value="Durée" />
                        <TextInput
                            type="text"
                            name="Duree"
                            v-model="dataFormation.Duree"
                            @change="
                                updateDataFormation(
                                    'Duree',
                                    $event.target.value
                                )
                            "
                            :class="[
                                'w-full',
                                errors?.Duree
                                    ? 'border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500'
                                    : '',
                            ]"
                        />
                        <InputError :message="dataFormation.errors.Duree" class="mt-2" />
                    </div>
                </div>
            </div>
            <!-- End population and durée -->
            <!-- textarea for Objectif -->
            <div class="px-4 py-6">
                <InputLabel value="Objectifs" />
                <textarea
                    name="Objectifs"
                    v-model="dataFormation.Objectifs"
                    @change="
                        updateDataFormation('Objectifs', $event.target.value)
                    "
                    rows="4"
                    :class="[
                        'block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-primary/80 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                        errors?.Objectifs
                            ? 'border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500'
                            : '',
                    ]"
                    placeholder="Write your thoughts here..."
                ></textarea>
                <InputError :message="dataFormation.errors.Objectifs" class="mt-2" />
            </div>
            <!-- End textarea for Objectif -->
            <div>
                <hr />
                <AddProg />
            </div>
            <PrimaryButton @click="addNewFormation">Ajouter</PrimaryButton>
        </div>
    </AdminLayout>
</template>

<script setup>
import { onMounted, ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TextInput from "@/components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import AddProg from "./Partials/AddProg.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import api from "@/axios.js";
import { useStore } from "vuex";
import { useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
// import AddTypeFormation from "@/Components/AddTypeFormation.vue";
const store = useStore();
const toast = useToast();
const formationCatId = ref(null);
const dataFormation = useForm({
    Code: "",
    Titre: "",
    Population_cible: "",
    Duree: "",
    Objectifs: "",
    formationCatId: formationCatId.value,
    programme_formations: store.state.programme,
});
const categories = ref([]);
const errors = ref({});

onMounted(() => {
    api.get("/categories").then(({ data }) => (categories.value = data));
});

function setFormationcatId(id) {
    formationCatId.value = id;
}

function updateDataFormation(key, value) {
    dataFormation.value[key] = value;
}

function addNewFormation() {
    // console.log(store.state.programmes);
    // const formation = {
    // Code: dataFormation.Code,
    // Titre: dataFormation.Titre,
    // Population_cible: dataFormation.Population_cible,
    // Duree: dataFormation.Duree,
    // Objectifs: dataFormation.Objectifs,
    // formationCatId: formationCatId.value,
    // programme_formations: store.state.programme,
    // }
    dataFormation.formationCatId = formationCatId.value;
    dataFormation.programme_formations = store.state.programme;
    dataFormation.post('/formation/create',{
        onSuccess : ()=>{
            toast.success('has been added');
            store.state.programme = [];
        },
        onError : ()=>{
            toast.error('we have an error please try again');
        },
    })
    // api.post("/formation/create", formation)
    //     .then((e) => console.log("Done"))
    //     .catch((e) => console.log(e));
}
</script>

<style lang="">
/* Add your styles here */
</style>
