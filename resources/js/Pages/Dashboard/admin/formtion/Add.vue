<template>
    <AdminLayout title="Ajouter une Formation">
        <div class="container mx-auto">
            <div class="w-full p-4">
                    <div class="relative w-full mb-3">
                        <InputLabel value="Category" />
                        <TextInput
                            type="text"
                            name="Titre"
                            :value="dataFormation?.Titre || ''"
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
                        <InputError :message="errors.Titre" class="mt-2" />
                    </div>            
            </div>
            <hr />
            <div class="flex ">
                <div class="w-full lg:w-3/12 px-4">
                    <div class="relative w-full mb-3">
                        <InputLabel value="Code" />
                        <TextInput
                            type="text"
                            name="Code"
                            :value="dataFormation?.Code || ''"
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
                        <InputError :message="errors.Code" class="mt-2" />
                    </div>
                </div>
                <div class="w-full lg:w-9/12 px-4">
                    <div class="relative w-full mb-3">
                        <InputLabel value="Titre" />
                        <TextInput
                            type="text"
                            name="Titre"
                            :value="dataFormation?.Titre || ''"
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
                        <InputError :message="errors.Titre" class="mt-2" />
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
                            :value="dataFormation?.Population_cible || ''"
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
                            :message="errors.Population_cible"
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
                            :value="dataFormation?.Duree || ''"
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
                        <InputError :message="errors.Duree" class="mt-2" />
                    </div>
                </div>
            </div>
            <!-- End population and durée -->
            <!-- textarea for Objectif -->
            <div class="px-4 py-6">
                <InputLabel value="Objectifs" />
                <textarea
                    name="Objectifs"
                    :value="dataFormation?.Objectifs || ''"
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
                <InputError :message="errors.Objectifs" class="mt-2" />
            </div>
            <!-- End textarea for Objectif -->
            <div>
                <hr />
                <!-- <Addprog /> -->
            </div>
            <PrimaryButton @click="addNewFormation">Ajouter</PrimaryButton>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TextInput from "@/components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
// import AddTypeFormation from "@/Components/AddTypeFormation.vue";

const dataFormation = ref({
    Code: "",
    Titre: "",
    Population_cible: "",
    Duree: "",
    Objectifs: "",
});
const errors = ref({});
const formationCatId = ref(null);

function setFormationcatId(id) {
    formationCatId.value = id;
}

function updateDataFormation(key, value) {
    dataFormation.value[key] = value;
}

function addNewFormation() {
    // Logic for adding new formation
}
</script>

<style lang="">
/* Add your styles here */
</style>
