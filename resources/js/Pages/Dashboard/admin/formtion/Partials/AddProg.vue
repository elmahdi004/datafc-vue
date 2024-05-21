<template lang="">
    <div className="p-4 ">
        <label
            className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Programme</label
        >
        <div className="relative flex h-10 w-full">
            <input
                change=""
                type="text"
                v-model="programme"
                className=" h-full w-full rounded-[7px] border border-primary bg-transparent px-3 py-2.5 pr-20 font-sans text-sm font-normal text-blue-primary/80 outline outline-0 transition-all  focus:border-1 focus:border-primary active:border-primary  focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
            />
            <div
                @click="addProgramme"
                className="!absolute right-1 top-1 z-10 select-none rounded bg-primary py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-primary/20 transition-all hover:shadow-lg hover:shadow-primary/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
            >
                Add
            </div>
        </div>
        <textarea
            :placeholder="placeholderText"
            rows="4"
            @change=""
            v-model="souProValue"
            className="block p-2.5 my-5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        ></textarea>
        <ul>
            <li
                v-for="(item, index) in data"
                :key="index"
                className="text-body-color ms-2 my-2 text-sm"
            >
                <span className="flex">
                    <span className="text-primary mr-2 rounded-full text-base">
                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 20 20"
                            className="fill-current"
                        >
                            <path
                                d="M10 19.625C4.6875 19.625 0.40625 15.3125 0.40625 10C0.40625 4.6875 4.6875 0.40625 10 0.40625C15.3125 0.40625 19.625 4.6875 19.625 10C19.625 15.3125 15.3125 19.625 10 19.625ZM10 1.5C5.3125 1.5 1.5 5.3125 1.5 10C1.5 14.6875 5.3125 18.5312 10 18.5312C14.6875 18.5312 18.5312 14.6875 18.5312 10C18.5312 5.3125 14.6875 1.5 10 1.5Z"
                                fill="rgb(35 138 145)"
                            />
                            <path
                                d="M8.9375 12.1875C8.71875 12.1875 8.53125 12.125 8.34375 11.9687L6.28125 9.96875C6.0625 9.75 6.0625 9.40625 6.28125 9.1875C6.5 8.96875 6.84375 8.96875 7.0625 9.1875L8.9375 11.0312L12.9375 7.15625C13.1563 6.9375 13.5 6.9375 13.7188 7.15625C13.9375 7.375 13.9375 7.71875 13.7188 7.9375L9.5625 12C9.34375 12.125 9.125 12.1875 8.9375 12.1875"
                                fill="rgb(35 138 145)"
                            />
                        </svg>
                    </span>
                    {{ item.Titre }}
                    <div className="ms-auto mr-2 flex gap-2">
                        <div
                            className="select-none rounded bg-primary py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-primary/20 transition-all hover:shadow-lg hover:shadow-primary/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                            @click="() => editLine(index)"
                        >
                            Edit
                        </div>
                        <div
                            className="select-none rounded bg-red-600 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-primary/20 transition-all hover:shadow-lg hover:shadow-primary/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                            @click="() => delLine(index)"
                        >
                            Del
                        </div>
                    </div>
                </span>
                <ul className="ps-5">
                    <li
                        v-for="(line, ind) in item?.sous_programmes"
                        :key="ind"
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
                                    d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z"
                                    fill="rgb(35 138 145)"
                                ></path>
                            </svg>
                        </span>
                        {{ item.sous_programmes[ind] }}
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>
<script setup>
import { ref } from "vue";
import {  useStore } from "vuex";
const data = ref([]);

const programme = ref("");
const souProValue = ref("");
const placeholderText = `Utilisez la touche Entrée pour séparer les éléments \n Example 1 \n Example 2`;
let lines = [];
const store = useStore();
const handleEnter = (event) => {
    let newText = souProValue.value.trim();
    lines = newText.split("\n");
};
const addProgramme = () => {
    handleEnter();
    const filtred_sous_programme = lines.filter((ele) => ele != "");
    const item = {
        Titre: programme.value,
        sous_programmes: filtred_sous_programme,
    };
    data.value.push(item);
    programme.value = "";
    souProValue.value = "";
    store.state.programme = data.value;
    console.log(store.state.programme);
};
</script>
<style lang=""></style>
