<template lang="">
    <AdminLayout title="Message">
        <main
            class="flex  w-full shadow rounded"
            style="height: calc(100vh - 5rem)"
        >
            <section
            style="width: 20rem"
                class="w-2/12 flex flex-col   bg-gray-50 h-full overflow-y-auto "
            >
                <label class="px-3 my-2">
                    <input
                        :value="query || ''"
                        @change=""
                        class="rounded-lg p-2 bg-white border border-primary shadow transition duration-200 focus:outline-none focus:ring-2 w-full"
                        placeholder="Search..."
                    />
                </label>
                <div class="flex flex-col  h-full overflow-y-auto ">
                    <ul class="" v-if="messages.length > 0">
                        <ClinetBox
                            v-for="(item, index) in messages"
                            :key="index"
                            :message="item"
                        />
                    </ul>
                </div>
            </section>
            <section
            style="width: calc(100vw - 20rem)"
                class=" relative h-full border-l  overflow-hidden  "
            >
                 <!-- {Object.keys(msg).length ? <> -->
                        <div v-if="messages.length > 0" class="flex justify-between items-center  bg-white shadow  py-1 px-5 mb-1" style="width: 100% !important;">
                            <div class="flex space-x-4 items-center select-none">
                                <div class="w-10 h-10 rounded-full bg-gray-300  flex items-center justify-center text-lg text-black shadow">
                                    {{messages[0].full_name[0]}}
                                </div>
                                <div class="px-4 flex flex-col">
                                    <h3 class="font-semibold text-lg">{{messages[0].full_name}}</h3>
                                    <p class="text-light text-gray-400">{{messages[0].email}}</p>
                                </div>
                            </div>
                        </div>
                        <section class='p-4 overflow-y-auto relative items-center block ' style="height: calc(100vh - 10rem)">
                            <!-- loading ? <div class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                                <svg aria-hidden="true" class="w-16 h-16 mr-2 text-gray-200 animate-spin  fill-primary" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" /><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" /></svg>
                                <span class="sr-only">Loading...</span>
                            </div> -->
                                <!-- : <>
                                    <Mail mess={msg} />
                                    {
                                        msg?.repleys?.map((r, i) => <Reply key={i} repley={r} />)
                                    }
                                </>} -->
                        </section>
                        <!-- <MsgReply
                            action_f={getMsg}
                            data={msg}
                        /> -->
            </section>
        </main>
    </AdminLayout>
</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import api from "@/axios";
import { onMounted, ref } from "vue";
import ClinetBox from "../ComponantsDashboard/ClinetBox.vue";
const messages = ref([]);
const msg = ref(messages.value[0]);
onMounted(() => {
    api.get("/messages")
        .then(({ data }) => (messages.value = data))
        .catch((e) => {
            console.log(e);
        });
    console.log(messages.value);
});
</script>
<style lang=""></style>
