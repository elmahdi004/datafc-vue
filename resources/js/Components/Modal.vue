<template>
    <Teleport to="body">
        <div
            id="myModal"
            v-if="open"
            tabindex="-1"
            aria-hidden="true"
            class="bg-slate-500/80 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
        >
            <div
                :class="['p-4 w-full max-h-full',maxWidth]"
                style="
                    position: absolute;
                    top: 20px;
                    right: 50%;
                    transform: translateX(50%);
                "
            >
                <!-- Modal content -->
                <div :class="['bg-white rounded-lg shadow dark:bg-gray-700']">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600"
                    >
                        <slot name="header" />
                        <button
                            type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            @click="CloseModal"
                        >
                            <svg
                                class="w-3 h-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 14 14"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <slot name="body" />
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600"
                    >
                        <!-- <button
                type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              >
                I accept
              </button>
              <button
                type="button"
                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
              >
                Decline
              </button> -->
                        <slot name="footer" />
                    </div>
                </div>
            </div>
        </div>
    </Teleport>
</template>

<script setup>
import { computed, onMounted, onUnmounted, ref, watch } from "vue";

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: "w-100",
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(["close"]);
const open = ref(props.show);

// Sync open state with props.show
watch(
    () => props.show,
    (newVal) => {
        open.value = newVal;
        if (newVal) {
            document.body.style.overflow = "hidden";
        } else {
            document.body.style.overflow = null;
        }
    },
    { immediate: true } // Set this option to ensure the watcher runs immediately on component mount
);

watch(open, (newValue, oldValue) => {
    if (newValue === false) {
        console.log("False False !!!!!!!!!!!!!!!!!");
        emit("close");
    }
});

const closeOnEscape = (e) => {
    if (e.key === "Escape" && open.value) {
        CloseModal();
    }
};

onMounted(() => {
    document.addEventListener("keydown", closeOnEscape);
});

onUnmounted(() => {
    document.removeEventListener("keydown", closeOnEscape);
    document.body.style.overflow = null;
});

// const maxWidthClass = computed(() => {
//     return {
//         sm: "sm:max-w-sm",
//         md: "sm:max-w-md",
//         lg: "sm:max-w-lg",
//         xl: "sm:max-w-xl",
//         "2xl": "sm:max-w-2xl",
//     }[props.maxWidth];
// });

const CloseModal = () => {
    open.value = false;
};
</script>

<style>
/* Add your styles here */
</style>
