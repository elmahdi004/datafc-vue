<template>
    <header :class="headerClasses">
        <div class="container">
            <div class="relative -mx-4 flex items-center justify-between">
                <div class="w-60 max-w-full px-4 xl:mr-12">
                    <router-link
                        to="/"
                        class="header-logo block w-full"
                        :class="logoClasses"
                    >
                        <img
                            src="/images/datafc_v_normale.svg"
                            alt="logo"
                            width="140"
                            height="30"
                            class="w-full"
                        />
                    </router-link>
                </div>
                <div class="flex ps-5 w-full items-center justify-between px-4">
                    <div>
                        <button
                            @click="navbarToggleHandler"
                            id="navbarToggler"
                            aria-label="Mobile Menu"
                            className="absolute right-4 top-1/2 block translate-y-[-50%] rounded-lg px-3 py-[6px] ring-primary focus:ring-2 xl:hidden"
                        >
                            <span
                                :class="[
                                    'relative my-1.5 block h-0.5 w-[30px] bg-black transition-all duration-300 dark:bg-white',
                                    navbarOpen ? 'top-[7px] rotate-45' : '',
                                ]"
                            ></span>
                            <span
                                :class="[
                                    'relative my-1.5 block h-0.5 w-[30px] bg-black transition-all duration-300 dark:bg-white',
                                    navbarOpen ? 'opacity-0' : '',
                                ]"
                            ></span>
                            <span
                                :class="[
                                    'relative my-1.5 block h-0.5 w-[30px] bg-black transition-all duration-300 dark:bg-white',
                                    navbarOpen ? 'top-[-8px] -rotate-45' : '',
                                ]"
                            ></span>
                        </button>

                        <nav
                            :class="[
                                'navbar absolute right-0 z-30 w-[250px] rounded border-[.5px] border-body-color/50 bg-white py-4 px-6 duration-300 dark:border-body-color/20 dark:bg-dark xl:visible xl:static xl:w-auto xl:border-none xl:!bg-transparent xl:p-0 xl:opacity-100',
                                navbarOpen
                                    ? 'visibility top-full opacity-100'
                                    : 'invisible top-[120%] opacity-0',
                            ]"
                        >
                            <ul class="block xl:flex xl:space-x-12">
                                <li
                                    v-for="(menuItem, index) in menuData"
                                    :key="index"
                                    class="group relative cursor-pointer"
                                >
                                    <template v-if="menuItem.path">
                                        <Link
                                            :href="menuItem.path"
                                            class="flex py-2 text-base text-gray-900 group-hover:opacity-70 dark:text-white font-bold xl:mr-0 xl:inline-flex xl:py-6 xl:px-0"
                                        >
                                            {{ menuItem.title }}
                                        </Link>
                                    </template>
                                    <template v-else>
                                        <a
                                            href="#"
                                            @click.prevent="
                                                handleSubmenu(index)
                                            "
                                            class="flex font-bold cursor-pointer items-center justify-between py-2 text-base text-gray-900 group-hover:opacity-70 dark:text-white xl:mr-0 xl:inline-flex xl:py-6 xl:px-0"
                                        >
                                            {{ menuItem.title }}
                                            <span class="pl-3">
                                                <svg
                                                    width="15"
                                                    height="14"
                                                    viewBox="0 0 15 14"
                                                >
                                                    <path
                                                        d="M7.81602 9.97495C7.68477 9.97495 7.57539 9.9312 7.46602 9.8437L2.43477 4.89995C2.23789 4.70308 2.23789 4.39683 2.43477 4.19995C2.63164 4.00308 2.93789 4.00308 3.13477 4.19995L7.81602 8.77183L12.4973 4.1562C12.6941 3.95933 13.0004 3.95933 13.1973 4.1562C13.3941 4.35308 13.3941 4.65933 13.1973 4.8562L8.16601 9.79995C8.05664 9.90933 7.94727 9.97495 7.81602 9.97495Z"
                                                        fill="currentColor"
                                                    />
                                                </svg>
                                            </span>
                                        </a>
                                        <div
                                            :class="[
                                                'submenu relative top-full left-0 rounded-md bg-white transition-[top] duration-300 group-hover:opacity-100 dark:bg-dark xl:invisible xl:absolute xl:top-[110%] xl:block xl:w-[250px] xl:p-4 xl:opacity-0 xl:shadow-lg xl:group-hover:visible xl:group-hover:top-full',
                                                openIndex === index
                                                    ? 'block'
                                                    : 'hidden',
                                            ]"
                                        >
                                            <Link
                                                v-for="(
                                                    submenuItem, i
                                                ) in menuItem.submenu"
                                                :key="i"
                                                :href="submenuItem.path"
                                                class="block rounded py-2.5 text-sm text-gray-900 hover:opacity-70 dark:text-white xl:px-3"
                                            >
                                                {{ submenuItem.title }}
                                            </Link>
                                        </div>
                                    </template>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div v-if="!auth"
                        className="flex items-center   justify-end pr-16 xl:pr-0"
                    >
                        <Link
                            :href="route('login')"
                            className=" py-3 px-7 text-base font-bold text-dark hover:opacity-70 max-sm:text-xs dark:text-white md:block"
                        >
                            Connecter
                        </Link>
                        <Link
                            :href="route('register')"
                            className="ease-in-up  rounded-md bg-primary py-3 max-sm:text-xs max-sm:py-2   px-8 text-base font-bold text-white transition duration-300 hover:bg-opacity-90 hover:shadow-signUp md:block md:px-9 xl:px-9"
                        >
                            S'inscrire
                        </Link>
                    </div>
                    <div className='grid grid-cols-2 ' v-else >
                      <div className="-ms-16 sm:flex sm:items-center sm:ml-6">
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- {{ page.props.auth.user?.name }} (Admin) -->
                        <!-- {/* Settings Dropdown */} -->
                        <div class="ml-3 relative">
                            <Dropdown
                                :align="'right'"
                                :width="48"
                                :renderTrigger="auth"
                            >
                                <!-- Account Management -->
                                <div
                                    class="block px-4 py-2 text-xs text-gray-400"
                                >
                                    Gérer son compte
                                </div>
                                <DropdownLink href="/admin">
                                    Dashboard
                                </DropdownLink>
                                <!-- :href="route('profile.show')" -->
                                <DropdownLink> Mon Compte </DropdownLink>
                                <!-- <template v-if="page.props.jetstream.hasApiFeatures">
          <DropdownLink :href="route('api-tokens.index')">
            API Tokens
          </DropdownLink>
        </template> -->
                                <div
                                    class="border-t border-gray-200 dark:border-gray-600"
                                ></div>
                                <!-- Authentication -->
                                <div @click="logout">
                                    <DropdownLink as="button"
                                        >Se déconnecter</DropdownLink
                                    >
                                </div>
                            </Dropdown>
                        </div>
                    </div>                      </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
import { ref, reactive, watchEffect, defineProps,onMounted } from "vue";
import { Link } from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from '@/components/DropdownLink.vue' ;
import { useStore } from 'vuex';
import api from "@/axios";

//   import { useRoute } from '@inertiajs/vue3';

//   const route = useRoute();

// State

const navbarOpen = ref(false);
const sticky = ref(false);
const openIndex = ref(-1);
const store = useStore();
const auth = ref(null);
onMounted(async () => {
    await store.dispatch('fetchUser');
    auth.value = store.state.auth;
    console.log('My User is : ',store.state.auth);
    console.log(auth.value);
});
const logout =  ()=>{
     api.get('/logout').then(({data})=>{
        console.log('My Data',data);
        console.log("Done !");
        auth.value = null;
        store.state.auth = null;
        // window.location = '/';
    });
}
const menuData = [
    {
        id: 1,
        title: "Accueil",
        path: "/",
        newTab: false,
    },
    {
        id: 4,
        title: "Qui sommes nous",
        path: "/sommes-nous",
        newTab: false,
    },
    {
        id: 2,
        title: "Nos services",
        newTab: false,
        submenu: [
            {
                id: 21,
                title: "Ingénierie de formation",
                path: "/ingenierie-de-formation",
                newTab: false,
            },
            {
                id: 22,
                title: "Formation",
                path: "/formation",
                newTab: false,
            },
            {
                id: 23,
                title: "Assistance conseil en recrutement",
                path: "/assistance-conseil-en-recrutement",
                newTab: false,
            },
            {
                id: 24,
                title: "Domiciliation Entreprise",
                path: "/domiciliation",
                newTab: false,
            },
            {
                id: 25,
                title: "Étude Stratégique",
                path: "/etude_stratigique",
                newTab: false,
            },
        ],
    },
    {
        id: 3,
        title: "Formation",
        newTab: false,
        submenu: [
            {
                id: 31,
                title: "Formations interentreprises",
                path: "/formations-interentreprises",
                newTab: false,
            },
            {
                id: 32,
                title: "Nos formations",
                path: "/nos-formations",
                newTab: false,
            },
        ],
    },
    {
        id: 5,
        title: "Contact",
        path: "/contact-nous",
        newTab: false,
    },
];

// Event handlers

const navbarToggleHandler = () => {
    navbarOpen.value = !navbarOpen.value;
};

const handleStickyNavbar = () => {
    if (window.scrollY >= 80) {
        sticky.value = true;
    } else {
        sticky.value = false;
    }
};

const handleSubmenu = (index) => {
    openIndex.value = openIndex.value === index ? -1 : index;
};

// Watchers
watchEffect(() => {
    window.addEventListener("scroll", handleStickyNavbar);
    return () => {
        window.removeEventListener("scroll", handleStickyNavbar);
    };
});

// Computed properties
const headerClasses = ref("");
const logoClasses = ref("");

watchEffect(() => {
    headerClasses.value = `header top-0 left-0 z-40 flex w-full items-center bg-transparent ${
        sticky.value
            ? "!fixed !z-[9999] !bg-white !bg-opacity-80 shadow backdrop-blur-sm !transition dark:!bg-primary dark:!bg-opacity-20"
            : "absolute"
    }`;

    logoClasses.value = sticky.value ? "py-5 xl:py-2" : "py-8";
});
</script>
