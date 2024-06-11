<template>
    <div>
        <button
            type="button"
            @click="handleDemandClick"
            class="border border-primary max-sm:p-2 max-sm:text-sm shadow bg-primary/80 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-primary focus:outline-none focus:shadow-outline"
        >
            DEMANDE DE DEVIS
        </button>
        <Modal :show="action" @close="closeModal" maxWidth="2xl">
            <template #header>
                <div class="rounded-t bg-white mb-0">
                    <div class="grid grid-cols-2">
                        <div>
                            <h4 class="font-bold text-xl text-primary p-2">
                                Code de formation:
                            </h4>
                        </div>
                        <div>
                            <p class="font-semibold text-xl text-black p-2">
                                {{ Code }}
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="font-bold text-xl text-primary p-2">
                            <h4>Théme de formation:</h4>
                        </div>
                        <div>
                            <p class="font-semibold text-xl text-black p-2">
                                {{ Titre }}
                            </p>
                        </div>
                    </div>
                </div>
            </template>
            <template #body>
                <div>
                    <div class="bg-slate-100 flex p-3">
                        <button
                            @click="switchBetweenTap('physique')"
                            :class="
                                activePage
                                    ? 'flex-1 mx-2 bg-primary py-[5px] text-white rounded-lg'
                                    : 'flex-1 mx-2 bg-white py-[5px] text-primary rounded-lg'
                            "
                        >
                            Personne Physique
                        </button>
                        <button
                            @click="switchBetweenTap('moral')"
                            :class="
                                !activePage
                                    ? 'flex-1 mx-2 bg-primary py-[5px] text-white rounded-lg'
                                    : 'flex-1 mx-2 bg-white py-[5px] text-primary rounded-lg'
                            "
                        >
                            Personne Moral
                        </button>
                    </div>
                    <div>
                        <div v-if="activePage">
                            <div class="flex-auto py-10 pt-0">
                                <form
                                    class="mt-4"
                                    @submit="physique.post('/physique/add')"
                                >
                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel> Nom </InputLabel>
                                                <TextInput
                                                    v-model="physique.nom"
                                                    type="text"
                                                    name="nom"
                                                    :class="[
                                                        'w-full',
                                                        physique.errors.nom
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="
                                                        physique.errors.nom
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Prenom
                                                </InputLabel>
                                                <TextInput
                                                    v-model="physique.prenom"
                                                    type="text"
                                                    name="Prenom"
                                                    :class="[
                                                        'w-full',
                                                        physique.errors.prenom
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="
                                                        physique.errors.prenom
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel> Email </InputLabel>
                                                <TextInput
                                                    v-model="physique.email"
                                                    type="email"
                                                    name="email"
                                                    :class="[
                                                        'w-full',
                                                        physique.errors.email
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="
                                                        physique.errors.email
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Téléphone
                                                </InputLabel>
                                                <TextInput
                                                    v-model="physique.tel"
                                                    type="tel"
                                                    name="tel"
                                                    :class="[
                                                        'w-full',
                                                        physique.errors.tel
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="
                                                        physique.errors.tel
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-12/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Addresse
                                                </InputLabel>
                                                <TextInput
                                                    type="text"
                                                    v-model="physique.adresse"
                                                    name="adresse"
                                                    :class="[
                                                        'w-full',
                                                        physique.errors.adresse
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="
                                                        physique.errors.adresse
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Pour quel type d'organisme
                                                    travaillez-vous?
                                                </InputLabel>
                                                <select
                                                    v-model="physique.typeOrg"
                                                    class="text-black border-primar focus:border-primary active:border-primary w-full rounded-lg border-[1.5px] py-2 px-5 font-medium outline-none transition"
                                                >
                                                    <option
                                                        v-for="(
                                                            item, idx
                                                        ) in orgTypes"
                                                        :key="idx"
                                                        :value="item"
                                                    >
                                                        {{ item }}
                                                    </option>
                                                </select>
                                                <InputError
                                                    :message="
                                                        physique.errors.typeOrg
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Nom d'organisme
                                                </InputLabel>
                                                <TextInput
                                                    type="text"
                                                    v-model="physique.nomOrg"
                                                    :class="[
                                                        'w-full',
                                                        physique.errors.nomOrg
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="
                                                        physique.errors.nomOrg
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4 pt-4">
                                            <div class="relative w-full mb-3">
                                                <p
                                                    class="flex items-center justify-center mt-4 capitalize text-blueGray-600 text-xs font-bold"
                                                >
                                                    Nombre De Participants À
                                                    Former :
                                                </p>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4 pt-4">
                                            <div
                                                class="relative flex justify-center items-center w-full mb-3"
                                            >
                                                <div
                                                    class="flex flex-row h-10 w-24 rounded-lg relative overflow-hidden shadow-sm"
                                                >
                                                    <button
                                                        type="button"
                                                        :disabled="nbr <= 1"
                                                        @click="setNbr('')"
                                                        class="font-semibold rounded bg-primary/90 hover:bg-primary text-white border-primary h-full w-20 flex focus:outline-none cursor-pointer disabled:opacity-50"
                                                    >
                                                        <span class="m-auto"
                                                            >-</span
                                                        >
                                                    </button>
                                                    <input
                                                        type="hidden"
                                                        value="{nbr}"
                                                        class="md:p-2 p-1 text-xs md:text-base focus:outline-none text-center"
                                                        readOnly
                                                        name="custom-input-number"
                                                    />
                                                    <div
                                                        class="bg-white w-20 text-xs md:text-base flex items-center justify-center cursor-default"
                                                    >
                                                        <span>{{
                                                            physique.nbr
                                                        }}</span>
                                                    </div>

                                                    <button
                                                        type="button"
                                                        @click="setNbr('add')"
                                                        class="font-semibold rounded bg-primary/90 hover:bg-primary text-white border-primary h-full w-20 flex focus:outline-none cursor-pointer disabled:opacity-50"
                                                    >
                                                        <span class="m-auto"
                                                            >+</span
                                                        >
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div v-else>
                            <div class="flex-auto py-10 pt-0">
                                <form class="mt-4">
                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Entreprise
                                                </InputLabel>
                                                <TextInput
                                                    type="text"
                                                    name="entreprise"
                                                    v-model="moral.entreprise"
                                                    :class="[
                                                        'w-full',
                                                        moral.errors.entreprise
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="moral.errors.entreprise"
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Raison sociale
                                                </InputLabel>
                                                <TextInput
                                                    type="text"
                                                    name="sociale"
                                                    v-model="moral.raison_sociale"
                                                    :class="[
                                                        'w-full',
                                                        moral.errors.raison_sociale
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="moral.errors.raison_sociale"
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel> Email </InputLabel>
                                                <TextInput
                                                    type="email"
                                                    name="email"
                                                    v-model="moral.email"
                                                    :class="[
                                                        'w-full',
                                                        moral.errors.email
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="moral.errors.email"
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Téléphone
                                                </InputLabel>
                                                <TextInput
                                                v-model="moral.tel"                                                    type="tel"
                                                    name="tel"
                                                    :class="[
                                                        'w-full',
                                                        moral.errors.tel
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="moral.errors.tel"
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full lg:w-12/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Addresse
                                                </InputLabel>
                                                <TextInput
                                                    type="text"
                                                    name="adresse"
                                                    v-model="moral.adresse"
                                                    :class="[
                                                        'w-full',
                                                        moral.errors.adresse
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="moral.errors.adresse"
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Responsable ou Inerlocuteur
                                                </InputLabel>
                                                <TextInput
                                                    type="text"
                                                    v-model="moral.responsable"
                                                    :class="[
                                                        'w-full',
                                                        moral.errors.responsable
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="moral.errors.responsable"
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <InputLabel>
                                                    Téléphone
                                                </InputLabel>
                                                <TextInput
                                                v-model="moral.responsableTel"
                                                    type="tel"
                                                    name="telres"
                                                    :class="[
                                                        'w-full',
                                                        moral.errors.responsableTel
                                                            ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500  focus:border-red-500'
                                                            : '',
                                                    ]"
                                                />
                                                <InputError
                                                    :message="moral.errors.responsableTel"
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4 pt-4">
                                            <div class="relative w-full mb-3">
                                                <p
                                                    class="flex items-center justify-center mt-4 capitalize text-blueGray-600 text-xs font-bold"
                                                >
                                                    Nombre de participants à
                                                    former :
                                                </p>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-6/12 px-4 pt-4">
                                            <div
                                                class="relative flex justify-center items-center w-full mb-3"
                                            >
                                                <div
                                                    class="w-full lg:w-6/12 px-4 pt-4"
                                                >
                                                    <div
                                                        class="relative flex justify-center items-center w-full mb-3"
                                                    >
                                                        <div
                                                            class="flex flex-row h-10 w-24 rounded-lg relative overflow-hidden shadow-sm"
                                                        >
                                                            <button
                                                                type="button"
                                                                :disabled="
                                                                    nbr <= 1
                                                                "
                                                                @click="
                                                                    setNbr('','moral')
                                                                "
                                                                class="font-semibold rounded bg-primary/90 hover:bg-primary text-white border-primary h-full w-20 flex focus:outline-none cursor-pointer disabled:opacity-50"
                                                            >
                                                                <span
                                                                    class="m-auto"
                                                                    >-</span
                                                                >
                                                            </button>
                                                            <input
                                                                type="hidden"
                                                                value="{nbr}"
                                                                class="md:p-2 p-1 text-xs md:text-base focus:outline-none text-center"
                                                                readOnly
                                                                name="custom-input-number"
                                                            />
                                                            <div
                                                                class="bg-white w-20 text-xs md:text-base flex items-center justify-center cursor-default"
                                                            >
                                                                <span>{{
                                                                    moral.nbr
                                                                }}</span>
                                                            </div>

                                                            <button
                                                                type="button"
                                                                @click="
                                                                    setNbr(
                                                                        'add','moral'
                                                                    )
                                                                "
                                                                class="font-semibold rounded bg-primary/90 hover:bg-primary text-white border-primary h-full w-20 flex focus:outline-none cursor-pointer disabled:opacity-50"
                                                            >
                                                                <span
                                                                    class="m-auto"
                                                                    >+</span
                                                                >
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <template #footer>
                <button
                    class="border-[#E9EDF9] transition hover:border-red-600 hover:bg-red-600 hover:text-white font-medium text-base py-2 px-4 rounded me-4 border"
                    @click="closeModal"
                >
                    Annuler
                </button>
                <PrimaryButton
                    v-show="activePage"
                    :class="{ 'opacity-25': processing }"
                    :disabled="processing"
                    @click="payload_f('physique')"
                >
                    Demander un devis
                </PrimaryButton>
                <PrimaryButton
                    v-show="!activePage"
                    :class="{ 'opacity-25': processing }"
                    :disabled="processing"
                    @click="payload_f('moral')"
                >
                    Demander un devis
                </PrimaryButton>
            </template>
        </Modal>
    </div>
</template>

<script>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import Modal from "@/components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
// import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'

//   import CustomInputNumber from './CustomInputNumber.vue';
import PrimaryButton from "@/components/PrimaryButton.vue";
import {useToast} from 'vue-toastification';
import { useStore } from "vuex";
export default {
    components: {
        Modal,
        InputLabel,
        TextInput,
        InputError,
        Inertia,
        useForm,
        // Tab,
        // TabGroup,
        // TabList,
        // TabPanels,
        // TabPanel,
        //   CustomInputNumber,
        PrimaryButton,
    },
    props: {
        Code: String,
        Titre: String,
        formationId: String,
    },
    setup(props) {
        const action = ref(false);

        const selectedIndex = ref(0);
        const typeD = ref("physique");
        // const physicalFields = ref([
        //   { label: 'Nom', model: 'nom', type: 'text', modelKey: 'nom' },
        //   { label: 'Prénom', model: 'prenom', type: 'text', modelKey: 'prenom' },
        //   { label: 'Téléphone', model: 'tel', type: 'tel', modelKey: 'tel' },
        //   { label: 'Adresse email', model: 'email', type: 'email', modelKey: 'email' },
        //   { label: 'Fonction', model: 'fonction', type: 'text', modelKey: 'fonction' },
        // ]);
        const physique = useForm({
            nom: "",
            prenom: "",
            email: "",
            tel: "",
            adresse: "",
            typeOrg: "",
            nomOrg: "",
            nbr: 1,
            formationId: props.formationId,
        });
        const moral = useForm({
            entreprise: "",
            raison_sociale: "",
            email: "",
            tel: "",
            adresse: "",
            responsable: "",
            responsableTel: "",
            nbr: 1,
            formationId: props.formationId,
        });
        // const moralFields = ref([
        //   { label: "Nom d'organisme", model: 'nomOrg', type: 'text', modelKey: 'nomOrg' },
        //   { label: "Secteur d'activité", model: 'secteur', type: 'text', modelKey: 'secteur' },
        //   { label: 'Adresse', model: 'adresse', type: 'text', modelKey: 'adresse' },
        // ]);
        const errors = ref({});
        const adresse = ref("");
        const typeOrgpm = ref("");
        const nomOrgpm = ref("");
        const resplonsable = ref("");
        const telres = ref("");
        const nbr = ref(0);
        const orgTypes = ref([
            "Entreprise privée",
            "Administration publique",
            "Association",
            "Fondation",
        ]);
        const processing = ref(false);
        const toast = useToast();
        const activePage = ref(true);
        const store = useStore();
        const handleDemandClick = () => {
          store.dispatch('fetchUser');
          if(store.state.auth.name != null){
            return action.value = true;
          }
          return Inertia.visit('/login');
        };

        const closeModal = () => {
            action.value = false;
        };

        const updateNbr = (newNbr) => {
            nbr.value = newNbr;
        };

        const payload_f = async (type) => {
            if (type == "physique") {
                await physique.post("/physique/add");
                //  Inertia.visit('Formations/infoForrmation/FormationInfo');
                closeModal();
                toast.success("Votre demande est bien créer")
            } else if (type == "moral") {
                await moral.post("/moral/add");
                closeModal();
                toast.success("Votre demande est bien créer")
            }
        };

        const classs = (...classes) => {
            return classes.filter(Boolean).join(" ");
        };
        const switchBetweenTap = (type) => {
            if (type == "physique") {
                activePage.value = true;
            } else {
                activePage.value = false;
            }
        };
        const setNbr = (add,type) => {
          if(type == 'moral'){
            if (add == "add") {
                moral.nbr++;
            } else {
                if (moral.nbr >= 2) {
                  moral.nbr--;
                }
            }
          }else{
            if (add == "add") {
                physique.nbr++;
            } else {
                if (physique.nbr >= 2) {
                    physique.nbr--;
                }
            }
          }

        };
        return {
            action,
            selectedIndex,
            typeD,
            // physicalFields,
            // moralFields,
            errors,
            adresse,
            typeOrgpm,
            nomOrgpm,
            resplonsable,
            telres,
            // nbr,
            orgTypes,
            processing,
            activePage,
            physique,
            moral,
            toast,
            handleDemandClick,
            closeModal,
            updateNbr,
            payload_f,
            classs,
            switchBetweenTap,
            setNbr,
        };
    },
};
</script>

<style scoped>
/* Add your styles here */
</style>
