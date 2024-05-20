<template lang="">
<div className="shadow-xl border rounded-lg overflow-hidden ">
            <h1 className="ms-2 p-5 text-3xl font-bold dark:text-white text-primary">Mes Demandes</h1>
            <div className="">
                <table className="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" className="px-6 py-3">
                                Type
                            </th>
                            <th scope="col" className="px-6 py-3">
                            entreprise / personne
                            </th>
                            <th scope="col" className="px-6 py-3">
                            Categorie de Formation
                            </th>
                            <th scope="col" className="px-6 py-3">
                            Code Formation
                            </th>
                            <th scope="col" className="px-6 py-3">
                            Titre Formation
                            </th>
                            <th scope="col" className="px-6 py-3">
                            Number Person
                            </th>
                            <th scope="col" className="px-6 py-3">
                            Durée
                            </th>
                            <th scope="col" className="px-6 py-3">
                               Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in data" :key="index" className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {val?.demandeable_type === "App\\Models\\PersMorale" ? "Morale" : "Physique"}
                            </th>
                            <td className="px-6 py-4">
                            {val?.demandeable_type === "App\\Models\\PersMorale" ? val?.demandeable?.entreprise : val?.demandeable?.prenompm}
                            </td>
                            <td className="px-6 py-4">
                            {val?.formation?.categorief?.Titre}
                            </td>
                            <td className="px-6 py-4">
                                {val?.formation?.Code}
                            </td>
                            <td className="px-6 py-4">
                                {val?.formation?.Titre}
                            </td>
                            <td className="px-6 py-4">
                               {val?.nbrpers}
                            </td>
                            <td className="px-6 py-4">
                               {val?.formation.Duree}
                            </td>
                            <td :className="['px-6 py-4' , !item?.status ? 'text-red-700' : 'text-primary']">
                                            {val?.status ? "validé" : "non validé"}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
</template>
<script setup>
const data = [{status:true}];
</script>
<style lang="">
    
</style>