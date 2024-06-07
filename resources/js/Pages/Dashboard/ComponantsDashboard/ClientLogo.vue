<template lang="">
    <div class="container lg:px-20 mt-5">
        <div class="mx-auto bg-white rounded-2xl shadow-lg p-20 w-full">
            <div class="flex mb-4">
                <h1 class="font-bold text-primary uppercase text-5xl">
                    Nos Client
                </h1>
            </div>
            <div class="w-full px-4">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
                >
                    <div
                        v-for="(item, index) in nosClients"
                        :key="index"
                        :href="`/storage/${item.href}`"
                        className="mx-4 relative select-none bg-gray-100 flex border-transparent shadow-md border-2 hover:border-primary h-32 p-2 items-center justify-center   ease-in-out delay-150 duration-700 transition-opacity	 opacity-70  hover:opacity-100 overflow-hidden rounded-lg"
                    >
                        <button
                            @click="deletePhoto(item.id)"
                            type="button"
                            className="text-white absolute right-2 top-2  bg-red-600 opacity-50  hover:opacity-100 rounded-full text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        >
                            <svg
                                className="w-5 h-5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fillRule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clipRule="evenodd"
                                ></path>
                            </svg>
                        </button>
                        <img
                            :src="`/storage/${item.href}`"
                            :alt="item.Alt"
                            className="h-full "
                        />
                    </div>
                    <div
                        @click="openModal"
                        class="mx-4 flex border-gray-300 text-gray-300 hover:text-primary shadow-md border-2 hover:border-primary h-32 p-2 items-center justify-center overflow-hidden rounded-lg"
                    >
                        <i class="fa-solid fa-plus text-2xl"></i>
                    </div>
                    <Modal :show="action" maxWidth="max-w-lg">
                        <template #header>
                            <h3>Créer une nouvelle</h3>
                        </template>
                        <template #body>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <InputLabel
                                            value="Nom client"
                                            htmlFor="Alt"
                                        />
                                        <TextInput
                                            type="text"
                                            name="Alt"
                                            id="CodeFormation"
                                            v-model="form.name"
                                            class="w-full"
                                        />
                                        <InputError
                                            :message="form.errors.name"
                                            class="mt-2"
                                        />
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <InputLabel value="line" htmlFor="href">
                                        </InputLabel>
                                        <TextInput
                                            type="text"
                                            name="href"
                                            id="href"
                                            v-model="form.line"
                                            class="w-full"
                                        />
                                        <InputError
                                            :message="form.errors.line"
                                            class="mt-2"
                                        />
                                    </div>
                                </div>
                                <div class="w-full px-4">
                                    <div class="relative w-full mb-3">
                                        <div class="col-span-6 sm:col-span-4">
                                            <InputLabel
                                                htmlFor="photo"
                                                value="Photo"
                                            />
                                            <div
                                                class="text-center relative rounded-md shadow overflow-hidden w-36 sm:w-96 mx-auto"
                                            >
                                                <!-- <button onClick={deletePhoto} type="button" class="text-white absolute right-2 top-2  bg-red-600 opacity-50  hover:opacity-100 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="default-modal">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd"></path></svg>
                                                </button> -->
                                                <img
                                                    v-if="form.image"
                                                    :src="image_preview"
                                                    class="h-full w-full object-cover object-center"
                                                />
                                                <div
                                                    v-else
                                                    class="h-36 w-full flex items-center justify-center select-none bg-gray-300"
                                                >
                                                    <SecondaryButton
                                                        class="mt-2 mr-2"
                                                        type="button"
                                                        @click="
                                                            triggerFileInput
                                                        "
                                                    >
                                                        Sélectionnez une
                                                        nouvelle photo
                                                    </SecondaryButton>
                                                    <input
                                                        type="file"
                                                        ref="fileInput"
                                                        class="hidden"
                                                        @change="
                                                            handleFileChange
                                                        "
                                                        accept="image/*"
                                                        capture="camera"
                                                    />
                                                </div>
                                                <!-- </>} -->
                                            </div>

                                            <InputError
                                                :message="form.errors.image"
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template #footer>
                            <SecondaryButton class="m-1" @click="closeModal">
                                Annuler
                            </SecondaryButton>
                            <PrimaryButton class="m-1" @click="addFunction">
                                ajouter
                            </PrimaryButton>
                        </template>
                    </Modal>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import Modal from "@/Components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { onMounted, ref } from "vue";
import { useToast } from "vue-toastification";
import api from "@/axios";
const action = ref(false);
const openModal = () => {
    action.value = true;
};
const closeModal = () => {
    action.value = false;
};
const fileInput = ref(null);
const form = useForm({
    name: "",
    line: "",
    image: null,
});
const nosClients = ref([]);
const image_preview = ref();
const toast = useToast();
const triggerFileInput = () => {
    fileInput.value.click();
};
const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        image_preview.value = URL.createObjectURL(file);
        form.image = file;
    }
};
const addFunction = () => {
    form.post("/add-client-logo", {
        onSuccess: () => {
            toast.success("Has Been added");
        },
        onError: () => {
            toast.error("we have an error please try again");
        },
    });
    closeModal();
};
const deletePhoto = (id)=>{
    api.delete(`/nosclients/${id}`).then(()=>{
        toast.success('has been deleted');
    }).catch(()=>{
        toast.success('we have an error please try again');
    });
    nosClients.value = nosClients.value.filter(ele => ele.id != id);

}
onMounted(() => {
    api.get("/nosclients")
        .then(({ data }) => (nosClients.value = data))
        .catch((e) => console.log(e));
});
</script>
<style lang=""></style>
