<template lang="">
    <AdminLayout title="info">
        <div className="flex justify-center items-center ">
            <div className="container mx-auto  lg:px-20">
                <div
                    className="w-full bg-white p-8 my-4 md:px-12 lg:w-9/12 lg:pl-20 lg:pr-40 mr-auto rounded-2xl shadow-lg"
                >
                    <div className="flex">
                        <h1
                            className="font-bold text-primary uppercase text-5xl"
                        >
                            Information
                        </h1>
                    </div>
                    <div className="grid grid-cols-1 gap-4 mt-5">
                        <label
                            className="block font-medium text-sm text-primary/80 dark:text-gray-300"
                            >E-mail</label
                        >
                        <TextInput
                            className="w-full"
                            name="email"
                            v-model="settings[0].value"
                            @change=""
                            type="text"
                            placeholder="Email*"
                        />

                        <label
                            className="block font-medium text-sm text-primary/80 dark:text-gray-300"
                            >Tel</label
                        >
                        <TextInput
                            className="w-full"
                            name="tel"
                            v-model="settings[1].value"
                            @change=""
                            type="text"
                            placeholder="Tel*"
                        />

                        <label
                            className="block font-medium text-sm text-primary/80 dark:text-gray-300"
                            >Fix</label
                        >
                        <TextInput
                            className="w-full"
                            name="fix"
                            v-model="settings[2].value"
                            @change=""
                            type="text"
                            placeholder="Fix*"
                        />

                        <label
                            className="block font-medium text-sm text-primary/80 dark:text-gray-300"
                            >Adresse</label
                        >
                        <TextInput
                            className="w-full"
                            name="adresse"
                            v-model="settings[3].value"
                            @change=""
                            type="text"
                            placeholder="Adresse*"
                        />

                        <label
                            className="block font-medium text-sm text-primary/80 dark:text-gray-300"
                            >Ville</label
                        >
                        <TextInput
                            className="w-full"
                            name="ville"
                            v-model="settings[4].value"
                            @change=""
                            type="text"
                            placeholder="Ville*"
                        />
                        <label
                            className="block font-medium text-sm text-primary/80 dark:text-gray-300"
                            >Lien linkedin</label
                        >
                        <TextInput
                            className="w-full"
                            name="link_linkedin"
                            v-model="settings[5].value"
                            @change=""
                            type="text"
                            placeholder="Lien linkedin ..."
                        />
                        <label
                            className="block font-medium text-sm text-primary/80 dark:text-gray-300"
                            >Lien Facebook</label
                        >
                        <TextInput
                            className="w-full"
                            name="link_facebook"
                            v-model="settings[6].value"
                            @change=""
                            type="text"
                            placeholder="Lien Facebook ..."
                        />
                        <label
                            className="block font-medium text-sm text-primary/80 dark:text-gray-300"
                            >Lien instagram</label
                        >
                        <TextInput
                            className="w-full"
                            name="link_instagram"
                            v-model="settings[7].value"
                            @change=""
                            type="text"
                            placeholder="Lien Instagram ..."
                        />
                        <label
                            className="block font-medium text-sm text-primary/80 dark:text-gray-300"
                            >Google map</label
                        >
                        <TextInput
                            className="w-full"
                            name="google_map"
                            v-model="settings[8].value"
                            @change=""
                            type="text"
                            placeholder="Google Map*"
                        />
                    </div>

                    <div className="my-2 w-1/2 lg:w-1/4">
                        <PrimaryButton @click="saveSettings">
                            Enregistrer
                        </PrimaryButton>
                    </div>
                </div>
                <div
                    className="w-full lg:-mt-96 lg:w-2/6  ml-auto  rounded-2xl overflow-hidden shadow-md"
                >
                    <iframe
                        style="{monStyle}"
                        src="{data.google_map}"
                        width="600"
                        height="450"
                        frameBorder="0"
                        allowFullScreen=""
                        aria-hidden="false"
                        tabIndex="0"
                    ></iframe>
                </div>
            </div>
        </div>
        <Clientlogo />
    </AdminLayout>
</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import PrimaryButton from "@/components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { onMounted, ref } from "vue";
import api from "@/axios.js";
const settings = ref([
    {
        key: "email",
        value: "",
    },
    {
        key: "tel",
        value: "",
    },
    {
        key: "fix",
        value: "",
    },
    {
        key: "adresse",
        value: "",
    },
    {
        key: "ville",
        value: "",
    },
    {
        key: "linkedin",
        value: "",
    },
    {
        key: "facebook",
        value: "",
    },
    {
        key: "instagram",
        value: "",
    },
    {
        key: "maps",
        value: "",
    },
]);

onMounted(async () => {
    await api.get("/info").then(({ data }) => {
        const ele = [
            {
                key: "email",
                value: data[0].value,
            },
            {
                key: "tel",
                value: data[1].value,
            },
            {
                key: "fix",
                value: data[2].value,
            },
            {
                key: "adresse",
                value: data[3].value,
            },
            {
                key: "ville",
                value: data[4].value,
            },
            {
                key: "linkedin",
                value: data[5].value,
            },
            {
                key: "facebook",
                value: data[6].value,
            },
            {
                key: "instagram",
                value: data[7].value,
            },
            {
                key: "maps",
                value: data[8].value,
            },
        ];
        settings.value = ele;
        console.log(settings.value);
    });
});
const saveSettings = () => {
    api.post("/info", { settings: settings.value })
        .then(({ data }) => console.log(data))
        .catch((error) => console.log(error));
};
</script>
<style lang=""></style>
