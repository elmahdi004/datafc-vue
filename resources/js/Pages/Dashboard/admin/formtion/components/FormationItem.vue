<template lang="">
    <div className="pl-8 pr-8 pb-5 text-grey-darkest mt-8">
        <div
            className="relative h-full bg-green-50 ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1  group  cursor-pointer   rounded-lg shadow-xl p-5 overflow-hidden"
        >
            <img
                src="/images/hero-shape-2.svg"
                alt=""
                className="absolute top-0 right-0"
            />
            <div
                className="relative  transition-all duration-300 pt-[6.25rem] pb-14"
            >
                <h3
                    className="lg:text-4xl text-3xl sm:text-3xl  font-extrabold text-primary/80 leading-snug mb-2"
                >
                    {{ formation.Titre }}
                </h3>
            </div>
            <div
                className="absolute  transition-all duration-300 bottom-6 right-6 text-right"
            >
                <!-- <Link href="/info-formation" className="  inline-flex w-11 h-11 justify-center items-center bg-primary hover:bg-primary/100 text-pink-50 hover:text-white rounded-full transition duration-150" ><span className="sr-only">Read more</span> <span className="font-bold -mt-px"><svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 207.161 167.124">
                                                    <path id="Path_1" data-name="Path 1" d="M143.25,100.15H17.67C7.67,100.12.56,93.84,0,84.82-.57,74.45,6.7,67,17.67,67H142.9c-1.43-1.67-2.26-2.79-3.23-3.77C128.38,51.9,117,40.64,105.78,29.28,101,24.47,98.85,18.81,100.92,12c1.92-6.32,6.25-10.07,12.55-11.55a15.17,15.17,0,0,1,14.72,4.19c26.33,26.19,52.54,52.5,78.94,78.92l-25.86,25.88q-26,26-52,51.92c-4.8,4.79-10.41,7.08-17.22,4.92a16.13,16.13,0,0,1-11.74-13.55c-1-6.07,1.47-11,5.71-15.24q16.46-16.4,32.87-32.85C140.09,103.49,141.2,102.29,143.25,100.15Z" transform="translate(0.031 0.027)" fill="#fff" />
                                                </svg></span></Link>  -->
                <button
                    type="button"
                    @click="openModal"
                    className=" inline-flex w-11 h-11 justify-center items-center bg-primary hover:bg-primary/100 text-pink-50 hover:text-white rounded-full transition duration-150"
                >
                    <i className="fa-solid fa-eye"></i>
                </button>
                <Modal :show="open" maxWidth="max-w-6xl">
                    <template v-slot:body>
                        <div
                            id="accordionExample"
                            className="container mx-auto mb-6"
                        >
                            <div className="  ">
                                <div className=" w-full lg:max-w-full mt-2   ">
                                    <div
                                        className=" lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                                    ></div>
                                    <div
                                        className=" relative  border-primary border-2 rounded-lg  overflow-hidden  bg-green-50   p-4 flex flex-col justify-between leading-normal"
                                    >
                                        <img
                                            src="/images/hero-shape-2.svg"
                                            alt=""
                                            className="absolute top-0 right-0 "
                                        />
                                        <div className="mb-8">
                                            <p
                                                className="text-sm text-gray-600 flex items-center"
                                            >
                                                {{ formationProgram.Code }}
                                            </p>
                                            <div
                                                className="text-primary font-bold text-xl mb-2"
                                            >
                                                {{ formationProgram.Titre }}
                                            </div>
                                            <p
                                                className="text-primary/80 text-base"
                                            >
                                                {{ formationProgram.Objectifs }}
                                            </p>
                                        </div>
                                        <div className="flex items-center">
                                            <img
                                                className="w-10 h-10 rounded-full mr-4"
                                                src="/images/days-counter-svgrepo-com.svg"
                                                alt="Avatar of Jonathan Reinink"
                                            />
                                            <div className="text-sm">
                                                <p
                                                    className="text-gray-900 leading-none"
                                                >
                                                    Durée
                                                </p>
                                                <p className="text-gray-600">
                                                    {{ formationProgram.Duree }}
                                                </p>
                                            </div>
                                        </div>

                                        <div className=" py-4">
                                            <div
                                                className="border-primary bg-white/50  overflow-hidden mb-14 shadow rounded-lg border"
                                            >
                                                <div
                                                    className="border-t border-gray-200 px-4 py-5   sm:p-0"
                                                >
                                                    <dl
                                                        className="sm:divide-y sm:divide-gray-200"
                                                    >
                                                        <div
                                                            className="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                                                        >
                                                            <dt
                                                                className="text-sm font-medium text-gray-500"
                                                            >
                                                                code de
                                                                formation
                                                            </dt>
                                                            <dd
                                                                className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                                            >
                                                                {{
                                                                    formationProgram.Code
                                                                }}
                                                            </dd>
                                                        </div>
                                                        <div
                                                            className="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                                                        >
                                                            <dt
                                                                className="text-sm font-medium text-gray-500"
                                                            >
                                                                intitulé de
                                                                formation
                                                            </dt>
                                                            <dd
                                                                className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                                            >
                                                                {{
                                                                    formationProgram.Titre
                                                                }}
                                                            </dd>
                                                        </div>
                                                        <div
                                                            className="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                                                        >
                                                            <dt
                                                                className="text-sm font-medium text-gray-500"
                                                            >
                                                                Objictifs
                                                            </dt>
                                                            <dd
                                                                className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                                            >
                                                                {{
                                                                    formationProgram.Objectifs
                                                                }}
                                                            </dd>
                                                        </div>
                                                        <div
                                                            className="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                                                        >
                                                            <dt
                                                                className="text-sm font-medium text-gray-500"
                                                            >
                                                                Popilarité cible
                                                            </dt>
                                                            <dd
                                                                className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                                            >
                                                                {{
                                                                    formationProgram.Population_cible
                                                                }}
                                                            </dd>
                                                        </div>
                                                        <div
                                                            className="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                                                        >
                                                            <dt
                                                                className="text-sm font-medium text-gray-500"
                                                            >
                                                                Programme
                                                            </dt>
                                                            <dd
                                                                className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                                            >
                                                                <ul
                                                                    className="list-disc"
                                                                >
                                                                    <ul>
                                                                        <li
                                                                            v-for="(
                                                                                item,
                                                                                index
                                                                            ) in formationProgram.programme_formation"
                                                                            :key="
                                                                                index
                                                                            "
                                                                            key="{index}"
                                                                            className="text-body-color ms-2 my-2 text-sm"
                                                                        >
                                                                            <span
                                                                                className="flex"
                                                                            >
                                                                                <span
                                                                                    className="text-primary mr-2 rounded-full text-base"
                                                                                >
                                                                                    <svg
                                                                                        width="20"
                                                                                        height="20"
                                                                                        viewBox="0 0 20 20"
                                                                                        className="fill-current"
                                                                                    >
                                                                                        <path
                                                                                            d="M10 19.625C4.6875 19.625 0.40625 15.3125 0.40625 10C0.40625 4.6875 4.6875 0.40625 10 0.40625C15.3125 0.40625 19.625 4.6875 19.625 10C19.625 15.3125 15.3125 19.625 10 19.625ZM10 1.5C5.3125 1.5 1.5 5.3125 1.5 10C1.5 14.6875 5.3125 18.5312 10 18.5312C14.6875 18.5312 18.5312 14.6875 18.5312 10C18.5312 5.3125 14.6875 1.5 10 1.5Z"
                                                                                            fill="rgba(35,138,145,1)"
                                                                                        />
                                                                                        <path
                                                                                            d="M8.9375 12.1875C8.71875 12.1875 8.53125 12.125 8.34375 11.9687L6.28125 9.96875C6.0625 9.75 6.0625 9.40625 6.28125 9.1875C6.5 8.96875 6.84375 8.96875 7.0625 9.1875L8.9375 11.0312L12.9375 7.15625C13.1563 6.9375 13.5 6.9375 13.7188 7.15625C13.9375 7.375 13.9375 7.71875 13.7188 7.9375L9.5625 12C9.34375 12.125 9.125 12.1875 8.9375 12.1875"
                                                                                            fill="rgba(35,138,145,1)"
                                                                                        />
                                                                                    </svg>
                                                                                </span>
                                                                                {{
                                                                                    item.Titre
                                                                                }}
                                                                            </span>
                                                                            <ul
                                                                                className="ps-5"
                                                                            >
                                                                                <li
                                                                                    v-for="(
                                                                                        line,
                                                                                        x
                                                                                    ) in item.sous_programmes"
                                                                                    :key="
                                                                                        x
                                                                                    "
                                                                                    className="text-body-color mb-1 flex text-base"
                                                                                >
                                                                                    <span
                                                                                        className="text-primary mr-2 flex items-center rounded-full text-base"
                                                                                    >
                                                                                        <svg
                                                                                            width="20"
                                                                                            height="8"
                                                                                            viewBox="0 0 20 8"
                                                                                            className="fill-current"
                                                                                        >
                                                                                            <path
                                                                                                fill="rgba(35,138,145,1)"
                                                                                                d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z"
                                                                                            ></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                    {{
                                                                                        line
                                                                                    }}
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </ul>
                                                            </dd>
                                                        </div>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </Modal>
            </div>
            <div
                className="absolute  transition-all duration-300 bottom-6 right-20 text-right"
            >
                <Link
                    :href="`/admin/formtion/edit/${formation.id}`"
                    className="  inline-flex w-11 h-11 justify-center items-center bg-primary hover:bg-primary/100 text-pink-50 hover:text-white rounded-full transition duration-150"
                >
                    <i className="fa-solid fa-pen-to-square text-center"></i>
                </Link>
            </div>

            <button
                @click="deleteFormation(formation.id)"
                className=" absolute bottom-6  inline-flex w-11 h-11 justify-center items-center bg-red-400 hover:bg-red-700 text-pink-50 hover:text-white rounded-full transition duration-150"
            >
                <i className="fa-solid fa-trash-can"></i>
            </button>
        </div>
    </div>
</template>
<script setup>
import api from "@/axios";
import Modal from "@/Components/Modal.vue";
import { Link } from "@inertiajs/vue3";
import { defineProps, onMounted, defineEmits, ref } from "vue";

const open = ref(false);
const formationProgram = ref(null);
const props = defineProps(["formation"]);
const emit = defineEmits("update-formations");

onMounted(async () => {
    await api
        .get(`/formation/${props.formation.id}/program`)
        .then(({ data }) => (formationProgram.value = data))
        .catch((e) => console.log(e));
    // console.log(formationProgram.value);
});
const deleteFormation = async (id) => {
    await api.delete(`/formation/${id}`).catch((e) => console.log(e));
    emit("update-formations", id);
};

const openModal = () => {
    open.value = true;
};
</script>
<style lang=""></style>
