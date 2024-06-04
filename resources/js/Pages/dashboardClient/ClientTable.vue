<template lang="">
    <div class="shadow-xl border rounded-lg overflow-hidden ">
        <h1
            class="ms-2 p-5 text-3xl font-bold dark:text-white text-primary"
        >
            Mes Demandes
        </h1>
        <div class="">
            <table
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">Type</th>
                        <th scope="col" class="px-6 py-3">
                            entreprise / personne
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Categorie de Formation
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Code Formation
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Titre Formation
                        </th>
                        <th scope="col" class="px-6 py-3">Number Person</th>
                        <th scope="col" class="px-6 py-3">Durée</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody v-if="mesDemandes.length > 0">
                    <tr
                        v-for="(val, index) in mesDemandes"
                        :key="index"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{val.demandeable_type === "App\\Models\\PersMorale"
                            ? "Morale" : "Physique"}}
                        </th>
                        <td class="px-6 py-4">
                            {{val.demandeable_type === "App\\Models\\PersMorale"
                            ? val.demandeable.entreprise :
                            val.demandeable.prenompm}}
                        </td>
                        <td class="px-6 py-4">
                            {{val.formation.categorief.Titre}}
                        </td>
                        <td class="px-6 py-4">{{val.formation.Code}}</td>
                        <td class="px-6 py-4">{{val.formation.Titre}}</td>
                        <td class="px-6 py-4">{{val.nbrpers}}</td>
                        <td class="px-6 py-4">{{val.formation.Duree}}</td>
                        <td
                            :class="[
                                'px-6 py-4',
                                !val.status ? 'text-red-700' : 'text-primary',
                            ]"
                        >
                            {{val.status ? "validé" : "non validé"}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useStore } from "vuex";
import api from "@/axios";
const mesDemandes = ref([]);
const auth = ref(null);
const store = useStore();
onMounted(async () => {
    await store.dispatch("fetchUser");
    auth.value = store.state.auth;
    if (auth.value) {
        api.get(`/mesDemandes/${auth.value.id}`)
            .then(({ data }) => (mesDemandes.value = data))
            .catch((e) => console.log(e));
    }
});
</script>
<style lang=""></style>
