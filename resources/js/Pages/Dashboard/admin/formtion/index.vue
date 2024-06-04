<template lang="">
    <AdminLayout title="Toutes les formations" :renderTrigger="renderTrigger">
        <main class=" p-8 mx-auto flex justify-between items-center">
            <div class="py-6 ">
                <Link
                    href="/admin/Formtion/add"
                    class="relative rounded px-5 py-2.5 overflow-hidden group bg-primary  hover:bg-gradient-to-r hover:from-primary hover:to-primary/75 text-white hover:ring-2 hover:ring-offset-2 hover:ring-primary transition-all ease-out duration-300"
                >
                    <!-- <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span> -->
                    <span class="relative">Ajouter Formation</span>
                </Link>
                
            </div>
            <div class="py-6 ">
                <button
                    @click="openModal"
                    class="relative rounded px-5 py-2 overflow-hidden group bg-primary  hover:bg-gradient-to-r hover:from-primary hover:to-primary/75 text-white hover:ring-2 hover:ring-offset-2 hover:ring-primary transition-all ease-out duration-300"
                >
                    <!-- <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span> -->
                    <span class="relative">Ajouter catégorie</span>
            </button>
                
            </div>
            <Modal :show="action" maxWidth="max-w-2xl">
                <template #header>
                    <h2>Créer une nouvelle</h2>
                </template>
                <template #body>
                    <div class="flex flex-wrap " >
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <InputLabel value="Code de référence" htmlFor="CodeFormation" />
                                <TextInput type="text" name="CodeFormation" id="CodeFormation" v-model="categorie.code"  class="w-full" />
                                <InputError :message="categorie.errors.code" class="mt-2" />
                            </div>
                        </div>
                        <div class="w-full lg:w-8/12 px-4">
                            <div class="relative w-full mb-3">
                                <InputLabel value="Titre" htmlFor="Titre">
                                </InputLabel>
                                <TextInput type="text" name="Titre" id="Titre" v-model="categorie.title"  class="w-full" />
                                <InputError :message="categorie.errors.title" class="mt-2" />
                            </div>
                        </div>
                        <div class="w-full  px-4">
                            <div class="relative w-full mb-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <input
                                    
                                        type="file"
                                        accept="image/*"
                                        class="hidden"
                                        ref={photoRef}
                                        onChange={updatePhotoPreview}
                                    />
                                    <InputLabel htmlFor="photo" value="Photo" />
                                    <div class="text-center relative rounded-md shadow overflow-hidden w-36 sm:w-96 mx-auto">
                                         <!-- {photoPreview ? (
                                            <>
                                                <button onClick={deletePhoto} type="button" class="text-white absolute right-2 top-2  bg-red-600 opacity-50  hover:opacity-100 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="default-modal">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd"></path></svg>
                                                </button>
                                                <img src={photoPreview} class="h-full w-full object-cover object-center " /> -->

                                            <div class="h-36 w-full flex items-center justify-center select-none bg-gray-300 " >
                                                <SecondaryButton class="mt-2 mr-2" type="button">
                                                    Sélectionnez une nouvelle photo
                                                </SecondaryButton>
                                            </div>

                                    </div>
                                    <InputError :message="categorie.errors.image" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template #footer>
                    <SecondaryButton
                        class="m-1"
                        @click="closeModal"
                    >
                        Annuler
                    </SecondaryButton>
                    <PrimaryButton
                        class="m-1"
                        @click="addFunction"
                    >
                        ajouter
                    </PrimaryButton>
                </template>
            </Modal>
        </main>
        <div v-if="formations.length > 0">
            <CategoryItem
                v-for="(formation, index) in formations"
                :key="index"
                :formation="formation"
            />
        </div>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import CategoryItem from "./components/CategoryItem.vue";
import { onMounted, ref } from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import api from "@/axios";
import { useStore } from "vuex";
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
const formations = ref([]);
const renderTrigger = ref();
const action = ref(false);
const store = useStore();
const categorie = useForm({
    code : '',
    title : '',
    image : ''
});
onMounted(async () => {
    // await api.get('/user').then(({data})=>console.log(data)).catch((e) => console.log(e));
    await store.dispatch("fetchUser");
    renderTrigger.value = store.state.auth;
    await api
        .get("/formations")
        .then(({ data }) => (formations.value = data))
        .catch((e) => console.log(e));
    console.log(formations.value);
});

const closeModal = ()=>{
    action.value = false;
}
const openModal = ()=>{
    action.value = true;

}
const addFunction = async ()=>{
    await categorie.post('/category/store');
    closeModal();
}
</script>
<style lang=""></style>
